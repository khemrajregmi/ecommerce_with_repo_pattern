<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 8/24/16
 * Time: 10:52 AM
 */

namespace KerungRepo\Repository;

/**
 * Interface CategoryRepositoryInterface
 * 
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface CategoryRepositoryInterface
{

    /**
     * Get Products By Category Id
     * 
     * @param $categoryId
     * @return mixed
     */
    public function getProductsByCategoryId($categoryId);


	/**
     * @return mixed
     */
    public function parentCategory();

    /**
     * @return mixed
     */
    public function topCategory();

    /**
     *@param $slug
     * @return mixed
     */
    public function getCategoryByCategorySlug($slug);
    
	
}