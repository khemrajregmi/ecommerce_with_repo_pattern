<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 8/24/16
 * Time: 12:20 PM
 */

namespace KerungRepo\Repository\Eloquent;


use Kerung\Models\Category;
use KerungRepo\Repository\Eloquent\BaseEloquentRepository;
use KerungRepo\Repository\CategoryRepositoryInterface;

class CategoryEloquentRepository extends BaseEloquentRepository implements CategoryRepositoryInterface
{

    /**
     * CategoryEloquentRepository constructor.
     *
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * Get Products By Category Id
     *
     * @param $categoryId
     * @return mixed
     */
    public function getProductsByCategoryId($categoryId)
    {
        $category = $this->findById($categoryId);
        return $category->products;
    }

    /**
     * Parent Category
     *
     * @return mixed
     */
    public function parentCategory()
    {
        return $this->model->with('children','children.allChildren')->where('parent_id','=',NULL)->get();
    }


     /**
     * Top Category
     *
     * @return mixed
     */
    public function topCategory()
    {
        return $this->model->with('children')->where('top',1)->get();
    }


    /**
     * Product by Category Slug
     *
     * @return mixed
     */
    public function getCategoryByCategorySlug($slug)
    {
        return $category = $this->findBySlug($slug);

    }
    
    
}