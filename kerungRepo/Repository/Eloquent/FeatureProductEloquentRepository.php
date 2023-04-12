<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/05/16
 * Time: 10:00 PM
 */

namespace KerungRepo\Repository\Eloquent;





use Kerung\Models\FeatureProduct;
use KerungRepo\Repository\Eloquent\BaseEloquentRepository;
use KerungRepo\Repository\FeatureProductRepositoryInterface;

class FeatureProductEloquentRepository extends BaseEloquentRepository implements FeatureProductRepositoryInterface
{
    /**
     * ReturnEloquentRepository constructor.
     *  
     * @param FeatureProduct $featureProduct
     */
    public function __construct(FeatureProduct $featureProduct)
    {
        $this->model = $featureProduct;
    }

    /**
     * Update Product Images
     * 
     * @param $featureProducts
     * @param $productId
     */
    public function storeData($products)
    {
        // $this->model->where('product_id','=',$productId)->delete();
        foreach($products as $p)
        { 
            $this->model->where('product_id','=',$p)->delete();
            $this->model->create([
                'product_id' => $p
            ]);
        }
    }
}