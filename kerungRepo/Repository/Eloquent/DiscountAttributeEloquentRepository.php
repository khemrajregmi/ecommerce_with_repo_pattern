<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 10:00 AM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\DiscountAttribute;
use KerungRepo\Repository\DiscountAttributeRepositoryInterface;

class DiscountAttributeEloquentRepository extends BaseEloquentRepository implements DiscountAttributeRepositoryInterface
{
    /**
     * DiscountAttributeEloquentRepository constructor.
     *  
     * @param DiscountAttribute $discount_attribute
     */
    public function __construct(DiscountAttribute $discount_attribute)
    {
        $this->model = $discount_attribute;
    }


    /**
     * Store Discount Attributes
     *
     * @param $discountAttributes
     * @param $discountId
     * @return bool
     */
    public function storeDiscountAttributes($discountAttributes, $discountId)
    {
        $this->model->where('discount_id','=',$discountId)->delete();
        $this->model->create($discountAttributes);
        return true;
    }

    /**
     * Store Discount Attributes
     *
     * @param $discountAttributes
     * @param $discountId
     * @return bool
     */
    public function updateDiscountAttributes($discountAttributes, $discountId)
    {
        $this->model->where('discount_id','=',$discountId)->delete();
        $this->model->create($discountAttributes);
        return true;
    }


     /**
     * Get Discount Attributes
     *
     * @param $id
     * @return bool
     */
    public function getDiscountAttributes($id)
    {
        return $this->model->where('discount_id','=',$id)->first();
    }
}