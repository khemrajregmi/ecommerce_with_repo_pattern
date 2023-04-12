<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 11/14/16
 * Time: 10:35 AM
 */

namespace KerungRepo\Services;

use Gloudemans\Shoppingcart\Cart;

/**
 * Class CartService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class CartService
{

    /**
     * @var Cart
     */
    private $cart;

    public function __construct(Cart $Cart)
    {
        $this->cart = $Cart;
    }

    public function addToCart($product)
    {   
        
        !isset($product['image']) ? $product['image']='':$product['image'];
        $response= $this->cart->add([
            'id' => $product['product_id'],
            'name' => $product['name'],
            'qty' => $product['quantity'],
            'price' => $product['price'],
            'options' => ['image' => $product['image'],'model'=>$product['model']]
        ]);
        if($response){
            return true;
        }
        return $response;

        /*$productDetail = [
            'name' => $product->name,
            'qty' => $res->qty,
            'price' => $product->price,
            'image' => $product->image,
            'product_id' => $id,
            'totalInCart'=>Cart::count(),
            'total'=>Cart::subtotal()
        ];
        return $productDetail; */
    }
    public function addToCartForEdit($products)
    {
        foreach ($products as $product) {
            $response=    $this->cart->add([
                'id' => $product['product_id'],
                'name' => $product['name'],
                'qty' => $product['quantity'],
                'price' => $product['price']
            ]);
            return $response;
        }
    }


    public function getCartItems()
    {
       return  $response =  $this->cart->content();
        if($response){
            return $response;
        }
        else{
            return false;
        }
    }

    public function removeCartItemsByRowId($rowId)
    {
     $this->cart->remove($rowId);

    }


    public function getSubtotal()
    {
        return $this->cart->subtotal();
    }

    public function getTotal()
    {
        return $this->cart->total();
    }

    public function destroy()
    {
        $this->cart->destroy();
    }

    public function totalItemInCart()
    {
        return $this->cart->count();
    }

     public function addToCartFormFrontend($product)
    {   
        $actual_price=$product['price'];
        if(empty($product->Discount))
        { 
            $product['price'] = $product['price'];
            $product['discount_price'] = 0;
            $product['discount'] = 0;  
        } 
        else 
        {
         $product['price'] = $product['price']-(($product->Discount->percent/100)*$product['price']);
         $product['discount_price'] = $actual_price-$product['price'];
         $product['discount'] = $product->Discount->percent;  
        }
        // dd($product['price']);
        !isset($product['image']) ? $product['image']='':$product['image'];
        $res= $this->cart->add([
            'id' => $product['product_id'],
            'name' => $product['name'],
            'qty' => 1,
            'price' =>$product['price']

             ,
            'options' => ['image' => $product['image'],'model'=>$product['model'],'discount_price'=>$product['discount_price'],'discount'=>$product['discount']]
        ]);
        $productDetail = [
            'rowId' =>$res->rowId,
            'name' => $product->name,
            'qty' => $res->qty,
            'price' => $product->price,
            'image' => $product->image,
            'discount_price' => $res->options->discount_price,
            'discount' => $res->options->discount,
            'product_id' => $res->id,
            'totalInCart'=> $this->totalItemInCart(),
            'total'=>$this->getTotal()
        ];
        return $productDetail; 
    }

     

}