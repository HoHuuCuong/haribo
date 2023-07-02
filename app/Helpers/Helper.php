<?php
if (!function_exists('mb_ucfirst')) {
    function mb_ucfirst($string, $encoding = 'utf-8') {
        $strlen = mb_strlen($string, $encoding);
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_strtolower(mb_substr($string, 1, $strlen - 1, $encoding),$encoding);
        return mb_strtoupper($firstChar, $encoding) . $then;
    }
}
if (!function_exists('facetime')) {
function facetime($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'min',
        's' => 'secon',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago ' : 'now';

}
}
if (!function_exists('msg')) {
    function msg($msg, $type = 'default', $title = '')
    {
        if ($msg) {
            switch ($type) {
                case 'info':
                    return "<div class='alert alert-info col-12'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                            {$msg}
                            <script>$(function(){" . "$.msg('{$msg}','{$title}','info')" . "})</script>
                        </div>";
                    break;
                case 'danger':
                case 'error':
                case 'fail':
                    return "<div class='alert alert-danger  col-12'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                            {$msg}
                            <script>$(function(){" . "$.msg('{$msg}','{$title}','danger')" . "})</script>
                        </div>";
                    break;
                case 'warning':
                case 'pending':
                case 'waiting':
                    return "<div class='alert alert-warning  col-12'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                            {$msg}
                            <script>$(function(){" . "$.msg('{$msg}','{$title}','warning')" . "})</script>
                        </div>";
                    break;
                case 'success':
                case 'ok':
                case 'complete':
                    return "<div class='alert alert-success  col-12'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                            {$msg}
                            <script>$(function(){" . "$.msg('{$msg}','{$title}','success')" . "})</script>
                        </div>";
                    break;
                case 'default':
                    return "<div class='alert alert-default  col-12'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                        {$msg}
                        <script>$(function(){" . "$.msg('{$msg}','{$title}','info')" . "})</script>
                    </div>";
                    break;
            }
        }
        return '';
    }
}

