<?php

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Kerung\Http\Requests;
use Kerung\Http\Controllers\Controller;
use KerungRepo\Services\CategoryService;
use KerungRepo\Services\ProductService;
use KerungRepo\Services\StoreService;

/**
 * Class CommonAjaxController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class CommonAjaxController extends Controller
{

    /**
     * @var CategoryService
     */
    protected $categoryService;

     /**
     * @var StoreService
     */
    protected $storeService;

    /**
     * @var ProductService
     */
    protected $productService;

    /**
     * Get Category Products
     *
     * 
     * @param Request $request
     * @param CategoryService $CategoryService
     * @return mixed
     */
    public function getCategoryProducts(Request $request,CategoryService $CategoryService)
    {
        $this->categoryService = $CategoryService;
        $categoryId  = $request->input('category_id');
        $products = $this->categoryService->getProductByCategoryId($categoryId);
        return response()->json($products);
    }
    
    
    public function getProductById(Request $request,ProductService $ProductService)
    {
        $this->productService = $ProductService;
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');
        $response = $this->productService->getById($productId);
        if($response)
        {
            if($response['quantity'] < $quantity)
            {
                return response()->json(['response'=>'error']);
            }
            return response()->json(['response'=>'success','message'=>$response]);
        }
        else{
            return response()->json(['response'=>'fail','message'=>$response]);
        }
    }

    /**
     * Get Store wise Product
     *
     * @param Request $request
     * @param StoreService $StoreService
     * @return mixed
     */
    public function getAllProductByStoreId(Request $request,StoreService $StoreService)
    {
        $this->storeService =$StoreService;
        $storeId = $request->input('store_id');
        $products =$this->storeService->getProductByStoreId($storeId);
        return response()->json($products);
        
    }
}
