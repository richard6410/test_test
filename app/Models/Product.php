<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;


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
            'r.company_name',
        ])
        ->from('products as b')
        ->join('companies as r', 'b.company_name', '=', 'r.id') 
        ->orderBy('b.id', 'DESC')
        ->paginate(5);
    }

        public static function createProduct($data)
    {
            $product = new Product;

            if (isset($data['image']) && $data['image']->isValid()) {
                $original = $data['image']->getClientOriginalName();
                $name = date('Ymd_His') . '_' . $original;
                $path = $data['image']->storeAs('public/images', $name);

                $product->image = $name;
            }


            $product->syouhinmei = $data['syouhinmei'];
            $product->company_name = $data['company_name'];
            $product->kakaku = $data['kakaku'];
            $product->zaikosuu = $data['zaikosuu'];
            $product->comment = $data['comment'];

            $product->save();
        
    }

    public static function updateProduct($product, $data)
    {
        try {
            if (isset($data['image']) && is_string($data['image']) && file_exists($data['image'])) {
                $original = pathinfo($data['image'], PATHINFO_FILENAME);
                $name = date('Ymd_His') . '_' . $original;
    
                $path = Storage::putFileAs('public/images', new File($data['image']), $name);
    
                if ($product->image) {
                    Storage::delete('public/images/' . $product->image);
                }
    
                $product->image = $name;
            }
    
            $product->syouhinmei = $data['syouhinmei'];
            $product->company_name = $data['company_name'];
            $product->kakaku = $data['kakaku'];
    
            $product->save();
        } catch (\Exception $e) {
            Log::error('Error updating product: ' . $e->getMessage());
            throw $e; 
        }
       
    }


    public static function searchProducts($syouhinmei, $company_name)
    {
        $query = Product::select([
            'i.id',
            'i.image',
            'i.syouhinmei',
            'i.kakaku',
            'i.zaikosuu',
            'm.company_name',
        ])
        ->from('products as i')
        ->join('companies as m', 'i.company_name', 'm.id');
    
        if ($syouhinmei) {
            $query->where('i.syouhinmei', 'like', '%' . $syouhinmei . '%');
        }
    
        if ($company_name) {
            $query->where('m.id',$company_name);
        }
    
        return $query->paginate(5);
    }
}
