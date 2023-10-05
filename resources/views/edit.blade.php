@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">商品変更画面</h2>
        </div>
</div>

<div style="text-align:right;">
<form action="{{ route('itiran.update',$itiran->id) }}" method="POST">
    @method('PUT')
    @csrf

    <div class="row">
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="syouhinmei" value="{{$itiran->syouhinmei}}" class="form-control" placeholder="商品名">
                @error('syouhinmei')
                <span style="color:red;">商品名を入力してください。</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="maker" class="form-select">    
                <option value="0">メーカー名</option>
                    @foreach($makers as $maker)
                        <option value="{{ $maker->id }}"@if($maker->id==$itiran->maker) selected @endif>{{ $maker->str }}</option>
                    @endforeach
                </select>
                @error('maker')
                <span style="color:red;">メーカーを選択してください。</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="kakaku" value="{{$itiran->kakaku}}" class="form-control" placeholder="価格">
                @error('kakaku')
                <span style="color:red;">価格を入力してください。</span>
                @enderror
            </div>
        </div>
        
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="zaikosuu" value="{{$itiran->zaikosuu}}" class="form-control" placeholder="在庫数">
                @error('zaikosuu')
                <span style="color:red;">在庫数を入力してください。</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            @if($itiran->syouhingazou)
                <img src="{{ asset('storage/images/' . $itiran->syouhingazou) }}" alt="商品画像" class="img-thumbnail">
            @else
                <p>画像なし</p>
            @endif
        </div>
        <div class="col-12 mb-2 mt-2">
            <input type="file" name="syouhingazou" class="form-control" placeholder="商品画像">
        </div>

        <div class="col-12 mb-2 mt-2">
            <button type="submit" class="btn btn-primary">変更</button>
            <a class="btn btn-success" href="{{ route('itiran.show', $itiran->id) }}?page_id={{$page_id}}">戻る</a>
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
            imagePreview.src = "{{ asset('storage/images/' . $itiran->syouhingazou) }}";
        }
    }

    // ファイル選択時に画像プレビューを表示
    document.getElementById('imageInput').addEventListener('change', previewImage);
</script>

@endsection