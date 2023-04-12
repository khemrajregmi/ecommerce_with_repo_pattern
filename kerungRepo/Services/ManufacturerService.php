<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 8/31/16
 * Time: 10:53 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\ManufacturerRepositoryInterface;

/**
 * Class ManufacturerService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ManufacturerService extends BaseService
{

    /**
     * ManufacturerService constructor.
     * @param ManufacturerRepositoryInterface $repo
     */
    public function __construct(ManufacturerRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
         $manufacturer_data = array(
		        'name'=>$data['name'],
		        'image'=>$data['image']
		        );
         
        $manufacuturer =  $this->repo->create($manufacturer_data);
        $this->repo->storeManufacturerInStores($data['store'],$manufacuturer);
        return true;
    }


    /**
     * @param $manufacturerId
     * @param array $data
     * @return bool
     */
    public function update($manufacturerId,array $data)
    {
        $manufacturer_data = array(
		        'name'=>$data['name'],
		        'image'=>$data['image']
		        );

    $this->repo->update($manufacturerId,$manufacturer_data);
    $manufacuturer  = $this->repo->findById($manufacturerId);
    $this->repo->storeManufacturerInStores($data['store'],$manufacuturer);
    return true;
	}

     /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithManufacturerAccToUser($user)
    {
        return $this->repo->getStoreWithManufacturerAccToUser($user);
    }

}