<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 12/23/16
 * Time: 08:30 AM
 */

namespace KerungRepo\Services;



use Excel;
use KerungRepo\Repository\ProductRepositoryInterface;
use KerungRepo\Repository\CategoryRepositoryInterface;
use KerungRepo\Repository\ManufacturerRepositoryInterface;

/**
 * Class ImportExportService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ImportExportService extends BaseService
{

     /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepositoryInterface;

    /**
     * @var ManufacturerRepositoryInterface
     */
    protected $manufacturerRepositoryInterface;



    /**
     * ProductService constructor.
     * @param ProductRepositoryInterface $repo
     */
    public function __construct(
                  ProductRepositoryInterface $repo,
                  CategoryRepositoryInterface $categoryRepositoryInterface,
                  ManufacturerRepositoryInterface $manufacturerRepositoryInterface)
    {
        $this->repo = $repo;
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
        $this->manufacturerRepositoryInterface = $manufacturerRepositoryInterface;
    }

    /**
     * @param $data
     * @param $type
     * @return mixed
     */
    public function productExport($data,$type)
    {
   		Excel::create('product_list', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }


    /**
     * @param $path
     * @param $store
     * @return bool
     */
    public function productImport($path,$store)
    {
      $data = Excel::load($path, function($reader) {})->get();
    	if(!empty($data) && $data->count()){
        foreach ($data->toArray() as $key => $value) {
          if(!empty($value)){
              $products = [
                  'name' => $value['name'],
                  'description' => $value['description'], 
                  'tag' => $value['tag'], 
                  'model' => $value['model'], 
                  'sku' => $value['sku'], 
                  'quantity' => $value['quantity'], 
                  'stock_status_id' => $value['stock_status_id'], 
                  'image' => $value['image'], 
                  'newarrival' => $value['newarrival'], 
                  'manufacturer_id' => $value['manufacturer_id'], 
                  'shipping' => $value['shipping'], 
                  'price' => $value['price'], 
                  'weight' => $value['weight'], 
                  'weight_class_id' => $value['weight_class_id'],
                  'length' => $value['length'],
                  'height' => $value['height'],
                  'width' => $value['width'],
                  'length_class_id' => $value['length_class_id'],
                  'subtract' => $value['subtract'],
                  'status' => $value['status'],
                  'viewed' => $value['viewed'],
                  'minimum' => $value['minimum'],
                  'meta_title' => $value['meta_title'],
                  'meta_description' => $value['meta_description'],
                  'meta_keywords' => $value['meta_keywords'],
                  'is_discountable' => $value['is_discountable']
              ];
              $product =$this->repo->create($products);
              if(isset($store['store'])){
                  $this->repo->storeProductInStores($store['store'],$product);
              }
          }
        }

        
        if(!empty($products)){
          return true;
        }

      }
    }


    /**
     * @param $data
     * @param $type
     * @return mixed
     */
    public function categoryExport($data,$type)
    {

      Excel::create('category_list', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    /**
     * @param $path
     * @return bool
     */
    public function categoryImport($path)
    {
      $data = Excel::load($path, function($reader) {})->get();
      if(!empty($data) && $data->count()){

        foreach ($data->toArray() as $key => $value) {
          if(!empty($value)){
              $categories = [
                  'name' => $value['name'],
                  'description' => $value['description'],
                  'meta_title' => $value['meta_title'],
                  'meta_description' => $value['meta_description'],
                  'meta_keyword' => $value['meta_keyword'],
                  'parent_id' => $value['parent_id'],
                  'status' => $value['status']
              ];
              $category =$this->categoryRepositoryInterface->create($categories);
            
          }
        }
        if(!empty($categories)){
          return true;
        }

      }
    }

    /**
     * @param $data
     * @param $type
     * @return mixed
     */
    public function manufacturerExport($data,$type)
    {

      Excel::create('manufacturer_list', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    /**
     * @param $path
     * @param $store
     * @return bool
     */
    public function manufacturerImport($path,$store)
    {
      $data = Excel::load($path, function($reader) {})->get();
      if(!empty($data) && $data->count()){

        foreach ($data->toArray() as $key => $value) {
          if(!empty($value)){
              $manufacturers = [
                  'name' => $value['name']
              ];
              $manufacturer =$this->manufacturerRepositoryInterface->create($manufacturers);
              if(isset($store['store'])){
                  $this->manufacturerRepositoryInterface->storeManufacturerInStores($store['store'],$manufacturer);
              }
          }
        }

        
        if(!empty($manufacturers)){
          return true;
        }

      }
    }


}