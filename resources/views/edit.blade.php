@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">商品変更画面</h2>
        </div>
</div>

<div style="text-align:right;">
<form action="{{ route('product.update',$product->id) }}" method="POST">
    @method('PUT')
    @csrf

    

    <div class="row">
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            {{ $product->id }}  
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            @if($product->image)
                <img src="{{ asset('storage/images/' . $product->image) }}" alt="商品画像" class="img-thumbnail">
            @else
                <p>画像なし</p>
            @endif
        </div>
        <div class="col-12 mb-2 mt-2">
            <input type="file" name="image" class="form-control" placeholder="商品画像">
        </div>


        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="syouhinmei" value="{{$product->syouhinmei}}" class="form-control" placeholder="商品名">
                @error('syouhinmei')
                <span style="color:red;">商品名を入力してください。</span>
                @enderror
            </div>
        </div>
      
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="kakaku" value="{{$product->kakaku}}" class="form-control" placeholder="価格">
                @error('kakaku')
                <span style="color:red;">価格を入力してください。</span>
                @enderror
            </div>
        </div>
        
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="zaikosuu" value="{{$product->zaikosuu}}" class="form-control" placeholder="在庫数">
                @error('zaikosuu')
                <span style="color:red;">在庫数を入力してください。</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="company" class="form-select">    
                <option value="0">メーカー名</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}"@if($company->id==$product->company) selected @endif>{{ $company->str }}</option>
                    @endforeach
                </select>
                @error('company')
                <span style="color:red;">メーカーを選択してください。</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="comment" value="{{$product->comment}}" class="form-control" placeholder="コメント">
                @error('comment')
                <span style="color:red;">コメントを入力してください。</span>
                @enderror
            </div>
        </div>
       

        <div class="col-12 mb-2 mt-2">
            <button type="submit" class="btn btn-primary">変更</button>
            <a class="btn btn-success" href="{{ route('product.show', $product->id) }}?page_id={{$page_id}}">戻る</a>
            </div>
        </div>
</form>
</div>
<script>
    // 画像プレビューを表示するための関数
    function previewImage() {
        var imageInput = document.getElementById('imageInput');
        var imagePreview = document.getElementById('imagePreview');
        
        if (imageInput.files && imageInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                // ファイルを読み込んでプレビューを更新
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(imageInput.files[0]);
        } else {
            // ファイルが選択されていない場合、デフォルトのプロフィール画像を表示
            imagePreview.src = "{{ asset('storage/images/' . $product->image) }}";
        }
    }

    // ファイル選択時に画像プレビューを表示
    document.getElementById('imageInput').addEventListener('change', previewImage);
</script>

@endsection