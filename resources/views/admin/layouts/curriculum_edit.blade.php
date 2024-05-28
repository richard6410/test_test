@extends('admin.layouts.app')

@section('title', '授業設定')

@section('content')
<h2>授業設定</h2>

<form action="{{ route('curriculum.update',$curriculum->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="form-image-container">
        <div class="image-container">
            <img id="image-preview" src="#" alt="Image Preview">
        </div>
        <div class="file-input-container">
            <label for="thumbnail">サムネイル画像</label>
            <input type="file" id="thumbnail" name="thumbnail">
        </div>
    </div>

    <div class="form-container">
        <div class>
            <label for="classes_id">クラスID</label>
            <input type="text" id="classes_id" name="classes_id" value="{{ $curriculum->classes_id }}">
        </div>
        <div>
            <label for="title" class="label">授業名</label>
            <input type="text" id="title" name="title" value="{{ $curriculum->title }}">
        </div>
        <div>
            <label for="video_url" class="label">動画URL</label>
            <input type="text" id="video_url" name="video_url" value="{{ $curriculum->video_url }}">
        </div>
        <div>
            <label for="description" class="label">授業概要</label>
            <textarea id="description" name="description" value="{{ $curriculum->description }}"></textarea>
        </div>
    </div>
        <div class="check">
            <label for="always_delivery_flg">常時公開</label>
            <input type="checkbox" id="always_delivery_flg" name="always_delivery_flg" value="{{ $curriculum->checkbox }}">
        </div>
        <div class="button-container">
            <button type="submit" class="submit-button">登録</button>
        </div>
</form>
@endsection
