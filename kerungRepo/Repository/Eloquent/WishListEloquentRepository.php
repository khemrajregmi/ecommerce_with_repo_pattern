<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/27/16
 * Time: 9:09 AM
 */

namespace KerungRepo\Repository\Eloquent;



use KerungRepo\Repository\Eloquent\BaseEloquentRepository;
use Kerung\Models\Wishlist;
use KerungRepo\Repository\WishlistRepositoryInterface;

/**
 * Class WishListEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class WishListEloquentRepository extends BaseEloquentRepository implements WishListRepositoryInterface
{
    /**
     * WishListEloquentRepository constructor.
     * @param WishList $wishList
     */
    public function __construct(Wishlist $wishList)
    {
        $this->model = $wishList;
    }



    /****
     * ============================================
     *
     * Frontend Related Methods starts from here
     *
     * ===========================================
     ****/

    /**
     * @return mixed
     *
     * @param  $productId
     */
    public function destroyById($productId)
    {
        return $this->model->destroy('product_id','=',$productId);
    }

    /**
     * @param $customer
     * @param $product
     * @return mixed
     */
    public function storeCustomerWishList($product, $customer)
    {
        $product->Customer()->detach($customer);
        return  $product->Customer()->attach($customer);
    }


    /**
     * @param $customer
     * @param $product
     * @return mixed
     */
    public function removeWishList($product, $customer)
    {
        return  $product->Customer()->detach($customer);
    }

    /****
     * ============================================
     *
     * Frontend Related Methods ends from here
     *
     * ===========================================
     ****/
}