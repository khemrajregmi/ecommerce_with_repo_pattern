<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/01/16
 * Time: 1:21 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\VoucherThemeRepositoryInterface;

/**
 * Class VoucherThemeService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class VoucherThemeService extends BaseService
{	
	/**
     * VoucherThemeService constructor.
     * @param VoucherThemeRepositoryInterface $repo
     */
	
    public function __construct(VoucherThemeRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithVoucherThemeAccToUser($user)
    {
        return $this->repo->getStoreWithVoucherThemeAccToUser($user);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
        $voucherthemes = array(
                'name'=>$data['name'],
                'image'=>$data['image']
                );
                
        $vouchertheme =  $this->repo->create($voucherthemes);
        $this->repo->storeVoucherThemeInStores($data['store'],$vouchertheme);
        return true;
    }


    /**
     * @param $voucherthemeId
     * @param array $data
     * @return bool
     */
    public function update($voucherthemeId,array $data)
    {
        $voucherthemes = array(
                'name'=>$data['name'],
                'image'=>$data['image']
                );

    $this->repo->update($voucherthemeId,$voucherthemes);
    $vouchertheme  = $this->repo->findById($voucherthemeId);
    $this->repo->storeVoucherThemeInStores($data['store'],$vouchertheme);
    return true;
    }
}