<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/19/16
 * Time: 10:40 AM
 */


namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\FamilyWishlist;
use KerungRepo\Repository\FamilyWishlistRepositoryInterface;
/**
 * Class FamilyWishlistEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class FamilyWishlistEloquentRepository extends BaseEloquentRepository implements FamilyWishlistRepositoryInterface
{
    /**
     * FamilyWishlistEloquentRepository constructor.
     *  
     * @param FamilyWishlist $familyWishlist
     */
    public function __construct(FamilyWishlist $familyWishlist)
    {
        $this->model = $familyWishlist;
    }


    /**
     *
     *
     * @param $customerId
     * @return mixed
     */
    public function checkOldWishlist($customerId)
    {
    	return $this->model->where('customer_id','=',$customerId)->first();
    }
    
}