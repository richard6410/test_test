@extends('admin.layouts.app')

@section('title', '配信日時設定')

@section('content')

<div id="date-time-form">
    <h2>配信日時設定</h2>
    
    <form method="POST" action="{{ route('save_delivery') }}">
    @csrf
        <div class="title-entry">
            <input type="text" id="class-title" name="class-title" placeholder="授業タイトルを入力">
        </div>


        <div class="date-time-entry">
            <input type="date" id="start-date" name="start-date">
            <input type="time" id="start-time" name="start-time">
            <span>〜</span>
            <input type="date" id="end-date" name="end-date">
            <input type="time" id="end-time" name="end-time">
            <button type="button" class="delete-btn"></button>
        </div>
        <button type="button" id="add-button"></button>
        <div class="button-container">
            <input type="submit" class="submit-button" value="登録">
        </div>
    </form>
</div>
@endsection
