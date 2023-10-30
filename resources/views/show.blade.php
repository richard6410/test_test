@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">商品詳細画面</h2>
        </div>
    </div>
</div>

<div style="text-align:left;">
<form action="{{ route('product.update',$product->id) }}" method="POST">
    @method('PUT')
    @csrf

    <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            {{ $product->id }}  
            </div>
    </div>

    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
            商品画像: 
            @if($product->image)
               <img src="{{ asset('storage/images/' . $product->image) }}" alt="商品画像">
            @else
               画像なし
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            {{ $product->syouhinmei }}  
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            {{ $product->kakaku }}  
            </div>
        </div>
        
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            {{ $product->zaikosuu }}  
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                    @foreach($companies as $company)
                        @if($company->id==$product->company) {{ $company->str }}@endif
                    @endforeach
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            {{ $product->comment }}  
            </div>
        </div>
        
        <div class="col-12 mb-2 mt-2 text-right">
            <a class="btn btn-primary ml-2" href="{{ route('product.edit', $product->id) }}?page_id={{$page_id}}">変更</a>
            <a class="btn btn-success" href="{{ url('/products') }}?page={{ $page_id }}">戻る</a>
        </div>
</form>
</div>
@endsection