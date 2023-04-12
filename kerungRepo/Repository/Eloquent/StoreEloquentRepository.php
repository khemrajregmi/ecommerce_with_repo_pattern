<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/8/16
 * Time: 10:41 AM
 */

namespace KerungRepo\Repository\Eloquent;


use Kerung\Models\Store;
use KerungRepo\Repository\StoreRepositoryInterface;
use Sentinel;

/**
 * Class StoreEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class StoreEloquentRepository extends BaseEloquentRepository implements StoreRepositoryInterface
{

    /**
     * StoreEloquentRepository constructor.
     * @param Store $store
     */
    public function __construct(Store $store)
    {
        $this->model = $store;
    }


    /**
     * Get Store Name By Store Id
     *
     * @param $storeId
     * @return mixed
     */
    public function getStoreNameByStoreId($storeId)
    {
     $store = $this->findById($storeId)->first();
        return $store->store_name;
    }


    /**
     * Get Store With City And Area According to Logged In User
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithCityAndAreaAccToUser()
    {
        if($user = Sentinel::getUser()) {
            if($user->inRole('administrator')){
                return $this->model->all();
            }
            return $user->Store()->with('city', 'area')->get();
        }
        return false;
    }



    public function getStoreAccToUser($user)
    {
        return $user->Store;
    }

    public function getProductByStoreId($storeId)
    {   
        $stores = explode(',', $storeId);
        foreach ($stores as $id) {
            $store[] = $this->findById($id)->products;
        }
        return $store;
            
    }
    

}