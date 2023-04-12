<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 12:00 PM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\CustomerFamilyType;
use KerungRepo\Repository\CustomerFamilyTypeRepositoryInterface;

class CustomerFamilyTypeEloquentRepository extends BaseEloquentRepository implements CustomerFamilyTypeRepositoryInterface
{
    /**
     * CustomerFamilyTypeEloquentRepository constructor.
     *  
     * @param CustomerFamilyType $customerfamilytype
     */
    public function __construct(CustomerFamilyType $customerfamilytype)
    {
        $this->model = $customerfamilytype;
    }

     /**
     * @param $customerFamilyTypeId
     * @param $customerFamilyType
     * @return mixed
     */
    public function storeCustomerFamilyTypeInStores($customerFamilyTypeId, $customerFamilyType)
    {
     return  $customerFamilyType->Store()->sync($customerFamilyTypeId);
    }


    /**
     * Get Store With CustomerFamilyType Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithCustomerFamilyTypeAccToUser($user)
    {
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['customerFamilyTypes'] = $value->customerFamilyTypes()->get();
            }
            return $stores;
    }
}