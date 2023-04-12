<?php

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Kerung\Http\Requests;
use Kerung\Http\Controllers\Controller;
use KerungRepo\Services\CartService;
use Gloudemans\Shoppingcart\Cart;
use KerungRepo\Services\ProductService;

class CartController extends Controller
{

    /**
     * @var CartService
     */
    protected $service;

    /**
     * @var ProductService
     */
    protected $productService;

    /**
     * CartController constructor.
     * @param CartService $CartService
     */
    public function __construct(CartService $CartService,ProductService $productService)
    {
        $this->service = $CartService;
        $this->productService = $productService;
    }


    /**
     * Add to Cart
     * 
     * @param Request $request
     * @return mixed
     */
    public function addToCart(Request $request)
    {
      $response =  $this->service->addToCart($request->all());
        if($response){
            return response()->json(['response'=>'success','message'=>'You have modified your shopping cart.']);
        }
        return response()->json(['response'=>'fail','message'=>$response]);
    }

    /**
     * @return mixed
     */
    public function getCartItems()
    {
//        $this->service->destroy();
        $response = $this->service->getCartItems();
        if($response){
            return response()->json(['response'=>'success','message'=>$response]);
        }
        return response()->json(['response'=>'fail','message'=>$response]);
        

    }


    public function removeCartItems(Request $request)
    {
        $rowId = $request->input('rowId');
        $this->service->removeCartItemsByRowId($rowId);
        return response()->json(['response'=>'success','message'=>'You have modified your shopping cart.']);

    }



}
