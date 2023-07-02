<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Model\Customer;
use App\Model\Config;
use App\Model\Language;
use App\Model\BonusCode;
use App\Model\District;
use App\Model\City;
use App\Model\Productkm;
use App\Model\Result;



use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Excel;
use File;

class HomeController extends Controller
{
    var $config;
    var $langs;
    public function __construct()
    {
        $this->config = Config::where('status',1)->get()->keyBy('name');
        $this->langs = Language::where('status',1)->orderBy('pos','ASC')->get();
    }
    public function index(Request $rq)
    {
		$cities = City::options();
        $data = [
			'cities'=>$cities,
			'districts'=>District::options(old('city_id')?old('city_id'):$cities[0]->id),
            'config'=>$this->config,
            'products'=>Productkm::where(['status'=>1,'hide'=>0])->get(),
            'langs'=>$this->langs,
			        'nhats'=>Result::where(['type'=>1,'hide'=>0,'status'=>1])->get(),
            'nhis'=>Result::where(['type'=>2,'hide'=>0,'status'=>1])->get()
        ];
        return view('frontend.home1',$data);
    }
    public function registration()
    {
        $cities = City::options();
        $data = [
            'config'=>$this->config,
            'langs'=>$this->langs,
            'cities'=>$cities,
            'districts'=>District::options(old('city_id')?old('city_id'):$cities[0]->id)
        ];
        return view('frontend.registration',$data);
    }
    public function register(RegistrationRequest $rq)
    {
		//return redirect(route('f.home').'#reg-section')->with(['reg'=>true,'msg'=>'Chương trình Bốc thăm cùng Haribo đã ngưng nhận mã dự thưởng sau 24h ngày 30/11/2020. Cảm ơn bạn đã đồng hành cùng Haribo. Chúng tôi sẽ công bố kết quả bốc thăm trong vòng 7 ngày làm việc ngau sau buổi bốc thăm ngày 09/12/2020. Hãy cùng theo dõi kết quả với Haribo nhé!','title'=>'Đăng ký','type'=>'danger']);
        $rq->validated();
        $cs = Customer::create();
        $cs->first_name = $rq->first_name;
        $cs->last_name = $rq->last_name;
        $cs->name = $rq->name;
        $cs->cmnd = $rq->cmnd;
        $cs->email = $rq->email;
        $cs->phone = $rq->phone;
        $cs->address = $rq->address;
        $cs->city_id = $rq->city_id;
        $cs->district_id = $rq->district_id;
        $cs->bonus_code = $rq->bonus_code;
        if($rq->hasFile('attach'))
        {
            $cs->attach= $rq->file('attach')->store('attach','public');
        }
        $cs->confirm_code = md5($rq->email.$rq->phone.time());
        $cs->save();
        //vietguy
        session()->forget('myoffer');
        $this->client = new \GuzzleHttp\Client();
        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ];
        $raw= [
            "mobile" => $cs->phone,
            "code" => $cs->bonus_code,
            "fullname" => $cs->name,
            "email" => $cs->email,
            "token" => "61f8232c-14c2-47bd-8b09-0e4c4ff85eba"
        ];
        $options['json'] = $raw;
        $response = $this->client->request('POST','https://twoway.vietguys.biz:4438/api/twoway/code/v1/hrb2',$options);
        $cs->rpjson  = $response->getBody();
        //$cs->rqjson  = json_encode($raw);
        $rs = json_decode($cs->rpjson);
        $cs->msg = $rs->resultMess;
        $cs->save();
        //$rs = new \stdClass();
        //$rs->resultCode = 0;
        if($rs->resultCode==0)
        {
			try{
				\Mail::send('email', ['code'=>$cs->bonus_code,'config'=>$this->config], function ($message)use($rq) {
					$message->to($rq->email, $rq->first_name.' '.$rq->last_name);
					$message->replyTo($this->config['EMAIL']->value,$this->config['COMPANY']->value);
					$message->subject($this->config['TITLE']->value);
				});
				if (\Mail::failures()) {
					//return new Error(Mail::failures());
					return redirect()->route('f.alert')->with(['code'=>$cs->bonus_code,'msg'=>__('Gửi email thất bại, vui lòng thử lại sau'),'title'=>'Trợ giúp','type'=>'danger']);
				}
				return redirect()->route('f.alert')->with(['code'=>$cs->bonus_code]);
			}catch(\Exception $e)
			{
					return redirect()->route('f.alert')->with(['code'=>$cs->bonus_code,'msg'=>__('Gửi email thất bại, vui lòng thử lại sau'),'title'=>'Trợ giúp','type'=>'danger']);
			}
        }else{
            return redirect()->route('f.register')->with(['reg'=>true,'msg'=>$rs->resultMess,'title'=>'Đăng ký thất bại','type'=>'danger','city_id'=>$rq->city_id]);
        }
    }
    public function test()
    {
			return view('email', ['code'=>'ádasd','name'=>'ưefwef','config'=>$this->config]);
    }
    public function program()
    {
        $data = [
            'config'=>$this->config,
            'langs'=>$this->langs,
        ];
        return view('frontend.program',$data);
    }
    public function ketqua()
    {
        $data = [
            'config'=>$this->config,
            'langs'=>$this->langs,
            'dacbiets'=>Result::where(['type'=>1,'hide'=>0,'status'=>1])->get(),
            'yeuthuongs'=>Result::where(['type'=>2,'hide'=>0,'status'=>1])->get()
        ];
        return view('frontend.ketqua',$data);
    }
    public function luckydraw()
    {
        $data = [
            'config'=>$this->config,
            'langs'=>$this->langs
        ];
        return view('frontend.luckydraw', $data);
    }
    public function import(Request $request)
    {
        //validate the xls file
        $this->validate($request, array(
            'file' => 'required'
        )
        );

        if ($request->hasFile('file')) {
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $path = $request->file->getRealPath();
                $data = Excel::load($path, function ($reader) {
                })->get();
                if (!empty($data) && $data->count()) {

                    foreach ($data as $key => $value) {
                        $insert[] = [
                            'name' => $value->code,
                            'email' => $value->name,
                            'phone' => $value->phone,
                        ];
                    }

                    if (!empty($insert)) {

                        $insertData = DB::table('pc_codes')->insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        } else {
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }

                return back();

            } else {
                Session::flash('error', 'File is a ' . $extension . ' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }

    public function alert()
    {
        if(!session('code'))
            return redirect()->route('f.home');
        $data = [
            'config'=>$this->config,
            'langs'=>$this->langs,
            'code'=>session('code')
        ];
        return view('frontend.alert',$data);
    }
    public function products()
    {
        $data = [
            'config'=>$this->config,
            'langs'=>$this->langs,
            'products'=>Productkm::where(['status'=>1,'hide'=>0])->get(),
        ];
        return view('frontend.products',$data);
    }
    public function about()
    {
        $data = [
            'config'=>$this->config,
            'langs'=>$this->langs,
        ];
        return view('frontend.about',$data);
    }
    public function contact()
    {
        $data = [
            'config'=>$this->config,
            'langs'=>$this->langs,
        ];
        return view('frontend.contact',$data);
    }
   public function contactpost(Request $rq)
    {
        $rq->validate(
            [
                'email'=>['regex:/' . \App\HD::REGIX_EMAIL . '/'],
                'message'=>['required','min:10','max:200'],
            ],
            [
                'email.regex' => __('backend.validate.regix', ['name' => __('Email')]),
                'message.required' => __('backend.validate.requied', ['name' => __('Message')]),
                'message.min' => __('backend.validate.min', ['name' => __('Message'), 'value' => '20 ' . __('character')]),
                'message.max' => __('backend.validate.max', ['name' => __('Message'), 'value' => '200 ' . __('character')]),
            ]
        );
        $data = [
            'msg'=>$rq->message,
            'email'=>$rq->email,
            'cpn'=>$this->config['COMPANY']->value
        ];

        \Mail::send('frontend.contactemail', $data, function ($message)use($rq) {
                $message->to($this->config['EMAIL']->value,$this->config['COMPANY']->value);
                $message->replyTo($rq->email, 'Contact form');
                $message->subject('Contact from');
        });
        if (\Mail::failures()) {
            //return new Error(Mail::failures());
            return redirect()->back()->with(['msg'=>__('Gửi email thất bại, vui lòng thử lại sau'),'title'=>'Trợ giúp','type'=>'danger']);
        }
        session()->forget('myoffer');
        return redirect(route('f.home'))->with(['contact'=>true,'msg'=>__('Cảm ơn câu hỏi của bạn, chúng tôi sẽ phản hồi trong thời gian sớm nhất'),'title'=>'Trợ giúp','type'=>'success']);
    }
    public function getDistricts(Request $rq)
    {
        $list = District::options($rq->city_id);
        echo '<option value="">' . __('Select').' '.__('District') . '</option>';
        if ($list) {
            foreach ($list as $item) {
                echo '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
        }
    }
    public function changeLang($lang)
    {
        if (Language::code($lang)) {
            session(['lang' => $lang]);
            return redirect()->back();
        }
    }
}
