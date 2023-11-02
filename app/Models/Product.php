<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static function getAllProducts()
    {
        return Product::select([
            'b.id',
            'b.image',
            'b.syouhinmei',
            'b.kakaku',
            'b.zaikosuu',
            'b.comment',
            'b.company_name',
        ])
        ->from('products as b')
        ->join('companies as r', 'b.company_name', '=', 'r.id') // 結合条件を修正
        ->orderBy('b.id', 'DESC')
        ->paginate(5);
    }

    public static function createProduct($data)
    {
        // 新しい商品を作成してデータベースに保存するロジックを追加
        $product = new Product;

    if (isset($data['image']) && $data['image']->isValid()) {
        $original = $data['image']->getClientOriginalName();
        $name = date('Ymd_His') . '_' . $original;
        $path = $data['image']->storeAs('public/images', $name);

        // 画像ファイルが正常にアップロードされた場合、ファイル名をデータベースに格納
        $product->image = $name;
    }

    $product->syouhinmei = $data['syouhinmei'];
    $product->company_name = $data['company_name'];
    $product->kakaku = $data['kakaku'];
    $product->zaikosuu = $data['zaikosuu'];
    $product->comment = $data['comment'];

    $product->save();

    return $product;
    }

    public static function updateProduct($product, $data)
    {
        // 商品を更新するロジックを追加
        if (isset($data['image']) && $data['image']->isValid()) {
            // 画像ファイルがアップロードされた場合、新しい画像を保存
            $original = $data['image']->getClientOriginalName();
            $name = date('Ymd_His') . '_' . $original;
            $path = $data['image']->storeAs('public/images', $name);
    
            // 古い画像ファイルを削除
            if ($product->image) {
                Storage::delete('public/images/' . $product->image);
            }
    
            // 新しいファイル名をデータベースに格納
            $product->image = $name;
        }
    
        $product->syouhinmei = $data['syouhinmei'];
        $product->company_name = $data['company_name'];
        $product->kakaku = $data['kakaku'];
        $product->zaikosuu = $data['zaikosuu'];
        $product->comment = $data['comment'];
    
        $product->save();
    
        return $product;
    }


    public static function searchProducts($syouhinmei, $company_name)
    {
        // 商品を検索するロジックを追加
        $query = Product::select([
            'i.id',
            'i.syouhinmei',
            'i.kakaku',
            'i.zaikosuu',
            'i.company_name',
        ])
        ->from('products as i')
        ->join('companies as m', 'i.company_name', '=', 'm.id');
    
        if ($syouhinmei) {
            $query->where('i.syouhinmei', 'like', '%' . $syouhinmei . '%');
        }
    
        if ($company_name) {
            $query->where($company_name);
        }
    
        return $query->paginate(10);
    }
}
