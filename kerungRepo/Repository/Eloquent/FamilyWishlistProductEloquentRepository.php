<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/19/16
 * Time: 10:40 AM
 */


namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\FamilyWishlistProduct;
use KerungRepo\Repository\FamilyWishlistProductRepositoryInterface;
/**
 * Class FamilyWishlistProductEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class FamilyWishlistProductEloquentRepository extends BaseEloquentRepository implements FamilyWishlistProductRepositoryInterface
{
    /**
     * FamilyWishlistProductEloquentRepository constructor.
     *  
     * @param FamilyWishlistProduct $familyWishlistProduct
     */
    public function __construct(FamilyWishlistProduct $familyWishlistProduct)
    {
        $this->model = $familyWishlistProduct;
    }

    /**
     * @param $customerId
     * @return mixed
     */
    public function checkProductIfExit($id)
    {
    	return $this->model->where('product_id','=',$id)->first();
    }


    /**
     * @param $customerId
     * @return mixed
     */
    public function getWishlitAccToFamilySizeId($id)
    {
        return $this->model->where('f_s_w_id','=',$id)->get();
    }
    
}