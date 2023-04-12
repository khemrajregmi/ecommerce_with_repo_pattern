<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/01/16
 * Time: 03:00 PM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\Voucher;
use KerungRepo\Repository\VoucherRepositoryInterface;

class VoucherEloquentRepository extends BaseEloquentRepository implements VoucherRepositoryInterface
{
    /**
     * VoucherEloquentRepository constructor.
     *  
     * @param Voucher $voucher
     */
    public function __construct(Voucher $voucher)
    {
        $this->model = $voucher;
    }

    /**
     * @param $voucherId
     * @param $voucher
     * @return mixed
     */
    public function storeVoucherInStores($voucherId, $voucher)
    {
     return  $voucher->Store()->sync($voucherId);
    }


    /**
     * Get Store With Voucher Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithVoucherAccToUser($user)
    {
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['vouchers'] = $value->vouchers()->get();
            }
            return $stores;
    }
}