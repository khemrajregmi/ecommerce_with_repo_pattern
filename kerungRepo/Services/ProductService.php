<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 8/26/16
 * Time: 8:19 AM
 */

namespace KerungRepo\Services;

use Suvalav\Models\ProductCategory;
use KerungRepo\Repository\AttributeRepositoryInterface;
use KerungRepo\Repository\Eloquent\ProductImageEloquentRepository;
use KerungRepo\Repository\ProductAttributeRepositoryInterface;
use KerungRepo\Repository\ProductCategoryRepositoryInterface;
use KerungRepo\Repository\ProductDiscountRepositoryInterface;
use KerungRepo\Repository\ProductImageRepositoryInterface;
use KerungRepo\Repository\ProductRepositoryInterface;
use KerungRepo\Repository\ProductRelatedRepositoryInterface;
use KerungRepo\Services\BaseService;


/**
 * Class ProductService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ProductService extends BaseService
{
    /**
     * @var ProductAttributeRepositoryInterface
     */
    protected $productAttributeRepo;

    /**
     * @var ProductDiscountRepositoryInterface
     */
    protected $productDiscountRepo;

    /**
     * @var ProductImageEloquentRepository
     */
    protected $productImageRepo;

    /**
     * @var AttributeRepositoryInterface
     */
    protected $attributeRepo;

    /**
     * @var ProductCategoryRepositoryInterface
     */
    protected $productCategoryRepo;

     /**
     * @var ProductRelatedRepositoryInterface
     */
    protected $productRelatedRepo;

    /**
     * ProductService constructor.
     * @param ProductRepositoryInterface $repo
     * @param ProductAttributeRepositoryInterface $productAttributeRepositoryInterface
     * @param ProductDiscountRepositoryInterface $discountRepositoryInterface
     * @param ProductImageRepositoryInterface $productImageRepositoryInterface
     * @param AttributeRepositoryInterface $attributeRepositoryInterface
     * @param ProductCategoryRepositoryInterface $productCategoryRepositoryInterface
     * @param ProductRelatedRepositoryInterface $productRelatedRepositoryInterface
     */
    public function __construct(ProductRepositoryInterface $repo,ProductAttributeRepositoryInterface $productAttributeRepositoryInterface,ProductDiscountRepositoryInterface $discountRepositoryInterface,ProductImageRepositoryInterface $productImageRepositoryInterface,AttributeRepositoryInterface $attributeRepositoryInterface,ProductCategoryRepositoryInterface $productCategoryRepositoryInterface,ProductRelatedRepositoryInterface $productRelatedRepositoryInterface)
    {
        $this->repo = $repo;
        $this->productAttributeRepo = $productAttributeRepositoryInterface;
        $this->productDiscountRepo = $discountRepositoryInterface;
        $this->productImageRepo = $productImageRepositoryInterface;
        $this->attributeRepo = $attributeRepositoryInterface;
        $this->productCategoryRepo = $productCategoryRepositoryInterface;
        $this->productRelatedRepo = $productRelatedRepositoryInterface;
    }

    /****
     * ============================================
     *
     * Admin/Backend/Dashboard Related Methods starts here
     *
     * ===========================================
     ****/


    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
        $products = array(
        'name'=>$data['name'],
        'description'=>$data['description'],
        'meta_title'=>$data['meta_title'],
        'meta_description'=>$data['meta_description'],
        'meta_keywords'=>$data['meta_keywords'],
        'tag'=>$data['tag'],
        'model'=>$data['model'],
        'sku'=>$data['sku'],
        'newarrival'=>$data['newarrival'],
        'price'=>$data['price'],
        'quantity'=>$data['quantity'],
        'minimum'=>$data['minimum'],
        'subtract'=>$data['subtract'],
        'stock_status_id'=>$data['stock_status_id'],
        'length'=>$data['length'],
        'width'=>$data['width'],
        'height'=>$data['height'],
        'length_class_id'=>$data['length_class_id'],
        'weight'=>$data['weight'],
        'weight_class_id'=>$data['weight_class_id'],
        'status'=>$data['status'],
        'manufacturer_id'=>$data['manufacturer_id'],
        'image' => $data['image']
        );
       $product =  $this->repo->create($products);
        if(isset($data['product_attribute'])) {
            $this->productAttributeRepo->storeProductAttributes($data['product_attribute'], $product->product_id);
        }
        if(isset($data['product_discount'])){
            $this->productDiscountRepo->storeProductDiscounts($data['product_discount'],$product->product_id);
        }
        if(isset($data['product_image'])){
            $this->productImageRepo->storeProductImages($data['product_image'],$product->product_id);
        }
        if(isset($data['category'])){
            $this->repo->storeProductCategory($data['category'],$product);
        }
        if(isset($data['store'])){
            $this->repo->storeProductInStores($data['store'],$product);
        }
        if(isset($data['related_id'])){
            $relatedproduct_data=array(
                'product_id'=>$product->product_id,
                'related_id'=>$data['related_id']
                );
            $this->productRelatedRepo->storeRelatedProduct($relatedproduct_data,$product->product_id);
        }
        return true;
    }

    /**
     * @param $productId
     * @param array $data
     * @return bool
     */
    public function update($productId,array $data)
    {
        $products = array(
            'name'=>$data['name'],
            'description'=>$data['description'],
            'meta_title'=>$data['meta_title'],
            'meta_description'=>$data['meta_description'],
            'meta_keywords'=>$data['meta_keywords'],
            'tag'=>$data['tag'],
            'model'=>$data['model'],
            'sku'=>$data['sku'],
            'price'=>$data['price'],
            'newarrival'=>$data['newarrival'],
            'quantity'=>$data['quantity'],
            'minimum'=>$data['minimum'],
            'subtract'=>$data['subtract'],
            'stock_status_id'=>$data['stock_status_id'],
            'length'=>$data['length'],
            'width'=>$data['width'],
            'height'=>$data['height'],
            'length_class_id'=>$data['length_class_id'],
            'weight'=>$data['weight'],
            'weight_class_id'=>$data['weight_class_id'],
            'status'=>$data['status'],
            'manufacturer_id'=>$data['manufacturer_id'],
            'image' => $data['image']
        );

     if($this->repo->update($productId,$products))
     {
        if(isset($data['product_attribute'])) {
            $this->productAttributeRepo->updateProductAttributes($data['product_attribute'], $productId);
        }
        if(isset($data['product_discount'])){
            $this->productDiscountRepo->updateProductDiscounts($data['product_discount'],$productId);
        }
        if(isset($data['product_image'])){
            $this->productImageRepo->updateProductImages($data['product_image'],$productId);
        }
        if(isset($data['category'])){
             $product = $this->repo->findById($productId);
             $this->repo->storeProductCategory($data['category'],$product);
        }
        if(isset($data['store']))
        {
          $product  = $this->repo->findById($productId);
          $this->repo->storeProductInStores($data['store'],$product);
        }
        if(isset($data['related_id']))
        {
          $relatedproduct_data=array(
                'product_id'=>$product->product_id,
                'related_id'=>$data['related_id']
                );
            $this->productRelatedRepo->storeRelatedProduct($relatedproduct_data,$productId);
        }

    }
        return true;
    }

    /**
     * Get Product With Attributes
     *
     * @param $productId
     * @return mixed
     */
    public function getProductWithAttributes($productId)
    {
        $productAttributes = $this->productAttributeRepo->getProductAttributesByProductId($productId);
        return  $this->attributeRepo->getAttributesByAttributeId($productAttributes);
       

    }

    /**
     * @param $productId
     * @return mixed
     */
    public function getProductDiscountsByProductId($productId)
    {
        return $this->productDiscountRepo->getProductDiscountsByProductId($productId);
    }


    public function getProductImagesByProductId($productId)
    {
        return $this->productImageRepo->getProductImagesByProductId($productId);
    }


    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithProductAccToUser($user)
    {
        return $this->repo->getStoreWithProductAccToUser($user);
    }


     /**
     * @param $store
     * @return mixed
     */
    public function getProductAccToStore($store)
    {
         return $this->repo->getProductAccToStore($store);
    }


    /**
     * 
     * @return mixed
     */
    public function getProductViews()
    {
         return $this->repo->getProductViews();
    }

    /**
     * 
     * @return mixed
     */
    public function getTotalViews()
    {
         return $this->repo->getTotalViews();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function getProductInventoryReport($data)
    {
         return $this->repo->getProductInventoryReport($data);
    }
    



    /****
     * ============================================
     *
     * Admin/Backend/Dashboard Related Methods Ends here
     *
     * ===========================================
     ****/




    /****
     * ============================================
     *
     * Frontend Related Methods starts from here
     *
     * ===========================================
     ****/
    /**
     * Get Product With Pagination
     *
     * @return mixed
     */
    public function productPagination()
    {
        return $this->repo->productPagination();
    }

     /**
     * Get Product by Search
     *
     * @param $search
     * @return mixed
     */
    public function getBySearch($search)
    {
        return $this->repo->getBySearch($search);
    }

    /**
     * Update View Count of Product
     *
     * @param $slug
     * @return mixed
     */
    public function updateViewCount($slug)
    {
        return $this->repo->updateViewCount($slug);
    }

    /**
     * @param $category
     * @return mixed
     */
    public function getProductsByCategory($category)
    {

        return $this->repo->getProductsByCategory($category);
    }

    public function getProductsWithDiscount($id)
    {

        return $this->repo->getProductsWithDiscount($id);
    }

    /****
     * ============================================
     *
     * Frontend Related Methods ends here
     *
     * ===========================================
     ****/


}