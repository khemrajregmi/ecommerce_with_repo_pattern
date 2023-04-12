<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 8/31/16
 * Time: 10:46 AM
 */

namespace KerungRepo\Repository\Eloquent;

use Kerung\Models\Manufacturer;
use KerungRepo\Repository\ManufacturerRepositoryInterface;


/**
 * Class ManufacturerEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ManufacturerEloquentRepository extends BaseEloquentRepository implements ManufacturerRepositoryInterface
{

    /**
     * ManufacturerEloquentRepository constructor.
     * @param Manufacturer $manufacturer
     */
    public function __construct(Manufacturer $manufacturer)
    {
        $this->model = $manufacturer;
    }

     /**
     * @param $manufacturerId
     * @param $manufacuturer
     * @return mixed
     */
    public function storeManufacturerInStores($manufacturerId, $manufacuturer)
    {
     return  $manufacuturer->Store()->sync($manufacturerId);
    }


    /**
     * Get Store With Manufacturer Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithManufacturerAccToUser($user)
    {
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['manufacturers'] = $value->manufacturers()->get();
            }
            return $stores;
    }
}