<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 12:00 PM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\Customer;
use KerungRepo\Repository\CustomerRepositoryInterface;

class CustomerEloquentRepository extends BaseEloquentRepository implements CustomerRepositoryInterface
{
    /**
     * CustomerEloquentRepository constructor.
     *  
     * @param Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }

     /**
     * Get product for Wishlist by customer_id
     * @param CustomerID $id
     */

     public function getProductsByCustomerId($id)
    {
        $customer = $this->findById($id);
        return $customer->products()->get();
    }

     /**
     * @param $customerId
     * @param $customer
     * @return mixed
     */
    public function storeCustomerInStores($customerId, $customer)
    {
     return  $customer->Store()->sync($customerId);
    }


    /**
     * Get Store With Customer Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithCustomerAccToUser($user)
    {
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['customers'] = $value->customers()->get();
            }
            return $stores;
    }
}