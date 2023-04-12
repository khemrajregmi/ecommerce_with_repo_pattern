<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 1/23/17
 * Time: 10:40 AM
 */


namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\Address;
use KerungRepo\Repository\AddressRepositoryInterface;
/**
 * Class AddressEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class AddressEloquentRepository extends BaseEloquentRepository implements AddressRepositoryInterface
{
    /**
     * AddressEloquentRepository constructor.
     *  
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        $this->model = $address;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAddressByCustomerID($id)
    {
    	return $this->model->where('customer_id', '=', $id)->get();
    }
}