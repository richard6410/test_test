@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">商品新規登録画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/itirans') }}">戻る</a>
        </div>
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
                <option>メーカー名</option>
                    @foreach($makers as $maker)
                        <option value="{{ $maker->id }}"@if($maker->id==$itiran->maker) selected @endif>{{ $itiran->str }}</option>
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
            <button type="submit" class="btn btn-primary w-100">登録</button>
            </div>
        </div>
</form>
</div>
@endsection