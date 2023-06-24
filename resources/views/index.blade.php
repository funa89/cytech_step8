@extends('layouts.app')

@section('content')
<div class="container">
商品一覧<br>
    <table>
        @csrf
        <tr>
            <th>ID</th><th>商品画像</th><th>商品名</th><th>価格</th><th>在庫数</th><th>メーカー名</th><th>新規登録</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->img_path }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->company_id }}</td>
            <td><a href="{{ $product->id }}" class="btn btn-detail">詳細</a></td>     
        </tr> 
    @endforeach 
    </table>
</div>
@endsection
