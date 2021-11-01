<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Response;

class ApiAdminController extends Controller
{

    public function Categories()
    {
        $parent_cats = Category::where('is_parent', 1)->orderBy('title', 'ASC')->get();
        return response()->json(['status' => '1', 'data' => $parent_cats]);
    }

    public function Products()
    {
        $products = Product::getAllProduct();
        return response()->json(['status' => '1', 'data' => $products]);
    }

    public function Coupons_list()
    {
        $coupons=Coupon::orderBy('id','DESC')->paginate('10');
        return response()->json(['status' => '1', 'data' => $coupons]);
    }
}
