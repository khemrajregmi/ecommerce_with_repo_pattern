<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/20/16
 * Time: 08:30 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\AddressRepositoryInterface;

/**
 * Class AddressService
 * @package KerungRepo\Services
 */
class AddressService extends BaseService
{
    /**
     * AddressService constructor.
     * @param AddressRepositoryInterface $repo
     */
    public function __construct(AddressRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store(array $data)
    {
        $address = array(
            // 'name'=>$data['name'],
            // 'description'=>$data['description'],
            // 'approval'=>$data['approval'],

            "customer_id" => $data['customer_id'],
            "firstname" => $data['firstname'],
            "lastname" => $data['lastname'],
            "company" => $data['company']?$data['company']:'Not avilable',
            "telephone" => $data['telephone']?$data['telephone']:'98000000000',
            "address_1" => $data['address_1']? $data['address_1']:'not available',
            "address_2" => $data['address_2']?$data['address_2']:'not available',
            "country_id" => 1,
            "state_id" => 3,
            "city_id" => 6,
            "area_id" => 1,
            );
            // dd($address);
     
        $this->repo->create($address);
        // $this->repo->storeCustomerGroupInStores($data['store'],$address);
        return true;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getAddressByCustomerID($id)
    {
    	return $this->repo->getAddressByCustomerID($id);
    }
}