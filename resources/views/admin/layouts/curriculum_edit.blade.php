@extends('admin.layouts.app')

@section('title', '授業設定')

@section('content')
<h2>授業設定</h2>

<form id="curriculum_edit-form" action="{{ route('admin.curriculums.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-image-container">
        <div class="image-container">
            <img id="image-preview" src="#" alt="Image Preview">
        </div>
        <div class="file-input-container">
            <label for="image">サムネイル画像</label>
            <input type="file" id="image" name="image">
        </div>
    </div>

    <div class="form-container">
        <div>
            <label for="grade" class="label">学年</label>
            <select id="grade" name="grade">
                <option value="">選択してください</option>
                    <option value="小学1年生">小学1年生</option>
                    <option value="小学2年生">小学2年生</option>
                    <option value="小学3年生">小学3年生</option>
                    <option value="小学4年生">小学4年生</option>
                    <option value="小学5年生">小学5年生</option>
                    <option value="小学6年生">小学6年生</option>
                    <option value="中学1年生">中学1年生</option>
                    <option value="中学2年生">中学2年生</option>
                    <option value="中学3年生">中学3年生</option>
                    <option value="高校1年生">高校1年生</option>
                    <option value="高校2年生">高校2年生</option>
                    <option value="高校3年生">高校3年生</option>
            </select>
        </div>
        <div>
            <label for="name" class="label">授業名</label>
            <input type="text" id="name" name="name" value="{{ $curriculum->title ?? '' }}">
        </div>
        <div>
            <label for="video_url" class="label">動画URL</label>
            <input type="text" id="video_url" name="video_url" value="{{ $curriculum->video_url ?? '' }}">
        </div>
        <div>
            <label for="description" class="label">授業概要</label>
            <textarea id="description" name="description">{{ $curriculum->description ?? '' }}</textarea>
        </div>
    </div>
        <div class="check">
            <label for="public">常時公開</label>
            <input type="checkbox" id="public" name="public" value="1" {{ isset($curriculum) && $curriculum->alway_delivery_flg ? 'checked' : '' }}>
        </div>
        <div class="button-container">
            <button type="submit" class="submit-button">登録</button>
        </div>
</form>
@endsection
