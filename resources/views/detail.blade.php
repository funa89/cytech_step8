@extends('layouts.app')

@section('title', '詳細画面')

@section('content')
<h3>詳細画面</h3>
<table class="table table-striped mx-auto">
  <thead>
    <tr>
    <th>ID</th>
    <th>商品画像</th>
    <th>商品名</th>
    <th>メーカー名</th>
    <th>価格</th>
    <th>在庫数</th>
    <th>コメント</th>
    <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <td>{{ $product->id}}</td>
    <td><img width="50px" src="{{ asset('storage/' . $product->img_path) }}"></td>
    <td>{{ $product->product_name}}</td>
    <td>{{ $product->company_name}}</td>
    <td>{{ $product->price}}</td>
    <td>{{ $product->stock}}</td>
    <td>{{ $product->comment}}</td>
    <td><a href="{{ route('edit', $product->id) }}"class="btn btn-success btn-sm">編集</a></td>
    </tr>
  </tbody>
</table>
  <!-- 戻るボタン -->
  <div class="detailback">
    <input class="btn btn-primary btn-sm" type="button" onclick="history.back(-1)" value="戻る">
  </div>
</body>
  
@endsection 