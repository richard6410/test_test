@extends('app')

@section('content')
    <div class="row">
        <div class="col">
            <input type="text" name="syouhinmei" class="form-control" placeholder="商品名で検索">
        </div>
        <div class="col">
            <select name="maker" class="form-control">
                <option value="" selected>メーカーを選択</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <!-- 他のメーカーを追加 -->
            </select>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">検索</button>
        </div>
    </div>
</form>
    <div class="text-right">
    <a class="btn btn-success" href="{{ route('itiran.create')}}?page_id={{$page_id}}">新規登録</a>
    </div>
</div>
</div>
<div class="col-lg-12">
    @if ($message =Session::get('success'))
        <div class="alert-success mt-1"><p>{{$message}}</p></div>
    @endif
</div>
</div>


<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>商品画像</th>
        <th>商品名</th>
        <th>価格</th>
        <th>在庫数</th>
        <th>メーカー名</th>
        <th></th>
        <th></th>

    </tr>
    @foreach ($itirans as $itiran)
    <tr>
        <td style="text-align:right">{{$itiran->id}}</td>
        <td style="text-align:right">{{$itiran->image}}</td>
        <td><a class="" href="{{ route('itiran.show' , $itiran->id) }}?page_id={{$page_id}}">{{$itiran -> syouhinmei}}</a></td>
        <td style="text-align:right">{{$itiran->kakaku}}円</td>
        <td style="text-align:right">{{$itiran->zaikosuu}}</td>
        <td style="text-align:right">{{$itiran->maker}}</td>
        <td style="text-align:center">
            <a class="btn btn-primary" href="{{ route('itiran.show', $itiran->id) }}?page_id={{$page_id}}">詳細</a>
        </td>
        <td style="text-align:center">
            <form action ="{{ route('itiran.destroy',$itiran -> id )}}"method="POST">
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick = 'return confirm("削除しますか？");'>削除</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

    {{$itirans->links('pagination::bootstrap-5')}}
@endsection