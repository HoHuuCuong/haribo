<?php

namespace App\Model;

class Oauth
{
    protected $auth_method = '';
    protected $baseurl = '';
    protected $user = null;
    protected $error = null;

    public function __construct()
    {
        $this->baseurl = 'http://localhost';//url('/');
    }
	public function check_oauth_signature($user, $params)
    {
        // echo '<pre>', print_r($_SERVER), '</pre>';
        $http_method  = isset($_SERVER['REQUEST_METHOD']) ? strtoupper($_SERVER['REQUEST_METHOD']) : ''; // WPCS: sanitization ok.
        $request_path = isset($_SERVER['REQUEST_URI']) ? $this->parse_uri() : ''; // WPCS: sanitization ok.
        if (substr($request_path, 0, strlen($this->baseurl)) === $this->baseurl) {
            $request_path = substr($request_path, strlen($this->baseurl));
        }
        $base_request_uri = rawurlencode($this->baseurl . $request_path);

        // Get the signature provided by the consumer and remove it from the parameters prior to checking the signature.
        $consumer_signature = rawurldecode(str_replace(' ', '+', $params['oauth_signature']));
        unset($params['oauth_signature']);
		unset($params['task']);
        // Sort parameters.
        if (!uksort($params, 'strcmp')) {
            $this->set_error('Invalid signature - failed to sort parameters.');
            return false;
        }

        // Normalize parameter key/values.
        $params         = $this->normalize_parameters($params);
        $query_string   = implode('%26', $this->join_with_equals_sign($params)); // Join with ampersand.
        $string_to_sign = $http_method . '&' . $base_request_uri . '&' . $query_string;
		//va($params);
        if ('HMAC-SHA1' !== $params['oauth_signature_method'] && 'HMAC-SHA256' !== $params['oauth_signature_method']) {
            $this->set_error('Invalid signature - signature method is invalid.');
            return false;
        }

        $hash_algorithm = strtolower(str_replace('HMAC-', '', $params['oauth_signature_method']));
        $secret         = $user->consumer_secret . '&';
        $signature      = base64_encode(hash_hmac($hash_algorithm, $string_to_sign, $secret, true));

        if (!hash_equals($signature, $consumer_signature)) { // @Hieudev
            $this->set_error('Invalid signature - provided signature does not match.');
            return false;
        }
        return true;
    }
    public function get_user_data_by_consumer_key($key)
    {
        $user = new \stdClass();
        $user->key_id = 1;
        $user->user_id = 102;
        $user->permissions = 'read_write';
        $user->consumer_key = '1f4c78e3dbcb995aaab03a603719b8832f0dd734716001151ea9135f446a66e7'; //@Hieudev:ck_82640aa250958c14e8a338489a28d61e
        $user->consumer_secret = 'cs_e4b85822c7149a07db9de346970dfb7e'; //@hieudevSecret
        $user->nonces = 'a:1:{i:1563502260;s:11:"i2hEr14TBKC";}';
        if ($this->jcb_api_hash($key) !== $user->consumer_key)
            return false;
        return $user;
    }
    public function set_error($error)
    {
        $this->user = null;

        $this->error = $error;
    }
    public function get_error()
    {
        return $this->error;
    }
    public function authenticate()
    {
        $user_id = false;

        //if ($this->is_ssl()) {
           // $user_id = $this->perform_basic_authentication();
        //}

        if ($user_id) {
            return $user_id;
        }

        return $this->perform_oauth_authentication();
    }
    public function get_json()
    {
        return  file_get_contents('php://input');
    }
    public function get_data()
    {
        $j = $this->get_json();
        return json_decode($j ? $j : '[]');
    }

