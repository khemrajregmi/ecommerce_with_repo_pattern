<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/05/16
 * Time: 10:00 PM
 */

namespace KerungRepo\Repository\Eloquent;





use Kerung\Models\ProductDiscount;
use KerungRepo\Repository\Eloquent\BaseEloquentRepository;
use KerungRepo\Repository\ProductDiscountRepositoryInterface;


/**
 * Class ProductDiscountEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ProductDiscountEloquentRepository extends BaseEloquentRepository implements ProductDiscountRepositoryInterface
{
    /**
     * ReturnEloquentRepository constructor.
     *  
     * @param ProductDiscount $discount
     */
    public function __construct(ProductDiscount $discount)
    {
        $this->model = $discount;
    }

    /**
     * Store Product Discount
     *
     * @param $product_discounts
     * @param $productId
     * @return bool
     */
    public function storeProductDiscounts($product_discounts,$productId)
    {
        $this->model->where('product_id','=',$productId)->delete();
        foreach($product_discounts as $pd) {
              $this->model->create([
                  'product_id' => $productId,
                  'quantity' => $pd['quantity'],
                  'priority' => $pd['priority'],
                  'percent' => $pd['percent'],
                  'date_start' => $pd['date_start'],
                  'date_end' => $pd['date_end']
              ]);
        }
        return true;
    }


    /**
     * Update Product Discount
     *
     * @param $product_discounts
     * @param $productId
     * @return bool
     */
    public function updateProductDiscounts($product_discounts,$productId)
    {
        $this->model->where('product_id','=',$productId)->delete();
        foreach($product_discounts as $pd) {
            $this->model->create([
                'product_id' => $productId,
                  'quantity' => $pd['quantity'],
                  'priority' => $pd['priority'],
                  'percent' => $pd['percent'],
                  'date_start' => $pd['date_start'],
                  'date_end' => $pd['date_end']
            ]);
        }
        return true;
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function getProductDiscountsByProductId($productId)
    {
        return $this->model->where('product_id','=',$productId)->get();
    }
}