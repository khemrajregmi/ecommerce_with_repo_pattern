<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 11/15/16
 * Time: 9:59 AM
 */
namespace KerungRepo\Services;

use KerungRepo\Repository\ComboTypeRepositoryInterface;


/**
 * Class ComboTypeService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ComboTypeService extends BaseService

{
    /**
     * ComboTypeService constructor.
     * @param ComboTypeRepositoryInterface $comboTypeRepositoryInterface
     */
    public function __construct(ComboTypeRepositoryInterface $comboTypeRepositoryInterface)
    {
        $this->repo = $comboTypeRepositoryInterface;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithComboTypeAccToUser($user)
    {
        return $this->repo->getStoreWithComboTypeAccToUser($user);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
         $combo_type_datas = array(
                'name'=>$data['name']
                );
         
        $combo_type_data =  $this->repo->create($combo_type_datas);
        $this->repo->storeComboTypeInStores($data['store'],$combo_type_data);
        return true;
    }


    /**
     * @param $combotypeId
     * @param array $data
     * @return bool
     */
    public function update($combotypeId,array $data)
    {
        $combo_type_datas = array(
                'name'=>$data['name']
                );

    $this->repo->update($combotypeId,$combo_type_datas);
    $combo_type_data  = $this->repo->findById($combotypeId);
    $this->repo->storeComboTypeInStores($data['store'],$combo_type_data);
    return true;
    }
}