@extends('admin.layouts.app')

@section('content')
<h1>授業一覧</h1>

<div class="grid-container">
    <button class="new-registration">新規登録</button>

    {{-- @forelseを使って、授業がある場合とリストが空の場合の両方を処理 --}}
    @forelse ($lessons as $lesson)
        <div class="card">
            <img src="{{ asset('storage/'.$lesson->thumbnail) }}" alt="授業画像" class="thumbnail">
            <h2 class="title">{{ $lesson->title }}</h2>
            <p class="time">{{ $lesson->start_time->format('Y/m/d H:i') }} ~ {{ $lesson->end_time->format('Y/m/d H:i') }}</p>
            <p class="grade">{{ $lesson->grade }}</p>
            <div class="actions">
                <button class="edit-content">授業内容編集</button>
                <button class="edit-time">配信日時編集</button>
            </div>
        </div>
    @empty
        <p>表示する授業がありません。</p>
    @endforelse
</div>
@endsection
