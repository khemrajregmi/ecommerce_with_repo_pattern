<?php
/**
 * Created by Sublime.
 * User: khem
 * Date: 07/12/16
 * Time: 10:29 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\CustomerFamilyTypeRepositoryInterface;

/**
 * Class CustomerFamilyType
 * @package KerungRepo\Services
 * @author Khem Raj Regmi<khemrr067@gmail.com>
 */
class CustomerFamilyTypeService extends BaseService
{
    /**
     * CustomerFamilyTypeService constructor.
     * @param CustomerFamilyTypeRepositoryInterface $repo
     */
    public function __construct(CustomerFamilyTypeRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    
    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithCustomerFamilyTypeAccToUser($user)
    {
        return $this->repo->getStoreWithCustomerFamilyTypeAccToUser($user);
    }

    /**
     * Store Combo Offer
     * 
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
        $customerFamilyType = [
            'type_name' => $data['type_name']
        ];
        $familyType = $this->repo->create($customerFamilyType);
        if(isset($data['store']))
        {
            $this->repo->storeCustomerFamilyTypeInStores($data['store'],$familyType);
        }
        return true;

    }


    /**
     * Update Combo Offers
     *
     * @param $comboOfferId
     * @param array $data
     * @return bool
     */
    public function update($customerFamilyTypeId,array $data)
    {
        $customerFamilyType = [
            'type_name' => $data['type_name']
        ];
        $this->repo->update($customerFamilyTypeId,$customerFamilyType);
        if(isset($data['store']))
        {
            $familyType = $this->getById($customerFamilyTypeId);
            $this->repo->storeCustomerFamilyTypeInStores($data['store'],$familyType);
        }
        return true;
    }

}