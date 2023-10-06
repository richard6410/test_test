@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">商品新規登録画面</h2>
        </div>
    </div>
</div>

<div style="text-align:right;">
<form action="{{ route('itiran.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
    <div class="col-12 mb-2 mt-2">
            <img id="icon_img_prv" class="img-thumbnail h-25 w-25 mb-3"src="{{ asset('/storage/img/profile.jpg') }}">
        </div>
            <div class="form-group">
                <input type="file" name="image" id="image" class="form-control" placeholder="商品画像">
            </div>
        </div>
        <script>
document.getElementById('image').addEventListener('change', function() {
    var imageInput = this;
    var imagePreview = document.getElementById('icon_img_prv');
    
    if (imageInput.files && imageInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            // ファイルを読み込んでプレビューを更新
            imagePreview.src = e.target.result;
        };

        reader.readAsDataURL(imageInput.files[0]);
    } else {
        // ファイルが選択されていない場合、デフォルトのプロフィール画像を表示
        imagePreview.src = "{{ asset('/storage/img/profile.jpg') }}";
    }
});
</script>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="syouhinmei"  class="form-control" placeholder="商品名">
                @error('syouhinmei')
                <span style="color:red;">商品名を入力してください。</span>
                @enderror
            </div>
        </div>
 
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="kakaku" class="form-control" placeholder="価格">
                @error('kakaku')
                <span style="color:red;">価格を入力してください。</span>
                @enderror
            </div>
        </div>
        
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="zaikosuu" class="form-control" placeholder="在庫数">
                @error('zaikosuu')
                <span style="color:red;">在庫数を入力してください。</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="maker" class="form-select">    
                <option>メーカー名</option>
                    @foreach($makers as $maker)
                        <option value="{{$maker->id}}">{{$maker->str}}</option>
                    @endforeach
                </select>
                @error('maker')
                <span style="color:red;">メーカーを選択してください。</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <button type="submit" class="btn btn-primary">登録</button>
            <a class="btn btn-success" href="{{ url('/itirans') }}?page={{ $page_id }}">戻る</a>
        </div>
    </div>
</form>
</div>

<script>
document.getElementById('registrationButton').addEventListener('click', function(e) {
    e.preventDefault(); // ページ遷移を防ぐ
    document.getElementById('registrationForm').submit(); // フォームをサブミット
});
</script>

@endsection