    /**
     * Basic Authentication.
     *
     * SSL-encrypted requests are not subject to sniffing or man-in-the-middle
     * attacks, so the request can be authenticated by simply looking up the user
     * associated with the given consumer key and confirming the consumer secret
     * provided is valid.
     *
     * @return int|bool
     */
    public function perform_basic_authentication()
    {
        $this->auth_method = 'basic_auth';
        $consumer_key      = '';
        $consumer_secret   = '';

        // If the $_GET parameters are present, use those first.
        if (!empty($_GET['consumer_key']) && !empty($_GET['consumer_secret'])) {
            $consumer_key    = $_GET['consumer_key']; // .
            $consumer_secret = $_GET['consumer_secret']; // .
        }

        // If the above is not present, we will do full basic auth.
		//list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':' , base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));
		//dd(explode(':', base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6))));
		
		list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':', base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));
        if (!$consumer_key && !empty($_SERVER['PHP_AUTH_USER']) && !empty($_SERVER['PHP_AUTH_PW'])) {
            $consumer_key    = $_SERVER['PHP_AUTH_USER']; // .
            $consumer_secret = $_SERVER['PHP_AUTH_PW']; // .
        }
		//phpinfo();
		//va($_SERVER);
	//echo $consumer_key,'-',$consumer_secret;exit;
        // Stop if don't have any key.
        if (!$consumer_key || !$consumer_secret) {
            return false;
        }

        // Get user data.
        $this->user = $this->get_user_data_by_consumer_key($consumer_key);
        if (empty($this->user)) {
            return false;
        }

        // Validate user secret.
        if (!hash_equals($this->user->consumer_secret, $consumer_secret)) { // @Hieudev
            $this->set_error('Consumer secret is invalid.');
            return false;
        }

        return $this->user->user_id;
    }
    public function perform_oauth_authentication()
    {
        $this->auth_method = 'oauth1';

        $params = $this->get_oauth_parameters();
        if (empty($params)) {
            return false;
        }

        // Fetch JCB user by consumer key.
        $this->user = $this->get_user_data_by_consumer_key($params['oauth_consumer_key']);

        if (empty($this->user)) {
            $this->set_error('Consumer key is invalid.');
            return false;
        }

        // Perform OAuth validation.
        $signature = $this->check_oauth_signature($this->user, $params);
        if ($this->get_error())
            return false;
        $timestamp_and_nonce = $this->check_oauth_timestamp_and_nonce($this->user, $params['oauth_timestamp'], $params['oauth_nonce']);
        if ($this->get_error())
            return false;
        $permiss = $this->check_user_permissions();
        if ($this->get_error())
            return false;
        return $this->user->user_id;
    }
    function parse_uri()
    {
        $path = $_SERVER['REQUEST_URI'];
        if (strpos($path, '?') !== false) {
            $paths = explode('?', $path);
            $path = $paths[0];
        }
        if (strrpos($path, '/') === strlen($path) - 1) {
            $path = substr($path, 0, strlen($path) - 1);
        }
        return $path;
    }

    public function update_last_access()
    {
        //update last access for user
    }
    public function check_user_permissions()
    {
        if ($this->user) {
            // Check API Key permissions.
            if ($this->check_permissions()) {
                $this->update_last_access();
                return true;
            }
            return false;
        }
        return false;
    }
    public function check_permissions()
    {
        $method = @$_SERVER['REQUEST_METHOD'];
        $permissions = $this->user->permissions;

        switch ($method) {
            case 'HEAD':
            case 'GET':
                if ('read' !== $permissions && 'read_write' !== $permissions) {
                    $this->set_error('The API key provided does not have read permissions.');
                    return false;
                }
                break;
            case 'POST':
            case 'PUT':
            case 'PATCH':
            case 'DELETE':
                if ('write' !== $permissions && 'read_write' !== $permissions) {
                    $this->set_error('The API key provided does not have write permissions.', 'woocommerce');
                    return false;
                }
                break;
            case 'OPTIONS':
                return true;

            default:
                $this->set_error('Unknown request method.', 'woocommerce');
                return false;
        }

        return true;
    }
    public function maybe_unserialize($original)
    {
        if ($this->is_serialized($original)) {
            return @unserialize($original);
        }
        return $original;
    }
    public function maybe_serialize($data)
    {
        if (is_array($data) || is_object($data)) {
            return serialize($data);
        }
        if ($this->is_serialized($data, false)) {
            return serialize($data);
        }

        return $data;
    }
    function is_serialized($data, $strict = true)
    {
        // if it isn't a string, it isn't serialized.
        if (!is_string($data)) {
            return false;
        }
        $data = trim($data);
        if ('N;' == $data) {
            return true;
        }
        if (strlen($data) < 4) {
            return false;
        }
        if (':' !== $data[1]) {
            return false;
        }
        if ($strict) {
            $lastc = substr($data, -1);
            if (';' !== $lastc && '}' !== $lastc) {
                return false;
            }
        } else {
            $semicolon = strpos($data, ';');
            $brace     = strpos($data, '}');
            // Either ; or } must exist.
            if (false === $semicolon && false === $brace) {
                return false;
            }
            // But neither must be in the first X characters.
            if (false !== $semicolon && $semicolon < 3) {
                return false;
            }
            if (false !== $brace && $brace < 4) {
                return false;
            }
        }
        $token = $data[0];
        switch ($token) {
            case 's':
                if ($strict) {
                    if ('"' !== substr($data, -2, 1)) {
                        return false;
                    }
                } elseif (false === strpos($data, '"')) {
                    return false;
                }
                // or else fall through
            case 'a':
            case 'O':
                return (bool) preg_match("/^{$token}:[0-9]+:/s", $data);
            case 'b':
            case 'i':
            case 'd':
                $end = $strict ? '$' : '';
                return (bool) preg_match("/^{$token}:[0-9.E-]+;$end/", $data);
        }
        return false;
    }
    public function check_oauth_timestamp_and_nonce($user, $timestamp, $nonce)
    {
        $valid_window = 15 * 60; // 15 minute window.

        if (($timestamp < time() - $valid_window) || ($timestamp > time() + $valid_window)) {
            $this->set_error('Invalid timestamp.');
            return false;
        }

        $used_nonces = $this->maybe_unserialize($user->nonces);
        if (empty($used_nonces)) {
            $used_nonces = array();
        }

        if (in_array($nonce, $used_nonces, true)) {
            $this->set_error('Invalid nonce - nonce has already been used.');
            return false;
        }

        $used_nonces[$timestamp] = $nonce;

        // Remove expired nonces.
        foreach ($used_nonces as $nonce_timestamp => $nonce) {
            if ($nonce_timestamp < (time() - $valid_window)) {
                unset($used_nonces[$nonce_timestamp]);
            }
        }

        $used_nonces = $this->maybe_serialize($used_nonces);
        //update nonce;

        return true;
    }

    public function jcb_api_hash($data)
    {
        return hash_hmac('sha256', $data, 'jcb-api');
    }
    public function is_ssl()
    {
        if (isset($_SERVER['HTTPS'])) {
            if ('on' == strtolower($_SERVER['HTTPS'])) {
                return true;
            }

            if ('1' == $_SERVER['HTTPS']) {
                return true;
            }
        } elseif (isset($_SERVER['SERVER_PORT']) && ('443' == $_SERVER['SERVER_PORT'])) {
            return true;
        }
        return false;
    }
    public function normalize_parameters($parameters)
    {
        $keys       = $this->wc_rest_urlencode_rfc3986(array_keys($parameters));
        $values     = $this->wc_rest_urlencode_rfc3986(array_values($parameters));
        $parameters = array_combine($keys, $values);

        return $parameters;
    }
    public function renderSign($method,$url,$consumer,$secret,$signmethod='sha1') {
		$base_string = $method.'&'.$url;
		$key = $secret.'&';//$consumer.'&'.$secret;
		return base64_encode( hash_hmac( $signmethod, $base_string, $key, true));
	}
    function wc_rest_urlencode_rfc3986($value)
    {
        if (is_array($value)) {
            return array_map(array($this, 'wc_rest_urlencode_rfc3986'), $value);
        }

        return str_replace(array('+', '%7E'), array(' ', '~'), rawurlencode($value));
    }
    public function join_with_equals_sign($params, $query_params = array(), $key = '')
    {
        foreach ($params as $param_key => $param_value) {
            if ($key) {
                $param_key = $key . '%5B' . $param_key . '%5D'; // Handle multi-dimensional array.
            }

            if (is_array($param_value)) {
                $query_params = $this->join_with_equals_sign($param_value, $query_params, $param_key);
            } else {
                $string         = $param_key . '=' . $param_value; // Join with equals sign.
                $query_params[] = $this->wc_rest_urlencode_rfc3986($string);
            }
        }

        return $query_params;
    }
    public function parse_header($header)
    {
        if ('OAuth ' !== substr($header, 0, 6)) {
            return array();
        }

        // From OAuth PHP library, used under MIT license.
        $params = array();
        if (preg_match_all('/(oauth_[a-z_-]*)=(:?"([^"]*)"|([^,]*))/', $header, $matches)) {
            foreach ($matches[1] as $i => $h) {
                $params[$h] = urldecode(empty($matches[3][$i]) ? $matches[4][$i] : $matches[3][$i]);
            }
            if (isset($params['realm'])) {
                unset($params['realm']);
            }
        }

        return $params;
    }
    public function get_authorization_header()
    {
        if (!empty($_SERVER['HTTP_AUTHORIZATION'])) {
            return $this->jcb_unslash($_SERVER['HTTP_AUTHORIZATION']); // WPCS: sanitization ok.
        }

        if (function_exists('getallheaders')) {
            $headers = getallheaders();
            // Check for the authoization header case-insensitively.
            foreach ($headers as $key => $value) {
                if ('authorization' === strtolower($key)) {
                    return $value;
                }
            }
        }

        return '';
    }
    public function get_oauth_parameters()
    {
        $params = array_merge($_GET, $_POST); // WPCS: CSRF ok.
        $params = $this->jcb_unslash($params);
        $header = $this->get_authorization_header();

        if (!empty($header)) {
            // Trim leading spaces.
            $header        = trim($header);
            $header_params = $this->parse_header($header);

            if (!empty($header_params)) {
                $params = array_merge($params, $header_params);
            }
        }

        $param_names = array(
            'oauth_consumer_key',
            'oauth_timestamp',
            'oauth_nonce',
            'oauth_signature',
            'oauth_signature_method',
        );

        $errors   = array();
        $have_one = false;

        // Check for required OAuth parameters.
        foreach ($param_names as $param_name) {
            if (empty($params[$param_name])) {
                $errors[] = $param_name;
            } else {
                $have_one = true;
            }
        }

        // All keys are missing, so we're probably not even trying to use OAuth.
        if (!$have_one) {
            return array();
        }

        // If we have at least one supplied piece of data, and we have an error,
        // then it's a failed authentication.
        if (!empty($errors)) {
            $this->set_error('Missing OAuth parameter ' . implode(', ', $errors));
            return array();
        }

        return $params;
    }
    public function jcb_unslash($value)
    {
        return $this->stripslashes_deep($value);
    }
    function stripslashes_deep($value)
    {
        return $this->map_deep($value, array($this, 'stripslashes_from_strings_only'));
    }
    function map_deep($value, $callback)
    {
        if (is_array($value)) {
            foreach ($value as $index => $item) {
                $value[$index] = $this->map_deep($item, $callback);
            }
        } elseif (is_object($value)) {
            $object_vars = get_object_vars($value);
            foreach ($object_vars as $property_name => $property_value) {
                $value->$property_name = $this->map_deep($property_value, $callback);
            }
        } else {
            $value = call_user_func($callback, $value);
        }

        return $value;
    }
    function stripslashes_from_strings_only($value)
    {
        return is_string($value) ? stripslashes($value) : $value;
    }
    public function log_hander_api($raw, $api, $status = 0, $status_api = '', $msg_api = '')
    {
        //
    }
}