if (!function_exists('createMenuHtml')) {
    function createMenuHtml($fb = 'backend')
    {
        $parentId = 0;
        $html = '';
        $menus = \App\Model\Functions::getMenuByUserId($parentId,$fb);
        $currentRoute = Route::currentRouteName();
        //dd($menus);
        $html = renderMenuItem($menus, $currentRoute);
        return $menus ? $html : '<li>
        <a class="nav-link" href="#">
            <i class="fas fa-lock" aria-hidden="true"></i>
            <span>' . __('backend.function.empty') . '</span>
        </a>
    </li>';
    }
    function renderMenuItem($menus, $currentRoute, $prid = 0)
    {
        $html = '';
        foreach ($menus as $i => $parent) {
            //unset($menus[$i]);
            if ($parent->parent_id ==  $prid) {
                $submenus = checkSub($parent->id, $menus); //\App\Model\Functions::getMenuByUserId($parent->id); //nav-expanded nav-active
                $href  = $parent->route_name ? route($parent->route_name) : '#';
                if ($submenus) { //$submenus->isNotEmpty()) {
                    $html .= '<li class="nav-parent ' . ($currentRoute == $parent->route_name ? ' nav-active ' : '') . '">
                        <a class="nav-link" href="' . $href . '">
                            <i class="' . $parent->icon . '" aria-hidden="true"></i>
                            <span>' . __($parent->name) . '</span>
                        </a>
                        <ul class="nav nav-children">
                            ' . renderMenuItem($submenus, $currentRoute, $parent->id) . '
                        </ul>
                    </li>';
                } else {
                    $html .= '<li ' . ($currentRoute == $parent->route_name ? 'class="nav-active"' : '') . ' >
                                <a class="nav-link" href="' . $href . '">
                                    <i class="' . $parent->icon . '" aria-hidden="true"></i>
                                    <span>' . __($parent->name) . '</span>
                                </a>
                            </li>';
                }
            }
            //else {
            //     if ($submenus) { //$submenus->isNotEmpty()) {
            //         $html .= '<li class="nav-parent ' . ($currentRoute == $parent->route_name ? ' nav-active ' : '') . '">
            //             <a class="nav-link" href="' . $href . '">
            //                 <i class="' . $parent->icon . '" aria-hidden="true"></i>
            //                 <span>' . __($parent->name) . '</span>
            //             </a>
            //             <ul class="nav nav-children">
            //                 ' . renderMenuItem($submenus, $currentRoute) . '
            //             </ul>
            //         </li>';
            //     } else {
            //         $html .= '<li ' . ($currentRoute == $parent->route_name ? 'class="nav-active"' : '') . ' >
            //                     <a class="nav-link" href="' . $href . '">
            //                         <i class="' . $parent->icon . '" aria-hidden="true"></i>
            //                         <span>' . __($parent->name) . '</span>
            //                     </a>
            //                 </li>';
            //     }
            // }
        }
        return $html;
    }
}
function checkSub($parentId, $menus)
{
    $sub = [];
    foreach ($menus as $i => $parent) {
        if ($parent->parent_id == $parentId) {
            $sub[] = $parent;
            $ctn = checkSub($parent->id, $menus);
            if ($ctn)
                $sub = array_merge($sub, $ctn);
        }
    }
    return $sub;
}
if (!function_exists('createFunsHtml')) {
    function createFunsHtml($userId = 0, $groupId = 0,$fb='backend')
    {
        $parentId = 0;
        $html = '';
        $id = 0;
        $fname = '';
        if ($userId) {
            $menus = \App\Model\Functions::getFuncsByUserId($userId, $parentId,$fb);
            $id = $userId;
            $fname = 'getFuncsByUserId';
        } else {
            $menus = \App\Model\Functions::getFuncsByGroupId($groupId, $parentId,$fb);
            $id = $groupId;
            $fname = 'getFuncsByGroupId';
        }
        $html = renderFunsItem($menus, $id, $fname);
        return $html ? '<li class="folder" data-jstree=\'{ "opened" : true }\'>
        ' . __('backend.title.menu').' '. $fb . '
        <ul>' . $html . '
        </ul></li>' : '<li class="folder" data-jstree=\'{ "disabled" : true,"opened" : true }\'>
        ' . __('backend.title.menu') . '
        <ul><li data-jstree=\'{ "icon" : "fas fa-lock","disabled" : true }\'>
            <span>' . __('backend.function.empty') . '</span>
    </ul></li>';
    }
    function renderFunsItem($menus, $id = 0, $calName = 'getFuncsByUserId', $prid = 0)
    {
        $html = '';
        $uid = $gid = 0;
        if ($calName == 'getFuncsByUserId') {
            $uid = $id;
        } else {
            $gid = $id;
        }
        //dd($uid, $gid, $calName);
        foreach ($menus as $parent) {
            if ($parent->parent_id ==  $prid) {
                $submenus = checkSub($parent->id, $menus);  //\App\Model\Functions::$calName($id, $parent->id);
                $checked =  \App\Model\Roles::checked($parent->id, $uid, $gid) ? ' ,"selected" : true' : '';
//if($parent->id==55)
//dd($checked);
                if ($submenus) {
                    $html .= '<li data-func-id="' . $parent->id . '" data-jstree=\'{ "icon" : "' . $parent->icon . '","opened" : true ' . $checked . ' }\'>
                            <span>' . __($parent->name) . '</span>
                        <ul>
                            ' . renderFunsItem($submenus, $id, $calName, $parent->id) . '
                        </ul>
                    </li>';
                } else {
                    $html .= '<li data-func-id="' . $parent->id . '" data-jstree=\'{ "icon" : "' . $parent->icon . '","opened" : true ' . $checked . ' }\'>
                                    <span>' . __($parent->name) . '</span>
                            </li>';
                }
            }
        }
        //echo $html;
        return $html;
    }
}
if (!function_exists('imgApp')) {
    function imgApp($image, $arrtribute = [], $width = 50, $height = 'auto', $url = false)
    {
        $path = public_path($image);
        $attr = '';
        foreach ($arrtribute as $n => $v) {
            $attr .= " $n=\"$v\" ";
        }
        if ($image && file_exists($path)) {
            return  !$url ? '<img src="' . asset($image) . '" ' . $attr . ' width="' . $width . '" height="' . $height . '"/>' : asset( $image);
        } else {
            return !$url ? '<img src="' .  asset('no-image.png') . '" ' . $attr . ' width="' . $width . '" height="' . $height . '"/>' : asset('no-image.png');
        }
    }
}
if (!function_exists('imgBackend')) {
    function imgBackend($image, $arrtribute = [], $width = 50, $height = 'auto', $url = false)
    {
        $path = public_path('backend/img/' . $image);
        $attr = '';
        foreach ($arrtribute as $n => $v) {
            $attr .= " $n=\"$v\" ";
        }
        if ($image && file_exists($path)) {
            return  !$url ? '<img src="' . asset('backend/img/' . $image) . '" ' . $attr . ' width="' . $width . '" height="' . $height . '"/>' : asset('backend/img/' . $image);
        } else {
            return !$url ? '<img src="' .  asset('no-image.png') . '" ' . $attr . ' width="' . $width . '" height="' . $height . '"/>' : asset('no-image.png');
        }
    }
}
if (!function_exists('imgFrontend')) {
    function imgFrontend($image, $arrtribute = [], $width = 50, $height = 'auto', $url = false)
    {
        $path = public_path('frontend/images/' . $image);
        //dd($path);
        $attr = '';
        foreach ($arrtribute as $n => $v) {
            $attr .= " $n=\"$v\" ";
        }
        if ($image &&  file_exists($path)) {
            return !$url ? '<img src="' .  asset('frontend/images/' . $image) . '" ' . $attr . ' width="' . $width . '" height="' . $height . '"/>' : asset('frontend/images/' . $image);
        } else {
            return !$url ? '<img src="' .  asset('no-image.png') . '" ' . $attr . ' width="' . $width . '" height="' . $height . '"/>' : asset('no-image.png');
        }
    }
}
