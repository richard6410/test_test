@extends('admin.layouts.app')

@section('title', '配信日時編集')

@section('content')
    <h1>配信日時編集</h1>

    <form action="{{ route('delivery.update', $deliveryTime->curriculums_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div id="delivery-time-container">
            <div class="delivery-time-item">
                <div class="form-group">
                    <label for="delivery_from">配信開始日時</label>
                    <input type="datetime-local" name="delivery_from[]" value="{{ $deliveryTime->delivery_from->format('Y-m-d\TH:i') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="delivery_to">配信終了日時</label>
                    <input type="datetime-local" name="delivery_to[]" value="{{ $deliveryTime->delivery_to->format('Y-m-d\TH:i') }}" class="form-control">
                </div>

                <button type="button" class="btn btn-de remove-delivery-time">&#x2212;</button>
            </div>
        </div>

        <button type="button" class="btn btn-success" id="add-delivery-time">&#x2b;</button>

        <button type="submit" class="btn btn-primary">登録する</button>
    </form>

    <script src="{{ asset('js/script.js') }}"></script>
@endsection
