<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/05/16
 * Time: 10:00 PM
 */

namespace KerungRepo\Repository\Eloquent;


use Kerung\Models\ProductAttribute;
use KerungRepo\Repository\ProductAttributeRepositoryInterface;

class ProductAttributeEloquentRepository extends BaseEloquentRepository implements ProductAttributeRepositoryInterface
{
    /**
     * ReturnEloquentRepository constructor.
     *
     * @param ProductAttribute $productAttribute
     */
    public function __construct(ProductAttribute $productAttribute)
    {
        $this->model = $productAttribute;
    }

    /**
     * Store Product Attributes
     *
     * @param $product_attributes
     * @param $productId
     * @return bool
     */
    public function storeProductAttributes($product_attributes, $productId)
    {
        $this->model->where('product_id','=',$productId)->delete();
        foreach ($product_attributes as $product_attribute) {
            $this->model->create([
                'product_id' => $productId,
                'attribute_id' => $product_attribute['attribute_id'],
                'text' => $product_attribute['text']
            ]);
        }
        return true;
    }


    /**
     * Update Product Attributes
     *
     * @param $product_attributes
     * @param $productId
     * @return bool
     */
    public function updateProductAttributes($product_attributes, $productId)
    {

        $this->model->where('product_id','=',$productId)->delete();
        foreach ($product_attributes as $product_attribute) {
            $this->model->where('product_id','=',$productId)->where('attribute_id','=',$product_attribute['attribute_id'])->delete();
            $this->model->create([
                'product_id' => $productId,
                'attribute_id' => $product_attribute['attribute_id'],
                'text' => $product_attribute['text']
            ]);
        }
        return true;
    }


    public function getProductAttributesByProductId($productId)
    {
        return $this->model->where('product_id','=',$productId)->get();
    }
}