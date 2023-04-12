<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/01/16
 * Time: 2:21 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\VoucherRepositoryInterface;

/**
 * Class VoucherService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class VoucherService extends BaseService
{
	/**
     * VoucherService constructor.
     * @param VoucherRepositoryInterface $repo
     */
	
    public function __construct(VoucherRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }


    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithVoucherAccToUser($user)
    {
        return $this->repo->getStoreWithVoucherAccToUser($user);
    }


    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
        $vouchers = array(
                'code'=>$data['code'],
                'from_name'=>$data['from_name'],
                'from_email'=>$data['from_email'],
                'to_name'=>$data['to_name'],
                'to_email'=>$data['to_email'],
                'voucher_theme_id'=>$data['voucher_theme_id'],
                'message'=>$data['message'],
                'amount'=>$data['amount'],
                'status'=>$data['status']
                );
                
        $voucher =  $this->repo->create($vouchers);
        $this->repo->storeVoucherInStores($data['store'],$voucher);
        return true;
    }


    /**
     * @param $voucherId
     * @param array $data
     * @return bool
     */
    public function update($voucherId,array $data)
    {
        $vouchers = array(
                'code'=>$data['code'],
                'from_name'=>$data['from_name'],
                'from_email'=>$data['from_email'],
                'to_name'=>$data['to_name'],
                'to_email'=>$data['to_email'],
                'voucher_theme_id'=>$data['voucher_theme_id'],
                'message'=>$data['message'],
                'amount'=>$data['amount'],
                'status'=>$data['status']
                );

    $this->repo->update($voucherId,$vouchers);
    $voucher  = $this->repo->findById($voucherId);
    $this->repo->storeVoucherInStores($data['store'],$voucher);
    return true;
    }
}