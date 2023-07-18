@extends('layouts.app')

@section('title','商品一覧')
@section('content')
<div class="row">
    <div class="col-md-10">
        <h2>商品一覧画面</h2>

        <!-- エラーがある場合に表示される -->
        @if (session('err_msg'))
        <p class="text-danger">{{ session('err_msg') }}</p>
        @endif

        <!-- 検索フォーム -->
        <div class="search">
            <div>
                <div class="post-search-form col-md-6">
                    <form class="form-inline" action="{{ route('search') }}" method="GET">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="keyword" class="form-control" placeholder="キーワード検索"
                                id="keyword">
                        </div>

                        <!-- カテゴリー -->
                        <div class="form-group">
                            <select class="form-control" id="company_id" name="company">
                                <option value="">メーカー名</option>
                                @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-secondary" id="serch-btn">検索</button>
                        </div>
                    </form>
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

                    <!-- 新規登録ボタン -->
                    <th>
                        <div class="container">
                            <button onclick="location.href='./create'" class="btn btn-success btn-sm">新規登録</button>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody id="productList">
                @if(isset($search_results))
                <h2>検索結果</h2>
                @foreach($search_results as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><img width="50px" src="{{ asset('storage/' . $product->img_path) }}" /></td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->company_name }}</td>
                    <td><a href="{{ route('detail', $product->id) }}"
                            class="btn btn-primary btn-sm">詳細</a></td>
                    <td>
                        <form method="POST" action="{{ route('delete', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('削除しますか？');">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><img width="50px" src="{{ asset('storage/' . $product->img_path) }}" /></td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->company_name }}</td>
                    <td><a href="{{ route('detail', $product->id) }}"
                            class="btn btn-primary btn-sm">詳細</a></td>
                    <td>
                        <form method="POST" action="{{ route('delete', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('削除しますか？');">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <br>
    </div>
</div>
@endsection
