@extends('admin.layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/curriculum_create_styles.css') }}">

    <h2>授業設定</h2>

    <form id="class-setting-form" action="{{ route('classsetting.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @isset($curriculum)
            <input type="hidden" name="curriculum_id" value="{{ $curriculum->id }}">
            <!-- サムネイル画像があれば表示する -->
            @if(Storage::exists($curriculum->thumbnail_path))
                <div>
                    <img src="{{ Storage::url($curriculum->thumbnail_path) }}" alt="サムネイル" style="width:100px; height:auto;">
                </div>
            @endif
        @endisset
        <div class=a>
        <div>
            <label for="thumbnail">サムネイル画像</label>
            <input type="file" id="thumbnail" name="thumbnail">
        </div>
        <div>
            <label for="grade">学年</label>
            <select id="grade" name="grade">
               
            </select>
        </div>
        <div>
            <label for="name">授業名</label>
            <input type="text" id="name" name="name" value="{{ $curriculum->title ?? '' }}">
        </div>
        <div>
            <label for="video_url">動画URL</label>
            <input type="text" id="video_url" name="video_url" value="{{ $curriculum->video_url ?? '' }}">
        </div>
        <div>
            <label for="description">授業概要</label>
            <textarea id="description" name="description">{{ $curriculum->description ?? '' }}</textarea>
        </div>
        
        <div>
            <label for="public">常時公開</label>
            <input type="checkbox" id="public" name="public" value="1" {{ isset($curriculum) && $curriculum->alway_delivery_flg ? 'checked' : '' }}>
        </div>
        <button type="submit" class="submit-button">登録</button>
        </div class=a>
    </form>
@endsection
