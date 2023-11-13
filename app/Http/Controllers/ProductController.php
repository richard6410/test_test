<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // index メソッド

    public function index()
    {
        $products = Product::select([
            'products.id',
            'products.image',
            'products.syouhinmei',
            'products.kakaku',
            'products.zaikosuu',
            'products.comment',
            'companies.company_name',
        ])
        ->join('companies', 'products.company_name', '=', 'companies.id')
        ->orderBy('products.id', 'DESC')
        ->paginate(5);

       /*  $products = product::select([
            'b.id',
            'b.image',
            'b.syouhinmei',
            'b.kakaku',
            'b.zaikosuu',
            'b.comment',
            'r.company_name',
        ])
       
        ->from('products as b')
        ->join('companies as r', 'b.company_name', '=', 'r.id') // 結合条件を修正
        ->orderBy('b.id', 'DESC')
        ->paginate(5);
         */

        return view('index', compact('products'))
            ->with('page_id', request()->page)
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $companies = Company::all();
        return view('create')
            ->with('page_id', request()->page_id)->with('companies', $companies);
    }

    public function store(Request $request)
    {
        try {
            $product = new Product;

            $product->syouhinmei = $request->input('syouhinmei');
            $product->company_name = $request->input('company_name');
            $product->kakaku = $request->input('kakaku');
            $product->zaikosuu = $request->input('zaikosuu');
            $product->comment = $request->input('comment');

            $product->save();

            return redirect()->route('products.index')
            ->with('success', '登録しました');
        } catch (\Exception $e) {
            \Log::error($e);

            return redirect()->route('products.index')
            ->with('error', '登録中にエラーが発生しました');
        }
    }

    public function show(Product $product)
    {
        $companies = Company::all();
        return view('show', compact('product', 'companies'))->with('page_id', request()->page_id);
    }

    public function edit(Product $product)
    {
        $companies = Company::all();
        return view('edit', compact('product', 'companies'))->with('page_id', request()->page_id);
    }

    public function update(Request $request, Product $product)
    {
        return redirect()->route('products.index')
            ->with('success','変更しました'); 
    }

    public function destroy(Product $product)
    {
        DB::beginTransaction();

        try {
            $product->delete();

            DB::commit();

            return redirect()->route('products.index')->with('success', '商品'.$product->syouhinmei.'を削除しました');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', '削除中にエラーが発生しました: '.$e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $syouhinmei = $request->input('syouhinmei');
        $company_name = $request->input('company_name');

        $products = Product::searchProducts($syouhinmei, $company_name);
        $page_id = $request->input('page_id');

        return view('index')->with(['products' => $products, 'page_id' => $page_id]);
    }    
}


