<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/01/16
 * Time: 02:00 PM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\VoucherTheme;
use KerungRepo\Repository\VoucherThemeRepositoryInterface;

class VoucherThemeEloquentRepository extends BaseEloquentRepository implements VoucherThemeRepositoryInterface
{
    /**
     * VoucherThemeEloquentRepository constructor.
     *  
     * @param VoucherTheme $vouchertheme
     */
    public function __construct(VoucherTheme $vouchertheme)
    {
        $this->model = $vouchertheme;
    }

    /**
     * @param $voucherthemeId
     * @param $voucher
     * @return mixed
     */
    public function storeVoucherThemeInStores($voucherthemeId, $vouchertheme)
    {
     return  $vouchertheme->Store()->sync($voucherthemeId);
    }


    /**
     * Get Store With Voucher Theme Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithVoucherThemeAccToUser($user)
    {
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['voucherthemes'] = $value->voucherthemes()->get();
            }
            return $stores;
    }
}