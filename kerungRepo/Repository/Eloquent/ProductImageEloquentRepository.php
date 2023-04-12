<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/05/16
 * Time: 10:00 PM
 */

namespace KerungRepo\Repository\Eloquent;





use Kerung\Models\ProductImage;
use KerungRepo\Repository\Eloquent\BaseEloquentRepository;
use KerungRepo\Repository\ProductImageRepositoryInterface;

class ProductImageEloquentRepository extends BaseEloquentRepository implements ProductImageRepositoryInterface
{
    /**
     * ReturnEloquentRepository constructor.
     *  
     * @param ProductImage $productImage
     */
    public function __construct(ProductImage $productImage)
    {
        $this->model = $productImage;
    }


    /**
     * Store Product Images
     *
     * @param $productImages
     * @param $productId
     */
    public function storeProductImages($productImages,$productId)
    {
        foreach($productImages as $pi)
        {
            $this->model->create([
                'product_id' => $productId,
                'image' => $pi['image']
            ]);
        }
    }


    /**
     * Update Product Images
     * 
     * @param $productImages
     * @param $productId
     */
    public function updateProductImages($productImages,$productId)
    {
        $this->model->where('product_id','=',$productId)->delete();
        foreach($productImages as $pi)
        {
            $this->model->create([
                'product_id' => $productId,
                'image' => $pi['image']
            ]);
        }
    }

    /**
     * Get Product Images By Product ID
     * 
     * @param $productId
     * @return mixed
     */
    public function getProductImagesByProductId($productId)
    {
        return $this->model->where('product_id','=',$productId)->get();
    }
}