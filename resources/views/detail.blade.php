<h1>商品情報登録</h1>

@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('products.store') }}">
    @csrf

    <div>
        <label for="name">商品名</label>
        <input type="text" name="name" id="name" required autofocus>
    </div>

    <div>
        <label for="company">企業名</label>
        <input type="text" name="company" id="company" required>
    </div>

    <div>
        <label for="price">価格</label>
        <input type="number" name="price" id="price" required>
    </div>

    <div>
        <button type="submit">登録</button>