<?php

namespace App\Http\Controllers\Backend\Systems;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Language;
use App\Model\Store;
use App\Model\StatusBen;
use App\Model\Oauth;
use App\Model\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        $data = [
            'pagename' => __('Categories'),
            'breadcrumbs' => [
                '#' => __('Categories')
            ],
            'list' => Category::where('hide', 0)
                ->filter($rq->all())
                ->sort($rq->field, $rq->sort)
                ->paginate(20)
        ];
        return view('backend.categories.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::options();
        $data = [
            'pagename' => __('Create Category'),
            'action' => route('category.store'),
            'method' => 'POST',
            'langs'=>Language::where(['status'=>1,'hide'=>0])->orderBy('default','DESC')->get(),
            'stores' => $stores,
            'parents' => Category::options($stores[0]->id),
            'breadcrumbs' => [
                '#' => __('Create Category')
            ],
        ];
        return view('backend.categories.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Category::create();
        $langs = Language::where(['status'=>1,'hide'=>0])->orderBy('default','DESC')->get();
        if ($item) {
            $fill = [];
            foreach($langs as $lang)
            {
                $fill[$lang->code]=[
                    'name' =>  $request->{$lang->code.'_name'},
                    'image' =>  $request->{$lang->code.'_image'},
                    'content' =>  $request->{$lang->code.'_content'},
                    'alias' =>  $request->{$lang->code.'_alias'},
                ];
            }
            $item->fill($fill);
            $item->pos = $request->pos;
            $item->status = $request->status;
            $item->parent_id = $request->parent_id;
            $item->icon = $request->icon;
            $item->store_id = $request->store_id;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Create category success', 'title' => 'category action']);
        } else {
            return redirect()->back()->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'category action']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Category::where(['id' => $id, 'hide' => 0])->first();
        if ($item) {
            $stores = Store::options();
            $data = [
                'pagename' => __('Update category'),
                'action' => route('category.update', $id),
                'method' => 'PUT',
                'langs'=>Language::where(['status'=>1,'hide'=>0])->orderBy('default','DESC')->get(),
                'stores' =>$stores,
                'parents' => Category::options($item->store_id,$item->id),
                'item' => $item,
                'breadcrumbs' => [
                    '#' => __('Update category')
                ],
            ];
            return view('backend.categories.form', $data);
        } else {
            return redirect()->route('category.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'category action']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $item = Category::where(['id' => $id, 'hide' => 0])->first();
        $langs = Language::where(['status'=>1,'hide'=>0])->orderBy('default','DESC')->get();
        if ($item) {
            $fill = [];
            foreach($langs as $lang)
            {
                $fill[$lang->code]=[
                    'name' =>  $request->{$lang->code.'_name'},
                    'image' =>  $request->{$lang->code.'_image'},
                    'content' =>  $request->{$lang->code.'_content'},
                    'alias' =>  $request->{$lang->code.'_alias'},
                ];
            }
            //dd($fill);
            $item->fill($fill);
            $item->pos = $request->pos;
            $item->parent_id = $request->parent_id;
            $item->status = $request->status;
            $item->icon = $request->icon;
            $item->store_id = $request->store_id;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Update category success', 'title' => 'category action']);
        } else {
            return redirect()->route('category.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'category action']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Category::where(['id' => $id, 'hide' => 0])->first();
        if ($item) {
            $item->status = 2;
            $item->hide = 1;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Delete category success', 'title' => 'category action']);
        } else {
            return redirect()->route('category.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'category action']);
        }
    }
    public function getCategories(Request $rq)
    {
        $list = Category::options($rq->store_id,$rq->id);
        if($rq->cat)
        {
            echo '<option value="0">' . __('No Parent') . '</option>';
        }else{
            echo '<option value="">' . __('Select category') . '</option>';
        }
        if ($list) {
            foreach ($list as $item) {
                echo '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
        }
    }
}
