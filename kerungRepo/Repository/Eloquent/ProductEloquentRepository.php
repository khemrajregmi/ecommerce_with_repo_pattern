<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 8/26/16
 * Time: 8:25 AM
 */

namespace KerungRepo\Repository\Eloquent;

use KerungRepo\Repository\Eloquent\BaseEloquentRepository;
use Kerung\Models\Product;
use KerungRepo\Repository\ProductRepositoryInterface;

class ProductEloquentRepository extends BaseEloquentRepository implements ProductRepositoryInterface
{
    /**
     * ProductEloquentRepository constructor.
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    /****
     * ============================================
     *
     * Admin/Backend/Dashboard Related Methods starts from here
     *
     * ===========================================
     ****/


    /**
     * Create Product Image
     *
     * @param $data
     * @return static
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * Update Products
     *
     * @param $productId
     * @param $products
     * @return mixed
     */
    public function update($productId, $products)
    {
        return $this->model->where('product_id', '=', $productId)->update($products);
    }


    /**
     * @param $categoryId
     * @param $product
     * @return mixed
     */
    public function storeProductCategory($categoryId, $product)
    {
     return  $product->Category()->sync($categoryId);
    }


    public function storeProductInStores($storeId,$product)
    {
        return $product->Store()->sync($storeId);
    }

    /**
     * Get Store With Product Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithProductAccToUser($user)
    {
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['products'] = $value->products()->get();
            }
            return $stores;
    }

    /**
     * @param $store
     * @return mixed
     */
    public function getProductAccToStore($store)
    {   
        return $store->first()->products()->get();
    }

    /**
     * Stock Deduction of product after order
     * @param $quantity
     * @return mixed
     */
    public function minimizeStock($quantity)
    {
        foreach ($quantity as $qty) 
        {
            $result= $this->model->where('product_id','=',$qty->id)->first();
            $remaining_quantity = $result['quantity'] - $qty->qty;
            $this->model->where('product_id','=',$qty->id)
                    ->update(['quantity' => $remaining_quantity]);
        }
    }


    /**
     * @param Old Quantity $oldqty
     * @param $data
     * @return mixed
     */
    public function updateStock($data, $oldqty)
    {
        $datas = $data->toArray();
        $count=0;
        foreach ($datas as $index=>$d) 
        {
            // dd($d);
            $d['old_qty'] = $oldqty[$count++];
            $datas[$index] = $d;
            // dd($d);
        }
        // dd($datas);
        foreach ($datas as $d) 
        {
            $result= $this->model->where('product_id','=',$d['id'])->first();
            $remaining_quantity = $result['quantity'] - $d['qty'] + $d['old_qty'];
            $this->model->where('product_id','=',$d['id'])
                    ->update(['quantity' => $remaining_quantity]);
        }
    }

    /**
     * @return mixed
     */
    public function getProductViews()
    {   
        return $this->model->where('viewed', '>=', 1)->orderBy('viewed','DESC')->get();
    }

    /**
     * 
     * @return mixed
     */
    public function getTotalViews()
    {
       return $this->model->sum('viewed');
    }

    /**
     * @param $data
     * @return mixed
     */
    public function getProductInventoryReport($data)
    {
       if($data['stock_status_id']==0)
       {
        return $this->model->get();
       }
       else
       {
        return $this->model->where('stock_status_id', '=',$data['stock_status_id'])->get();
       }
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
     * @return mixed
     */
    public function productPagination()
    {
        return $this->model->where('status', '=', 1)->with('Discount')->paginate(12);
    }


    public function getProductsWithDiscount($id)
    {
        return $this->model->where('product_id', '=', $id)->with('Discount')->first();
    }


    /**
     * @param $search
     * @return mixed
     */
    public function getBySearch($search)
    {
        return $this->model->where('name', 'LIKE', '%'. $search .'%')->paginate(9);
    }

     /**
     * @param $slug
     * @return mixed
     */
    public function updateViewCount($slug)
    {
        $data= $this->model->where('slug', '=', $slug)->first();
        return $this->model->where('slug','=',$slug)
            ->update(['viewed' => $data['viewed']+1]);
    }

    /**
     * @param $category
     * @return mixed
     */
    public function getProductsByCategory($category)
    {
        return $category->products()->paginate(9);
    }

    /****
     * ============================================
     *
     * Frontend Related Methods ends from here
     *
     * ===========================================
     ****/

}