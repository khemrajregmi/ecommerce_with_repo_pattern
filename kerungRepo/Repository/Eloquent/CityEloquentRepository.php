<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/19/16
 * Time: 10:40 AM
 */


namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\City;
use KerungRepo\Repository\CityRepositoryInterface;
/**
 * Class CityEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class CityEloquentRepository extends BaseEloquentRepository implements CityRepositoryInterface
{
    /**
     * CityEloquentRepository constructor.
     *  
     * @param City $city
     */
    public function __construct(City $city)
    {
        $this->model = $city;
    }

     /**
     * Get All City By State Id
     * @param $stateId
     */
  	public function getAllCityByStateId($stateId)
  	{
  		return $this->model->where('state_id', $stateId)->get();
  	}
    
}