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

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>syouhingazou</th>
        <th>syouhinmei</th>
        <th>kakaku</th>
        <th>zaikosuu</th>
        <th>maker</th>
    </tr>
    @foreach ($itirans as $itiran)
    <tr>
        <td style="text-align:right">{{$itiran->id}}</td>
        <td>{{$itiran->syouhingazou}}</td>
        <td>{{$itiran->syouhinmei}}</td>
        <td style="text-align:right">{{$itiran->kakaku}}</td>
        <td style="text-align:right">{{$itiran->zaikosuu}}</td>
        <td style="text-align:right">{{$itiran->maker}}</td>
    </tr>
    @endforeach
</table>

    {!! $itirans->links('pagination::bootstrap-5') !!}
@endsection