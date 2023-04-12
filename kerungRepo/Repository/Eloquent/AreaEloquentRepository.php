<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/19/16
 * Time: 10:40 AM
 */


namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\Area;
use KerungRepo\Repository\AreaRepositoryInterface;
/**
 * Class AreaEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class AreaEloquentRepository extends BaseEloquentRepository implements AreaRepositoryInterface
{
    /**
     * AreaEloquentRepository constructor.
     *  
     * @param Area $area
     */
    public function __construct(Area $area)
    {
        $this->model = $area;
    }

    /**
     * Get All Area By City Id
     * 
     * @param $cityId
     * @return mixed
     */
    public function getAllAreaByCityId($cityId)
    {
       return $this->model->where('city_id','=',$cityId)->get();
    }
    
}