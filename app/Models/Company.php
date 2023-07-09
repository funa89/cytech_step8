<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
     
    //use HasFactory;
    // テーブル名
    protected $table = 'companies';

    // ホワイトリスト
    protected $fillable =['company_name','street_address', 'representative_name',];

    // 一覧画面表示
    public function index() {
        // Companyテーブルからデータを取得
        $companies = DB::table('companies')
        ->get();

        return $companies;
    }

    public function products(){
       return $this->hasMany(Product::class);
      }//6/20

    
    //public function getList(){
    //    $companies = Company::all();
    //    return view('index')->with('companies', $companies);
    }//DBからcompaniestableのデータを持ってくる。


