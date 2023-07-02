<?php

namespace App\Http\Controllers\Backend\Systems;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Category;
use App\Model\Language;
use App\Model\Store;
use App\Model\Oauth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PHPExcel_IOFactory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        $data = [
            'pagename' => __('Items'),
            'breadcrumbs' => [
                '#' => __('Items')
            ],
            'list' => Product::where('hide', 0)
                ->filter($rq->all())
                ->sort($rq->field, $rq->sort)
                ->paginate(20)
        ];
        return view('backend.products.list', $data);
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
            'pagename' => __('Create Item'),
            'action' => route('product.store'),
            'method' => 'POST',
            'langs'=>Language::where(['status'=>1,'hide'=>0])->orderBy('default','DESC')->get(),
            'stores' => $stores,
            'categories' => Category::options($stores[0]->id),
            'breadcrumbs' => [
                '#' => __('Create Item')
            ],
        ];
        return view('backend.products.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Product::create();
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
            $item->item_id = $request->item_id;
            $item->price = $request->price;
            $item->pos = $request->pos;
            $item->status = $request->status;
            $item->store_id = $request->store_id;
            $item->menu_code = $request->menu_code;
            $item->parent_code = $request->parent_code;
            $item->category_id = $request->category_id;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Create Item success', 'title' => 'Item action']);
        } else {
            return redirect()->back()->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'Item action']);
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
        $item = Product::where(['id' => $id, 'hide' => 0])->first();
        if ($item) {
            $data = [
                'pagename' => __('Update Item'),
                'action' => route('product.update', $id),
                'method' => 'PUT',
                'stores' => Store::options(),
                'categories' => Category::options($item->store_id),
                'item' => $item,
                'langs'=>Language::where(['status'=>1,'hide'=>0])->orderBy('default','DESC')->get(),
                'breadcrumbs' => [
                    '#' => __('Update Item')
                ],
            ];
            return view('backend.products.form', $data);
        } else {
            return redirect()->route('product.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'Item action']);
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
        $item = Product::where(['id' => $id, 'hide' => 0])->first();
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
            $item->menu_code = $request->menu_code;
            $item->parent_code = $request->parent_code;
            $item->pos = $request->pos;
            $item->status = $request->status;
            $item->item_id = $request->item_id;
            $item->store_id = $request->store_id;
            $item->category_id = $request->category_id;
            $item->price = $request->price;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Update Item success', 'title' => 'Item action']);
        } else {
            return redirect()->route('product.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'Item action']);
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
        $item = Product::where(['id' => $id, 'hide' => 0])->first();
        if ($item) {
            $item->status = 2;
            $item->hide = 1;
            $item->save();
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Delete Item success', 'title' => 'Item action']);
        } else {
            return redirect()->route('product.create')->with(['type' => 'warning', 'msg' => 'Item not found !', 'title' => 'Item action']);
        }
    }
    public function import()
    {
        $stores = Store::options();
        $data = [
            'pagename' => __('Import items'),
            'stores'=> $stores,
            'breadcrumbs' => [
                '#' => __('Import items')
            ],
        ];
        return view('backend.products.import', $data);
    }
    public function getJsonItem(Request $rq)
    {

        if ($rq->jsonName) {
            $content =  Storage::get($rq->jsonName);
            if ($content) {
                $content = '[' . rtrim($content, ',') . ']';
                return $content;
            } else {
                return '';
            }
        } else
            return response()->json(['status' => 'danger', 'msg' => 'missing parameter'], 400);
    }
    public function validateitem(Request $rq)
    {
        if ($rq->store_id && isset($_FILES['file']) && $_FILES['file']['error'] == 0) {

            $tmpfname = $_FILES['file']['tmp_name'];
            $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
            $excelObj = $excelReader->load($tmpfname);
            $sheet = $excelObj->getSheet(0);
            $lastRow = $sheet->getHighestRow();
            $data = '';
            $tt = 0;
            for ($row = 2; $row <= $lastRow; $row++) {
                $axcode =  (string)$sheet->getCell('A' . $row)->getValue();

                $cat =  (string)$sheet->getCell('D' . $row)->getValue();
                if ($axcode && $cat) {
                    $parent_code =  (string)$sheet->getCell('B' . $row)->getValue();
                    $menucode =  (string)$sheet->getCell('C' . $row)->getValue();
                    $vi_image =  (string)$sheet->getCell('E' . $row)->getValue();
                    $en_image =  (string)$sheet->getCell('F' . $row)->getValue();
                    $vi_name = (string)$sheet->getCell('G' . $row)->getValue();
                    $en_name =  (string)$sheet->getCell('H' . $row)->getValue();
                    $price =  (string)$sheet->getCell('I' . $row)->getValue();
                    $status =  (string)$sheet->getCell('J' . $row)->getValue();
                    $vi_content = (string)$sheet->getCell('K' . $row)->getValue();
                    $en_content = (string)$sheet->getCell('L' . $row)->getValue();
                    $tt++;
                    $jsitem = [
                        'storeid'=>$rq->store_id,
                        'axcode'=>$axcode,
                        'parentcode'=>$parent_code,
                        'menucode'=>$menucode,
                        'cat'=>$cat,
                        'vi_image'=>$vi_image,
                        'en_image'=>$en_image,
                        'vi_name'=>$vi_name,
                        'en_name'=>$en_name,
                        'price'=>$price,
                        'status'=>$status,
                        'vi_content'=>str_replace("\n","<br>",$vi_content),
                        'en_content'=>str_replace("\n","<br>",$en_content)
                    ];
                 //   dd($jsitem);
                    $data .= json_encode($jsitem).',';
                }
            }
            if ($data) {
                $name  = Auth::guard('backend')->user()->username.'_item_' . $rq->cb_nam . '_' . $rq->cb_hk . '_' . time() . '.json';
                Storage::disk('local')->put($name, $data);
                $rs = [
                    'status' => 'success',
                    'msg' => $tt . ' Items is valid',
                    'data' =>  $name
                ];
                return response()->json($rs, 200);
            } else {
                $rs = [
                    'status' => 'danger',
                    'msg' => 'Data is invalid',
                    'data' => ''
                ];
                return response()->json($rs, 200);
            }
        } else {
            $rs = [
                'status' => 'danger',
                'msg' => 'Data is invalid',
                'data' => ''
            ];
            return response()->json($rs, 200);
        }
    }
    public function importPost(Request $rq)
    {
        if ($rq->item) {
            if(is_numeric($rq->item['cat'])){//whereTranslation
                $category = Category::where(['hide' => 0,'id'=>$rq->item['cat'],'store_id'=>$rq->item['storeid']])->first();
            }else{
                $category = Category::whereTranslation('name', $rq->item['cat'])->where(['store_id'=>$rq->item['storeid']])->first();
            }
            if($category)
            {
                $item = Product::where(['hide'=>0,'item_id'=>$rq->item['axcode'],'category_id'=>$category->id,'store_id'=>$rq->item['storeid']])->first();
                if($item)
                {
                    $item->fill([
                        'en'  => [
                            'name' =>  mb_ucfirst($rq->item['en_name']),
                            'image' => $rq->item['en_image']?'/frontend/images/products'.$rq->item['en_image']:'',
                            'content' => mb_ucfirst($rq->item['en_content'])
                        ],
                        'vi'  => [
                            'name' =>  mb_ucfirst($rq->item['vi_name']),
                            'image' =>  $rq->item['vi_image']?'/frontend/images/products'.$rq->item['vi_image']:'',
                            'content' => mb_ucfirst($rq->item['vi_content'])
                        ]
                    ]);
                    $item->pos = 1;
                    $item->status = $rq->item['status'];
                    $item->item_id = $rq->item['axcode'];
                    $item->menu_code = $rq->item['menucode'];
                    $item->parent_code = $rq->item['parentcode'];
                    $item->store_id = $category->store_id;
                    $item->category_id = $category->id;
                    $item->price = is_numeric($rq->item['price'])?(int)$rq->item['price']:0;
                    if ($item->save())
                        return response()->json(['status' => 'success', 'msg' => $rq->item['axcode'].' => Update successful'], 200);
                    else
                        return response()->json(['status' => 'danger', 'msg' => $rq->item['axcode'].' => Update failed', 200]);
                }else{
                    $item = Product::create();
                    $item->fill([
                        'en'  => [
                            'name' =>  mb_ucfirst($rq->item['en_name']),
                            'image' =>  $rq->item['en_image']?'/frontend/images/products'.$rq->item['en_image']:'',
                            'content' =>  mb_ucfirst($rq->item['en_content'])
                        ],
                        'vi'  => [
                            'name' =>  mb_ucfirst($rq->item['vi_name']),
                            'image' =>  $rq->item['vi_image']?'/frontend/images/products'.$rq->item['vi_image']:'',
                            'content' =>  mb_ucfirst($rq->item['vi_content'])
                        ]
                    ]);
                    $item->pos = 1;
                    $item->status = $rq->item['status'];
                    $item->item_id = $rq->item['axcode'];
                    $item->menu_code = $rq->item['menucode'];
                    $item->parent_code = $rq->item['parentcode'];
                    $item->store_id = $category->store_id;
                    $item->category_id = $category->id;
                    $item->price = $rq->item['price']?(int)$rq->item['price']:0;
                    if ($item->save())
                        return response()->json(['status' => 'success', 'msg' => $rq->item['axcode'].' => Import successful'], 200);
                    else
                        return response()->json(['status' => 'danger', 'msg' => $rq->item['axcode'].' => Import failed', 200]);
                }
            }else{
                return response()->json(['status' => 'danger', 'msg' => $rq->item['axcode'].' => <strong>'.$rq->item['cat'].'</strong> not found in selected store.'], 200);
            }
        } else
            return response()->json(['status' => 'danger', 'msg' => 'Data invalid'], 200);
    }
    public function getsync (Request $rq)
    {
        $data =  Product::select(['id','item_id','menu_code'])->where('hide', 0)->get()->map->only(['id','item_id','menu_code']);
        $n = $data->count();
        if($n>0)
        {
            return response()->json(['status'=>'success','msg'=>$n.' items waiting sync price.','list'=>$data], 200);
        }else{
            return response()->json(['status'=>'danger','msg'=>'Data not found'], 404);
        }
    }
    public function sync (Request $rq)
    {
        if($rq->item['item_id'])
        {
            $client = new \GuzzleHttp\Client();
            $rs = $client->request('GET', 'http://stockmgt.annam-gourmet.com/item/'.$rq->item['item_id']);
            $item = json_decode($rs->getBody());
            if($item && $item->sku )
            {
                $pro = Product::where(['hide'=>0,'id'=>$rq->item['id']])->first();
                if($pro)
                {
                    $price = $pro->price;
                    if($pro->price != $item->price){
                        $pro->price = $item->price;
                        $pro->save();
                        return response()->json(['status'=>'success','msg'=>$pro->item_id.' change '.number_format($price).'đ to '.number_format($item->price).'đ','id'=>$pro->id,'price'=>number_format($item->price)], 200);
                    }else{
                        return response()->json(['status'=>'warning','msg'=>$pro->item_id.' AX price is the same.'], 200);
                    }
                }else{
                    return response()->json(['status'=>'danger','msg'=>$item->axcode.' not found in list.'], 200);
                }
            }else{
                return response()->json(['status'=>'danger','msg'=>$rq->item['item_id'].' not found in AX'], 200);
            }
        }else{
            return response()->json(['status'=>'danger','msg'=>'Missing paramater'], 200);
        }
    }
}
