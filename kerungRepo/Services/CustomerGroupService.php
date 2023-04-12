<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 12:00 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\CustomerGroupRepositoryInterface;

/**
 * Class CustomerGroupService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class CustomerGroupService extends BaseService
{
	/**
     * CustomerGroupService constructor.
     * @param CustomerGroupRepositoryInterface $repo
     */
    public function __construct(CustomerGroupRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithCustomerGroupAccToUser($user)
    {
        return $this->repo->getStoreWithCustomerGroupAccToUser($user);
    }


    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
        $customer_groupdatas = array(
                'name'=>$data['name'],
                'description'=>$data['description'],
                'approval'=>$data['approval']
                );
         
        $customer_groupdata =  $this->repo->create($customer_groupdatas);
        $this->repo->storeCustomerGroupInStores($data['store'],$customer_groupdata);
        return true;
    }


    /**
     * @param $customerGroupId
     * @param array $data
     * @return bool
     */
    public function update($customerGroupId,array $data)
    {
        $customer_groupdatas = array(
		        'name'=>$data['name'],
		        'description'=>$data['description'],
                'approval'=>$data['approval']
		        );

    $this->repo->update($customerGroupId,$customer_groupdatas);
    $customer_groupdata  = $this->repo->findById($customerGroupId);
    $this->repo->storeCustomerGroupInStores($data['store'],$customer_groupdata);
    return true;
	}

}