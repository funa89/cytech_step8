@extends('layouts.app')

@section('title', '編集画面')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h2>商品編集画面</h2>
        <form method="POST" action="{{ route('update') }}" onSubmit="checkSubmit()">
        @csrf

    <div class="edit-title">
        <h5>ID.{{ $product->id}}</h5>
    </div>

<div class="form-edit">
<!-- 商品名 -->
  <div class="form-name">
     <label for="company_id">{{ __('商品名*') }}</label>
     <input type="text" class="form-control name="product_name" id="company_id" value="{{ $product->product_name}}">
     @if ($errors->has('company_id'))
      <span class="invalid-feedback" role="alert">
      {{ $errors->first('company_id') }}
      </span>
     @endif
  </div>
<!-- メーカー名-->
  <div class="form-company">
     <label for="company_name">メーカー名</label>
        <select name="company_id" id="company" class="form-control">
             @foreach ($companies as $company)
             <option value="{{ $company->id }}" @if($company->id == $product->company_id) selected @endif>{{ $company->company_name }}</option>
             @endforeach
        </select>
  </div>
<!-- 価格登録 -->
  <div class="form-price">
    <label for="price">価格*</label>
    <input type="price" class="form-control" id="price" name="price" placeholder="Price" value="{{ $product->price}}">
    @if ($errors->has('price'))
    <div class="text-danger">
            <p>{{ $errors->first('price') }}</p>
    @endif
  </div>
<!-- 在庫数登録 -->
  <div class="form-stock">
    <label for="stock">在庫数*</label>
    <input type="stock" class="form-control" id="stock" name="stock" placeholder="Stock" value="{{ $product->stock}}">
    @if ($errors->has('stock'))
    <div class="text-danger">
            <p>{{ $errors->first('stock') }}</p>
    </div>
    @endif
  </div>
<!-- コメント -->
  <div class="form-comment">
    <label for="comment">コメント</label>
    <textarea class="form-control" id="comment" name="comment"></textarea>
      @if ($errors->has('comment'))
    <div class="text-danger">
            {{ $errors->first('comment') }}
    </div>
      @endif
  </div>
<!-- 画像　-->
  <div class="form-img">
     <label for="img">商品画像</label>
     @csrf
     <input type="file" name="image">
  </div>

</div>
<!-- 登録ボタン -->
<div class="edit-bottom" >
         <div class="mt-5">
           <button type="submit" class="btn btn-info btn-sm">更新</button>
                <div class="editback">
                    <input class="btn btn-primary btn-sm" type="button" onclick="history.back(-1)" value="戻る">
                </div>
          </div>
</form>
    </div>
</div>

 
<!-- 確認表示 -->
<script>
function checkSubmit(){
    if(window.confirm('更新してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
@endsection