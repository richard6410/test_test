<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Maker;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    // index メソッド

    public function index()
    {
        $products = product::select([
            'b.id',
            'b.image',
            'b.syouhinmei',
            'b.kakaku',
            'b.zaikosuu',
            'b.comment',
            'r.str as maker',
        ])
        ->from('products as b')
        ->join('makers as r', function($join) {
            $join->on('b.maker','=', 'r.id');
        })
        ->orderBy('b.id','DESC')
        ->paginate(5);

        return view('index',compact('products'))
            ->with('page_id',request()->page)
            ->with('i',(request()->input('page',1) -1)*5);
    }


    public function create()
    {
        $makers = Maker::all();
        return view('create')->with('page_id', request()->page_id)->with('makers', $makers);
    }

    public function store(Request $request)
    {
        $request->validate([
            // バリデーションルール
        ]);

        $data = $request->all();
        Product::createProduct($data);

        return redirect()->route('product.create')->with('success', '登録しました');
    }

    public function show(Product $product)
    {
        $makers = Maker::all();
        return view('show', compact('product', 'makers'))->with('page_id', request()->page_id);
    }

    public function edit(Product $product)
    {
        $makers = Maker::all();
        return view('edit', compact('product', 'makers'))->with('page_id', request()->page_id);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            // バリデーションルール
        ]);

        $data = $request->all();
        Product::updateProduct($product, $data);

        return redirect()->route('products.index')->with('success', '変更しました');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', '商品'.$product->syouhinmei.'を削除しました');
    }

    public function search(Request $request)
    {
        $syouhinmei = $request->input('syouhinmei');
        $maker = $request->input('maker');

        $products = Product::searchProducts($syouhinmei, $maker);
        $page_id = $request->input('page_id');

        return view('index')->with(['products' => $products, 'page_id' => $page_id]);
    }
}

