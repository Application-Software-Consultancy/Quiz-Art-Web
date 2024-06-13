<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ItemController extends Controller
{
   public function index(){
    $items = Item::with(['unit' => function ($query) {
                    $query->select('id','unit_name'); 
                }, 'tax' => function ($query) {
                    $query->select('id','tax'); 
                }])
                ->select('item_code', 'description' , 'mrp', 'status',  'stock', 'item_image', 'price', 'discount_type', 'discount' ,'item_name', 'category_id', 'unit_id', 'tax_id') // Select specific fields from item
                ->get();

    return response()->json($items, 200);
}
    public function unit(){
        $item = Unit::all();
        return response()->json($item, 200);
    }
    public function updateStock()
    {
        $moduleId = '2';
        $apiData = Http::withHeaders(['moduleId' => $moduleId])
            ->get('https://admin.mvmart.in/api/v1/items/getitems')->json();

        foreach ($apiData as $apiProduct) {
            $product = Item::where('item_code', $apiProduct['item_code'])->first();
            if ($product) {
            $stock = $product->stock;
            $apiStock = $apiProduct['stock'];
            $deductedStock = intval($stock) - $apiStock;
            $finalStock = intval($stock)  - $deductedStock;
            $final = (float)$finalStock;
            // dd($final);

                $product->update([
                    'stock' => $final,
                ]);
            }
        }
        return response()->json('Products Stock Updated successfully!', 200);
    }
}
