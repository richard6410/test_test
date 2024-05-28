@extends('admin.layouts.app')

@section('title', '授業一覧')

@section('content')
<h1>授業一覧</h1>

<div class="cards">
    @foreach ($curriculums as $curriculum)
        <div class="card">
            <img src="{{ asset('storage/images/' . $curriculum->thumbnail) }}" alt="カリキュラム画像">
            <div class="card-body">
                <h3 class="card-title">{{ $curriculum->title }}</h3>
                <p>{{ $curriculum->description }}</p>
                @if ($curriculum->deliveryTimes->isNotEmpty())
                    <p>配信日時:</p>
                    <ul>
                        @foreach ($curriculum->deliveryTimes as $deliveryTime)
                            <li>{{ $deliveryTime->delivery_from }} 〜 {{ $deliveryTime->delivery_to }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>配信日時は設定されていません。</p>
                @endif
                <a href="{{ route('curriculum.edit', $curriculum->id) }}" class="btn btn-primary">授業内容編集</a>
                <a href="{{ route('delivery.edit', $curriculum->id) }}" class="btn btn-primary">配信日時編集</a>
            </div>
        </div>
    @endforeach
</div>
@endsection

