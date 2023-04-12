<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/05/16
 * Time: 10:00 PM
 */

namespace KerungRepo\Repository\Eloquent;





use Kerung\Models\ProductCategory;
use KerungRepo\Repository\Eloquent\BaseEloquentRepository;
use KerungRepo\Repository\ProductCategoryRepositoryInterface;
/**
 * Class ProductCategoryEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class ProductCategoryEloquentRepository extends BaseEloquentRepository implements ProductCategoryRepositoryInterface
{

    /**
     * ReturnEloquentRepository constructor.
     *  
     * @param ProductCategory $productcategory
     */
    public function __construct(ProductCategory $productcategory)
    {
        $this->model = $productcategory;
    }

    
    
}