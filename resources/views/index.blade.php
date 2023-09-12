@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-right-left">
                <h2 style="font-size:lrem,">新規登録</h2>
    </div>
    <div class="text-right">
    <a class="btn btn-success" href="{{ route('itiran.create')}}">新規登録</a>
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
        <th>syouhinmei</th>
        <th>kakaku</th>
        <th>zaikosuu</th>
        <th>maker</th>
        <th></th>
        <th></th>

    </tr>
    @foreach ($itirans as $itiran)
    <tr>
        <td style="text-align:right">{{$itiran->id}}</td>
        <td><a class="" href="{{ route('itiran.show' , $itiran->id) }}">{{$itiran -> syouhinmei}}</a></td>
        <td style="text-align:right">{{$itiran->kakaku}}円</td>
        <td style="text-align:right">{{$itiran->zaikosuu}}</td>
        <td style="text-align:right">{{$itiran->maker}}</td>
        <td style="text-align:center">
            <a class="btn btn-primary" href="{{ route('itiran.edit', $itiran->id) }}">変更</a>
        </td>
        <td style="text-align:center">
            <form action ="{{ route('itiran.destroy',$itiran -> id )}}"merhod="POST"
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick = 'return confirm("削除しますか？");'>削除</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

    {!! $itirans->links('pagination::bootstrap-5') !!}
@endsection