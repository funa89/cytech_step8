<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateRequest;
use Illuminate\Foundation\Console\StorageLinkCommand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    //商品一覧画面表示
    public function index(Request $request) {
        $product_model = new Product();
        $company_model = new Company();
        $companies = $company_model->index();
        
        // 検索キーワードとメーカーがある場合は検索を実行し、結果をビューに渡す
        $keyword = $request->input('keyword');
        $company = $request->input('company');
    
        if (!empty($keyword) || !empty($company)) {
            $search_results = $product_model->search($keyword, $company);
            return view('index', ['search_results' => $search_results, 'companies' => $companies]);
        }
        
        // 検索キーワードとメーカーがない場合は通常の商品一覧を表示する
        $products = $product_model->index();
        return view('index', ['products' => $products, 'companies' => $companies]);
    }

    // public function index(Request $request) {
    //     $product_model = new Product();
    //     $company_model  = new Company();
    //     $companies = $company_model->index();
        
    //     // 検索キーワードがある場合は検索を実行し、結果をビューに渡す
    //     if ($request->has('keyword')) {
    //         $search_product = $request->input('keyword');
    //         $search_company = $request->input('company');
    //         $search_results = $product_model->search($search_product, $search_company);
            
    //         return view('index', ['search_results' => $search_results, 'companies' => $companies]);
    //     }
        
    //     // 検索キーワードがない場合は通常の商品一覧を表示する
    //     $products = $product_model->index();
    //     return view('index', ['products' => $products, 'companies' => $companies]);
    // }
    //検索
    public function search(Request $request) {
        $keyword = $request->input('keyword');
        $company = $request->input('company');
        
        $product_model = new Product();
        $company_model = new Company();
        $companies = $company_model->index();
        
        $search_results = $product_model->search($keyword, $company);
        
        return view('index', ['search_results' => $search_results, 'companies' => $companies]);
    }
    // public function search(Request $request) {
    //     $search_product = $request->input('keyword');
    //     $search_company = $request->input('company');

    //         $product_model = new Product();
    //         $company_model = new Company();
    //         $companies = $company_model->index();
    //         $products = $product_model->search($search_product, $search_company);
    //     return view('search', ['products' => $products,'companies' => $companies]);  
    // }

    // 新規登録画面の表示
    public function create() {
           $company_model = new Company();
           $companies = $company_model->index();
           return view('create', ['companies' => $companies]);
    }
    //商品新規登録
    public function store(CreateRequest $request){     
    // アップロードされた画像を取得
        $file = $request->file('image');
    // 取得したファイル名で保存
    if ($file) {
        $file_name = $file->getClientOriginalName();
        $file->storeAs('', $file_name);
    } else {
        $file_name = null;
    }

        //トランザクション
        DB::beginTransaction();
        try {
        // 登録処理呼び出し
           $product_model = new Product();
           $product_model->createProduct($request,$file_name);
        DB::commit();
        } catch (\Exception $e) {
        DB::rollback();
        return back();
        }
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
          $company_model = new Company();
          $product = $product_model->getDetail($id);
          $companies = $company_model->index();
          return view ('edit', ['product' => $product, 'companies' => $companies]);
    }  

    // 更新処理
    public function update(Request $request, $id) {
    
      $file = $request->file('image');
      //ファイルがアップロードされたかを確認してからstoreメソッドを呼び出す。
      if ($file) {
        $img_path = $file->store('images');
    } else {
        $img_path = null;
    }
    
      $product = [
        'product_name' => $request->input('product_name'),
        'company_id' => $request->input('company_id'),
        'price' => $request->input('price'),
        'stock' => $request->input('stock'),
        'comment' => $request->input('comment'),
        'img_path' => $img_path,
    ];
    //トランザクション開始
    DB::beginTransaction();
    try {
        // 登録処理呼び出
        $model = new Product();
        $model->updateProduct($id, $product);
        DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        return back();
    }
      // 処理が完了したら自画面にリダイレクト
        // return redirect(route('edit'));
        return redirect()->route('edit',['id' => $id]);
    }

       // アップロードされた画像を取得
       // 取得したファイル名で保存
     // $file_name = $request->file('image')->getClientOriginalName();
    //   $product_name = $request->input('product_name');
    //   $company_id = $request->input('company_id');
    //   $price = $request->input('price');
    //   $stock = $request->input('stock');
    //   $comment = $request->input('comment');
    //   $img_path = $request->input('image');
      
    // $product_model = Product::find($request->product()->id);
    //   $product_model = new Product();
    //   //$product_model->createProduct($request,$file_name);
    //   $product_model->product_name = $product_name;
    //   $product_model->company_id = $company_id;
    //   $product_model->price = $price;
    //   $product_model->stock = $stock;
    //   $product_model->comment = $comment;
    //   $product_model->img_path = $img_path;
    //   $product_model->save();
       // トランザクション
    // DB::beginTransaction();
    // try {
    //     // 更新処理呼び出し
    //     $product_model = new Product();
    //     $product_model->updateData($request,$file_name);
    //     DB::commit();
    // } catch (\Exception $e) {
    //     DB::rollback();
    //     return back();
    // }
      

    // 削除ボタン
    public function delete($id){
        // トランザクション
        DB::beginTransaction();
        try{
            Product::destroy($id);
            DB::commit();
        } catch(\Throwable $e) {
            DB::rollback();
            return back();
        }
        //処理が完了したら自画面にリダイレクト
        return redirect()->route('index');
    }
}