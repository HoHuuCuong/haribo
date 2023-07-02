<?php

namespace App\Http\Controllers\Backend\Systems;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Config;
use App\Model\Brand;
use App\Model\Oauth;

class TermController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $termTitle = Config::getByKey('TERM_TITLE',[0,1,2]);
        $termContent = Config::getByKey('TERM_CONTENT',[0,1,2]);
        //dd($termTitle->name);
        $data = [
            'pagename' => __('Update Terms & Conditions'),
            'action' => route('term.update'),
            'method' => 'PUT',
            'termtitle' => $termTitle,
            'termcontent' => $termContent,
            'breadcrumbs' => [
                '#' => __('Update Terms & Conditions')
            ],
        ];
        return view('backend.terms.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $termTitle = Config::getByKey('TERM_TITLE',[0,1,2]);
        $termContent = Config::getByKey('TERM_CONTENT',[0,1,2]);
        if ($termTitle &&  $termContent) {
            $termTitle->fill([
                'en'  => [
                    'content' =>  $request->title,
                ],
                'vi'  => [
                    'content' =>  $request->vi_title,
                ]
            ]);
            $termTitle->status = $request->status;
            $termTitle->brandid = $request->brandid;
            $termTitle->save();

            $termContent->fill([
                'en'  => [
                    'content' =>  $request->content,
                ],
                'vi'  => [
                    'content' =>  $request->vi_content,
                ]
            ]);
            $termContent->status = $request->status;
            $termContent->brandid = $request->brandid;
            $termContent->save();
        } else {
            $termTitle = Config::create();
            $termContent = Config::create();
            $termTitle->fill([
                'en'  => [
                    'content' =>  $request->title,
                ],
                'vi'  => [
                    'content' =>  $request->vi_title,
                ]
            ]);
            $termTitle->name  = 'TERM_TITLE';
            $termTitle->status = $request->status;
            $termTitle->brandid = $request->brandid;
            $termTitle->save();

            $termContent->fill([
                'en'  => [
                    'content' =>  $request->content,
                ],
                'vi'  => [
                    'content' =>  $request->vi_content,
                ]
            ]);
            $termContent->name  = 'TERM_CONTENT';
            $termContent->status = $request->status;
            $termContent->brandid = $request->brandid;
            $termContent->save();
        }
        return redirect()->back()->with(['type' => 'success', 'msg' => 'Update Terms & Conditions success', 'title' => 'Terms & Conditions action']);
    }

}
