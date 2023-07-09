@extends('layouts.app')

@section('title','商品一覧')
@section('content')
<div class = "row">
  <div class = "col-md-10">
    <h2>商品一覧画面</h2>

    <!-- エラーがある場合に表示される -->
    @if (session ('err_msg')) 
    <p class = "text-danger">{{ session ('err_msg') }}</p>
    @endif

<!-- 検索フォーム -->
<div class = "searchall">
    <div class="search">
        <div>
            <div class="post-search-form col-md-6">
                <form class="form-inline" action="{{ route('search') }}" method="Post"> 
                   @csrf
                   <div class="form-group">
                       <input type="key" name="keyword" class="form-control" placeholder="キーワード検索" id = "keyword">
                   </div>
                    
              </form> 
            </div>
        </div>
    </div>
  </div>


<!-- カテゴリー -->
  <div class="pull">
          <select class="form-control" id="company_id" name="company_id">
                  <option value="">メーカー名</option>
             @foreach ($companies as $company)
                  <option value="{{ $company->id }}">{{ $company->company_name }}</option>
             @endforeach
          </select>
  </div>

  <div class="search">
           <button type="submit" class="btn-outline-secondary" id ="serch-btn">検索</button>
  </div>
</div>
        </div>
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>商品画像</th>
          <th>商品名</th>
          <th>価格</th>
          <th>在庫数</th>
          <th>メーカー名</th>
          <th>
          <!-- 新規登録ボタン -->
          <div class="container">
          <button onclick="location.href='./create'" class="btn btn-success btn-sm">新規登録</button>
          </div></th>
          <th></th>
        </tr>
    </thead>
      <tbody id="productList">
      @foreach($products as $product)
        <tr>
            <td>{{ $product->id}}</td>
            <td>{{ $product->img_path}}</td>
            <td>{{ $product->product_name}}</td>
            <td>{{ $product->price}}</td>
            <td>{{ $product->stock}}</td>
            <td>{{ $product->company_name}}</td>

            <!-- 詳細ボタン -->
            <td><a href="{{ route('detail', $product->id) }}"class="btn btn-primary btn-sm">詳細</a></td>
            <!-- 削除ボタン -->
            <td>
                <form method="POST" action="{{ route('delete', $product->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="btn btn-danger btn-sm" onclick='return confirm("削除しますか？");'>削除</button>
                </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </thead>
    <br>
    <!-- サーバーに送信されるデータを格納するために使用 -->
    <input id="storedWord" name="storedWord" type="hidden">
    <input id="storedCompany" name="storedCompany" type="hidden">
    <input id="storedUpperPriceLimit" name="storedUpperPriceLimit" type="hidden">
    <input id="storedLowerPriceLimit" name="storedLowerPriceLimit" type="hidden">
    <input id="storedUpperStockLimit" name="storedUpperStockLimit" type="hidden">
    <input id="storedLowerStockLimit" name="storedLowerStockLimit" type="hidden">
    <input id="storedPressedButton" name="storedPressedButton" type="hidden">
    <input id="storedSortToggle" name="storedSortToggle" type="hidden">
  </div>
</div>
@endsection