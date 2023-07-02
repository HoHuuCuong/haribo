<?php

namespace App\Http\Controllers\Backend\Systems;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Config;
use App\Model\Language;

class ConfigController extends Controller
{
    public function general()
    {
        $ft = Config::getByKey('FOOTER',[0,1,2]);
        $logo = Config::getByKey('LOGO',[0,1,2]);
        $favicon = Config::getByKey('FAVICON',[0,1,2]);
        $email = Config::getByKey('EMAIL',[0,1,2]);
        $phone = Config::getByKey('PHONE',[0,1,2]);
        $fb = Config::getByKey('FB',[0,1,2]);
        $tw = Config::getByKey('TW',[0,1,2]);
        $in = Config::getByKey('IN',[0,1,2]);
        $li = Config::getByKey('LI',[0,1,2]);
        $company = Config::getByKey('COMPANY',[0,1,2]);
        $address = Config::getByKey('ADDRESS',[0,1,2]);
        $topbanner = Config::getByKey('TOPBANNER',[0,1,2]);
        $midbanner = Config::getByKey('MIDBANNER',[0,1,2]);
        $regimg = Config::getByKey('REGIMG',[0,1,2]);
        $title = Config::getByKey('TITLE',[0,1,2]);
        $anacode = Config::getByKey('ANACODE',[0,1,2]);
        $data = [
            'pagename' => __('Config General'),
            'action' => route('b.config.generalput'),
            'method' => 'PUT',
            'logo'=>$logo,
            'favicon'=>$favicon,
            'email'=>$email,
            'phone'=>$phone,
            'fb'=>$fb,
            'ft'=>$ft,
            'tw'=>$tw,
            'in'=>$in,
            'li'=>$li,
            'company'=>$company,
            'address'=>$address,
            'topbanner'=>$topbanner,
            'midbanner'=>$midbanner,
            'regimg'=>$regimg,
            'title'=>$title,
            'anacode'=>$anacode,
            'breadcrumbs' => [
                '#' => __('Config General')
            ],
        ];
        return view('backend.configs.general', $data);
    }
    public function generalput(Request $request)
    {
        $ft = Config::getByKey('FOOTER',[0,1,2]);
        $ft->value=$request->ft;
        $ft->save();
        $logo = Config::getByKey('LOGO',[0,1,2]);
        $logo->value = $request->logo;
        $logo->save();
        $favicon = Config::getByKey('FAVICON',[0,1,2]);
        $favicon->value = $request->favicon;
        $favicon->save();
        $email = Config::getByKey('EMAIL',[0,1,2]);
        $email->value = $request->email;
        $email->save();
        $phone = Config::getByKey('PHONE',[0,1,2]);
        $phone->value = $request->phone;
        $phone->save();
        $fb = Config::getByKey('FB',[0,1,2]);
        $fb->value = $request->fb;
        $fb->save();
        $tw = Config::getByKey('TW',[0,1,2]);
        $tw->value = $request->tw;
        $tw->save();
        $in = Config::getByKey('IN',[0,1,2]);
        $in->value = $request->in;
        $in->save();
        $li = Config::getByKey('LI',[0,1,2]);
        $li->value = $request->li;
        $li->save();
        $company = Config::getByKey('COMPANY',[0,1,2]);
        $company->value = $request->company;
        $company->save();
        $address = Config::getByKey('ADDRESS',[0,1,2]);
        $address->value = $request->address;
        $address->save();
        $topbanner = Config::getByKey('TOPBANNER',[0,1,2]);
        $topbanner->value = $request->topbanner;
        $topbanner->save();
        $midbanner = Config::getByKey('MIDBANNER',[0,1,2]);
        $midbanner->value = $request->midbanner;
        $midbanner->save();
        $regimg = Config::getByKey('REGIMG',[0,1,2]);
        $regimg->value = $request->regimg;
        $regimg->save();
        $title = Config::getByKey('TITLE',[0,1,2]);
        $title->value = $request->title;
        $title->save();
        $anacode = Config::getByKey('ANACODE',[0,1,2]);
        $anacode->value = $request->anacode;
        $anacode->save();
        return redirect()->back()->with(['type' => 'success', 'msg' => 'Update setting successful', 'title' => 'Setting update']);
    }
    public function home()
    {
        $box1 = Config::getByKey('BOX1',[0,1,2]);
        $title1 = Config::getByKey('TITLE1',[0,1,2]);
        $box2 = Config::getByKey('BOX2',[0,1,2]);
        $title2 = Config::getByKey('TITLE2',[0,1,2]);
        $box3 = Config::getByKey('BOX3',[0,1,2]);
        $title3 = Config::getByKey('TITLE3',[0,1,2]);
        $data = [
            'pagename' => __('Config Home'),
            'action' => route('b.config.homeput'),
            'method' => 'PUT',
            'box1'=>$box1,
            'title1'=>$title1,
            'box2'=>$box2,
            'title2'=>$title2,
            'box3'=>$box3,
            'title3'=>$title3,
            'breadcrumbs' => [
                '#' => __('Config Home')
            ],
        ];
        return view('backend.configs.home', $data);
    }
    public function homeput(Request $request)
    {
        $box1 = Config::getByKey('BOX1',[0,1,2]);
        $box1->value = $request->box1;
        $box1->save();
        $title1 = Config::getByKey('TITLE1',[0,1,2]);
        $title1->value = $request->title1;
        $title1->save();
        $box2 = Config::getByKey('BOX2',[0,1,2]);
        $box2->value = $request->box2;
        $box2->save();
        $title2 = Config::getByKey('TITLE2',[0,1,2]);
        $title2->value = $request->title2;
        $title2->save();
        $box3 = Config::getByKey('BOX3',[0,1,2]);
        $box3->value = $request->box3;
        $box3->save();
        $title3 = Config::getByKey('TITLE3',[0,1,2]);
        $title3->value = $request->title3;
        $title3->save();
        return redirect()->back()->with(['type' => 'success', 'msg' => 'Update setting successful', 'title' => 'Setting update']);
    }
   public function product()
    {
        $procontent = Config::getByKey('BOXPRO',[0,1,2]);
        $procontent2 = Config::getByKey('BOXPRO2',[0,1,2]);
        $data = [
            'pagename' => __('Config product'),
            'action' => route('b.config.productput'),
            'method' => 'PUT',
            'procontent'=>$procontent,
            'procontent2'=>$procontent2,
            'breadcrumbs' => [
                '#' => __('Config product')
            ],
        ];
        return view('backend.configs.product', $data);
    }
    public function productput(Request $request)
    {
        $procontent = Config::getByKey('BOXPRO',[0,1,2]);
        $procontent->value = $request->procontent;
        $procontent->save();
        $procontent2 = Config::getByKey('BOXPRO2',[0,1,2]);
        $procontent2->value = $request->procontent2;
        $procontent2->save();
        return redirect()->back()->with(['type' => 'success', 'msg' => 'Update setting successful', 'title' => 'Setting update']);
    }
    public function about()
    {
        $abcontent1 = Config::getByKey('ABOUTCONTENT1',[0,1,2]);
        $abcontent2 = Config::getByKey('ABOUTCONTENT2',[0,1,2]);
        $abimg1 = Config::getByKey('ABOUTIMG1',[0,1,2]);
        $abimg2 = Config::getByKey('ABOUTIMG2',[0,1,2]);
		$abimg3 = Config::getByKey('ABOUTIMG3',[0,1,2]);
        $abimg4 = Config::getByKey('ABOUTIMG4',[0,1,2]);

        $data = [
            'pagename' => __('Config About'),
            'action' => route('b.config.aboutput'),
            'method' => 'PUT',
            'abcontent1'=>$abcontent1,
            'abcontent2'=>$abcontent2,
            'abimg1'=>$abimg1,
            'abimg2'=>$abimg2,
			'abimg3'=>$abimg3,
            'abimg4'=>$abimg4,
            'breadcrumbs' => [
                '#' => __('Config About')
            ],
        ];
        return view('backend.configs.about', $data);
    }
    public function aboutput(Request $request)
    {
		$abimg3 = Config::getByKey('ABOUTIMG3',[0,1,2]);
		 $abimg3->value = $request->abimg3;
        $abimg3->save();
        $abimg4 = Config::getByKey('ABOUTIMG4',[0,1,2]);
		 $abimg4->value = $request->abimg4;
        $abimg4->save();
        $abcontent1 = Config::getByKey('ABOUTCONTENT1',[0,1,2]);
        $abcontent1->value = $request->abcontent1;
        $abcontent1->save();
        $abcontent2 = Config::getByKey('ABOUTCONTENT2',[0,1,2]);
        $abcontent2->value = $request->abcontent2;
        $abcontent2->save();
        $abimg1 = Config::getByKey('ABOUTIMG1',[0,1,2]);
        $abimg1->value = $request->abimg1;
        $abimg1->save();
        $abimg2 = Config::getByKey('ABOUTIMG2',[0,1,2]);
        $abimg2->value = $request->abimg2;
        $abimg2->save();
        return redirect()->back()->with(['type' => 'success', 'msg' => 'Update setting successful', 'title' => 'Setting update']);
    }
    public function program()
    {
        $summary = Config::getByKey('PROGRAMSORT',[0,1,2]);
        $detail = Config::getByKey('PROGRAM',[0,1,2]);
        $data = [
            'pagename' => __('Config Program rules'),
            'action' => route('b.config.programput'),
            'method' => 'PUT',
            'summary'=>$summary,
            'detail'=>$detail,
            'breadcrumbs' => [
                '#' => __('Config Program rules')
            ],
        ];
        return view('backend.configs.program', $data);
    }
    public function programput(Request $request)
    {
        $summary = Config::getByKey('PROGRAMSORT',[0,1,2]);
        $summary->value = $request->summary;
        $summary->save();
        $detail = Config::getByKey('PROGRAM',[0,1,2]);
        $detail->value = $request->detail;
        $detail->save();
        return redirect()->back()->with(['type' => 'success', 'msg' => 'Update setting successful', 'title' => 'Setting update']);
    }
}
