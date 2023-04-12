<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 12/07/16
 * Time: 02:00 PM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\ProductRelated;
use KerungRepo\Repository\ProductRelatedRepositoryInterface;

class ProductRelatedEloquentRepository extends BaseEloquentRepository implements ProductRelatedRepositoryInterface
{
    /**
     * ProductRelatedEloquentRepository constructor.
     *  
     * @param ProductRelated $product_related
     */
    public function __construct(ProductRelated $product_related)
    {
        $this->model = $product_related;
    }


    /**
     * Store Related Product
     * @param productId
     * @param relatedproduct_data
     */
    public function storeRelatedProduct($relatedproduct_data,$productId)
    {
    	$this->model->where('product_id','=',$productId)->delete();
    	$this->model->create($relatedproduct_data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getRelatedProductId($id)
    {
       return $this->model->where('related_id','=',$id)->get();
    }
}