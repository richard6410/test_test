<form action="{{ route('product.search') }}" method="GET">
    <div class="form-group">
        <input type="text" name="keyword" class="form-control" placeholder="商品名を検索">
    </div>
    <button type="submit" class="btn btn-primary">検索</button>
</form>
