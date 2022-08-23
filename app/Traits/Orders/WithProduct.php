<?php

namespace App\Traits\Orders;

use App\Models\OrderItems\OrderItems;
use App\Models\Products\Products;
use Illuminate\Support\Facades\DB;

trait WithProduct
{

    public function totalBillAmount($orderId)
    {
        return OrderItems::where('order_id',$orderId)->sum(DB::raw('order_product_quantity * total'));
    }

    public function increaseQuantity($id, $productId)
    {
        OrderItems::find($id)->increment('order_product_quantity', 1);
        Products::find($productId)->decrement('product_quantity', 1);

    }

    public function decreaseQuantity($id, $productId)
    {
        OrderItems::find($id)->decrement('order_product_quantity', 1);
        Products::find($productId)->increment('product_quantity', 1);

    }

    public function deleteOrderItems($id, $productId)
    {
        $item = OrderItems::find($id);
        Products::find($productId)->increment('product_quantity', $item->order_product_quantity);
        $item->delete();

    }

}
