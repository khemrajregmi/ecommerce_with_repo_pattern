<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 8/24/16
 * Time: 10:51 AM
 */

namespace KerungRepo\Services;

use KerungRepo\Services\BaseService;
use KerungRepo\Repository\CategoryRepositoryInterface;
use KerungRepo\Repository\ProductCategoryRepositoryInterface;
use Suvalav\Models\ProductCategory;


/**
 * Class CategoryService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class CategoryService extends BaseService
{
     /**
     * @var ProductCategoryRepositoryInterface
     */
    protected $productCategoryRepo;


	/**
     * CategoryService constructor.
     * @param CategoryRepositoryInterface $repo
     * @param ProductCategoryRepositoryInterface $productCategoryRepositoryInterface
     */
    public function __construct(CategoryRepositoryInterface $repo,ProductCategoryRepositoryInterface $productCategoryRepositoryInterface)
    {
    $this->repo = $repo;
    $this->productCategoryRepo = $productCategoryRepositoryInterface;
    }


    /**
     * Get Products By Category Id
     * 
     * @param $categoryId
     * @return mixed
     */
    public function getProductByCategoryId($categoryId)
    {
        return $this->repo->getProductsByCategoryId($categoryId);
    }

    /**
     * Get Parent Category
     *
     * 
     * @return mixed
     */

    public function parentCategory()
    {
        return $this->repo->parentCategory();
    }
    

    /**
     * Get Top Category
     *
     * 
     * @return mixed
     */
    public function topCategory()
    {
        return $this->repo->topCategory();
    }

     /**
     * Get Products by Category Slug
     *
     * @param $slug
     * @return mixed
     */
    public function getCategoryByCategorySlug($slug)
    {
        return $this->repo->getCategoryByCategorySlug($slug);
    }





    
}