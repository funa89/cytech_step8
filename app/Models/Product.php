<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Product extends Model{
    //use HasFactory;
    //リレーション（Eloquentで必要）
    //public function sales(){
      //return $this->hasMany(Sale::class);
    //}//6/20
    //public function company(){
    //  return $this->belongsTo(Company::class);
    //}//6/20

    //テーブル名指定
    protected $table = 'products';

    //ホワイトリスト
    protected $fillable = ['company_id','product_name','price','stock','img_path','created_at','updated_at'];

    public $timestamps = true;
    
    // 一覧画面表示
    public function index() {
    // productsテーブルからデータを取得（クエリビルダ）
    $products = DB::table('products')
        ->join('companies', 'company_id', '=', 'companies.id')
        ->select('products.*', 'companies.company_name')
        ->get();
        return $products;
    }

    // 詳細画面表示
    public function getDetail($id) {
    // productsテーブルからデータを取得（クエリビルダ）
    $product = DB::table("products")
        ->join('companies', 'company_id', '=', 'companies.id')
        ->select('products.*', 'companies.company_name')
        ->where('products.id', '=', $id)
        ->first();
        return $product;
    }

    //商品登録機能
    public function createProduct($product,$file_name) {
      $img_path = $file_name;

      DB::table('products')->insert([
          'company_id' => $product->company_id,
          'product_name' => $product->product_name,
          'price' => $product->price,
          'stock' => $product->stock,
          'comment' => $product->comment,
          'img_path'  => $img_path,
      ]);
     }


    //編集画面
     public function getEdit($id) {
    // productsテーブルからデータを取得（クエリビルダ）
     $product = DB::table('products')
        ->join('companies', 'company_id', '=', 'companies.id')
        ->select('products.*', 'companies.company_name')
        ->where('products.id', '=', $id)
        ->first();
      return $product;
    }
    
    //商品更新
    public function updateProduct($id, $product) {
         DB::table('products')->where('id', $id)->update($product);
    }


    public function search($keyword, $company) {
      $query = DB::table('products')
          ->join('companies', 'company_id', '=', 'companies.id')
          ->select('products.*', 'companies.company_name');
  
      if (!empty($keyword)) {
          $query->where('products.product_name', 'like', "%$keyword%");
      }
  
      if (!empty($company)) {
          $query->where('companies.id', $company);
      }
  
      $products = $query->get();
  
      return $products;
  }
  
//     public function search(Request $request) {
//       $keyword = $request->input('keyword');
    
//       $products = DB::table('products')
//           ->join('companies', 'company_id', '=', 'companies.id')
//           ->select('products.*', 'companies.company_name')
//           ->where('products.product_name', 'like', "%$keyword%")
//           ->get();
    
//       return view('index', ['products' => $products]);
//     }
 }
