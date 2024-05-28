@extends('admin.layouts.app')

@section('title', '配信日時編集')

@section('content')
    <h1>配信日時編集</h1>

    <form action="{{ route('delivery.update', $deliveryTime->curriculums_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="delivery_from">配信開始日時</label>
            <input type="datetime-local" id="delivery_from" name="delivery_from" value="{{ $deliveryTime->delivery_from->format('Y-m-d\TH:i') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="delivery_to">配信終了日時</label>
            <input type="datetime-local" id="delivery_to" name="delivery_to" value="{{ $deliveryTime->delivery_to->format('Y-m-d\TH:i') }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">更新する</button>
    </form>
@endsection
