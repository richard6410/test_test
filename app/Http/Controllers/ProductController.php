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
        $products = product::select([
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
        
        return view('index', compact('products'))
            ->with('page_id', request()->page)
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $companies = Company::all();
        return view('create')->with('page_id', request()->page_id)->with('companies', $companies);
    }

    public function store(Request $request)
    {
        return redirect()->route('product.create')
        ->with('success','登録しました');
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
        // DBトランザクションの開始
        DB::beginTransaction();

        try {
            $product->delete();

            // トランザクションのコミット（変更を保存）
            DB::commit();

            return redirect()->route('products.index')->with('success', '商品'.$product->syouhinmei.'を削除しました');
        } catch (\Exception $e) {
            // エラーが発生した場合、トランザクションをロールバック
            DB::rollback();

            // エラーハンドリングまたはエラーメッセージの表示
            // 例: return back()->with('error', 'エラーメッセージ');
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


