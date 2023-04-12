<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 12:00 PM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\CustomerGroup;
use KerungRepo\Repository\CustomerGroupRepositoryInterface;

class CustomerGroupEloquentRepository extends BaseEloquentRepository implements CustomerGroupRepositoryInterface
{
    /**
     * CustomerGroupEloquentRepository constructor.
     *  
     * @param CustomerGroup $customer_group
     */
    public function __construct(CustomerGroup $customer_group)
    {
        $this->model = $customer_group;
    }


     /**
     * @param $customergroupId
     * @param $customergroup
     * @return mixed
     */
    public function storeCustomerGroupInStores($customergroupId, $customergroup)
    {
     return  $customergroup->Store()->sync($customergroupId);
    }


    /**
     * Get Store With CustomerGroup Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithCustomerGroupAccToUser($user)
    {
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['customergroups'] = $value->customergroups()->get();
            }
            return $stores;
    }

    
}