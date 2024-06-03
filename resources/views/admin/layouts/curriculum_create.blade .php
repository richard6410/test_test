@extends('admin.layouts.app')

@section('title', '授業設定')

@section('content')
<h2>授業設定</h2>

<form action="{{ route('curriculum.update',$curriculum->id) }}" method="POST" enctype="multipart/form-data">
    @method('POST')
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
        <div class="form-group">
            <label for="classes_id">学年</label>
            <select id="classes_id" name="classes_id" class="form-control">
                @foreach($grades as $grade)
                    <option value="{{ $grade->id }}" {{ $curriculum->classes_id == $grade->id ? 'selected' : '' }}>{{ $grade->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title" class="label">授業名</label>
            <input type="text" id="title" name="title" value="{{ $curriculum->title }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="video_url" class="label">動画URL</label>
            <input type="text" id="video_url" name="video_url" value="{{ $curriculum->video_url }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="description" class="label">授業概要</label>
            <textarea id="description" name="description" class="form-control">{{ $curriculum->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="always_delivery_flg">常時公開</label>
            <input type="checkbox" id="always_delivery_flg" name="always_delivery_flg" {{ $curriculum->always_delivery_flg ? 'checked' : '' }}>
        </div>
        <div class="button-container">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </div>
</form>
@endsection