<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 14/11/16
 * Time: 11:47 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\DiscountTypeRepositoryInterface;

/**
 * Class DiscountTypeService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class DiscountTypeService extends BaseService
{

    /**
     * DiscountTypeService constructor.
     * @param DiscountTypeRepositoryInterface $repo
     */
    public function __construct(DiscountTypeRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithDiscountTypeAccToUser($user)
    {
        return $this->repo->getStoreWithDiscountTypeAccToUser($user);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
         $discounttype_datas = array(
                'name'=>$data['name'],
                'status'=>$data['status']
                );
         
        $discounttype_data =  $this->repo->create($discounttype_datas);
        $this->repo->storeDiscountTypeInStores($data['store'],$discounttype_data);
        return true;
    }


    /**
     * @param $discounttypeId
     * @param array $data
     * @return bool
     */
    public function update($discounttypeId,array $data)
    {
        $discounttype_datas = array(
                'name'=>$data['name'],
                'status'=>$data['status']
                );

    $this->repo->update($discounttypeId,$discounttype_datas);
    $discounttype_data  = $this->repo->findById($discounttypeId);
    $this->repo->storeDiscountTypeInStores($data['store'],$discounttype_data);
    return true;
    }
}