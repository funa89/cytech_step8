<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    //商品一覧画面表示
    public function index() {
        $product_model = new Product();
        $company_model  = new Company();
        $companies = $company_model->index();
        $products = $product_model->index();
        return view('index', ['products' => $products],['companies' => $companies]);
        }


  //検索
    public function Search(Request $request) {
        $search_product = $request->input('keyword');
        $search_company = $request->input('company');
        DB::beginTransaction();

        try {
            $product_model = new Product();
            $company_model = new Company();
            $companies = $company_model->index();
            $products = $product_model->getProductSearch($search_product, $search_company);
            DB::commit();
        }catch (\Exception $e){
            DB::rollback();
            return back();
        }
        return view('index', ['products' => $products,'companies' => $companies]);  
    }

    // 新規登録画面の表示
    public function create() {
           $company_model = new Company();
           $companies = $company_model->index();
           return view('create', ['companies' => $companies]);
    }

 
    //商品新規登録
    public function store(CreateRequest $request){     
           // $data = new Product();
            //$data->company_id=$request->company_id;
           // $data->product_name=$request->product_name;
           // $data->price=$request->price;
           // $data->stock=$request->stock;
           // $data->comment=$request->comment;
           // $data->save();
                //dd($request);

             Product::create([
                'product_name' => $request->product_name,
                'company_id' => $request->company_id,
                'price' => $request->price,
                'stock' => $request->stock,
                'comment' => $request->comment,
                'img_path' => $request->img_path,
                //dd($request)
           ]);
            //処理が完了したら自画面にリダイレクト
            return redirect()->route('create');
            }

    // 詳細画面
    public function showDetail($id){   
           $product_model = new Product();
           $product = $product_model->getDetail($id);
           return view ('detail', compact('product'));
    }

    // 編集画面
    public function showEdit($id){   
          $product_model = new Product();
          $product = $product_model->getDetail($id);
          return view ('edit', compact('product'));
    }  

    // 更新する
    public function update(CreateRequest $request) {
    //dd($request);
    // トランザクション開始
    DB::beginTransaction();
    try {
        // 登録処理呼び出し
        $product_model = new Product();
        $product_model->createProduct($request);
        DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        return back();
    }

    // 処理が完了したら自画面にリダイレクト
    return redirect()->route('edit');
}

    // 削除ボタン
    public function delete($id){

        // トランザクション開始
        DB::beginTransaction();
        try{
            Product::destroy($id);
            DB::commit();
        } catch(\Throwable $e) {
            DB::rollback();
            return back();
        }
        return redirect()->route('index');
    }
}