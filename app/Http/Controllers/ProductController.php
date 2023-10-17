<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Maker;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makers = Maker::all();
        return view('create')
            ->with('page_id',request()->page_id)
            ->with('makers',$makers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'syouhinmei' => 'required|max:20',
            'maker' => 'required|integer',
            'kakaku' => 'required|integer',
            'zaikosuu' => 'required|integer',
            'comment' => 'required|max:100',
        ]);
        
        $product = new Product;
        

        if ($request->hasFile('image')) {
            $original = $request->file('image')->getClientOriginalName();
            $name = date('Ymd_His') . '_' . $original;
            $file = $request->file('image')->storeAs('public/images', $name); // 画像を指定ディレクトリに保存
            $product->image = $name; // ファイル名をデータベースに格納
        }
 
        $product->syouhinmei = $request->input('syouhinmei');
        $product->maker = $request->input('maker');
        $product->kakaku = $request->input('kakaku');
        $product->zaikosuu = $request->input('zaikosuu');
        $product->comment = $request->input('comment');
        $product->save();
       


        return redirect()->route('product.create')->with('success','登録しました');
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $makers = Maker::all();
        return view('show',compact('product','makers'))
        ->with('page_id',request()->page_id)
        ->with('makers',$makers);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $makers = maker::all();
        return view('edit',compact('product','makers'))
        ->with('page_id',request()->page_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'syouhinmei' => 'required|max:20',
            'maker' => 'required|integer',
            'kakaku' => 'required|integer',
            'zaikosuu' => 'required|integer',
            'comment' => 'required|max:100',
        ]);
        
        $product->syouhinmei = $request->input('syouhinmei');
        $product->maker = $request->input('maker');
        $product->kakaku = $request->input('kakaku');
        $product->zaikosuu = $request->input('zaikosuu');
        $product->comment = $request->input('commment');
        $product->save();
       
        return redirect()->route('products.index')->with('success','変更しました'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success','商品'.$product->syouhinmei.'を削除しました');
    }

    public function search(Request $request)
    {
        $syouhinmei = $request->input('syouhinmei');
        $maker = $request->input('maker');

        $query = product::select([
            'i.id',
            'i.syouhinmei',
            'i.kakaku',
            'i.zaikosuu',
            'm.str as maker',
        ])
        ->from('products as i')
        ->join('makers as m','i.maker','m.id');
    
        if ($syouhinmei) {
            $query->where('syouhinmei', 'like', '%' . $syouhinmei . '%');
        }
    
        if ($maker) {
            $query->where('m.str',$maker);
        }
        $products = $query->paginate(10);
        $page_id = $request->input('page_id');


        return view('index',compact('products','page_id'));
    } 

}