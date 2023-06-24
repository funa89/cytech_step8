<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    //    'price' => 'string',
      //  'stock' => 'string',
        //'comment' => 'string'

    //];
    public function getList(){
        $products = DB::table('products')->get();
        return $products;
    }//DBからproductstableのデータを持ってくる。

   //protected $products = "product";
    protected $fillable = ['product_name','price','stock','comment','img_path'];

    public function sales(){
        return $this->hasMany('App\Models\Sale');
      }//6/20
      public function company(){
        return $this->belongsTo('App\Models\Company');
      }//6/20
}


