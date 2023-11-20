<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::getAllProducts();
        
        return view('index', compact('products'))
            ->with('page_id', request()->page)
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $companies = Company::all();
        return view('create')
            ->with([
                'page_id' => request()->page_id, 
                'companies' => $companies,
            ]);
    }

    public function store(Request $request)
    {
        try{
        Product::createProduct($request);

            return redirect()->route('products.index')->with('success', '登録しました');
        } catch (\Exception $e) {
            \Log::error($e);

            return redirect()->route('products.index')->with('error', '登録中にエラーが発生しました'); 
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
        $data = $request->all();

        Product::updateProduct($product, $data);

        return redirect()->route('products.index')
            ->with('success', '変更しました');
    }

    public function destroy(Product $product)
    {
        DB::beginTransaction();

        try {
            $product->delete();

            DB::commit();

            return redirect()->route('products.index')->with('success', '商品名'.$product->syouhinmei.'を削除しました');
        } catch (\Exception $e) {
            Log::error('削除中にエラーが発生しました: ' . $e->getMessage());
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


