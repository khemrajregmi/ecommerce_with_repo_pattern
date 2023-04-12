<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/06/16
 * Time: 01:00 PM
 */


namespace KerungRepo\Repository\Eloquent;

use Kerung\Models\State;
use KerungRepo\Repository\StateRepositoryInterface;


/**
 * Class StateEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class StateEloquentRepository extends BaseEloquentRepository implements StateRepositoryInterface
{

    /**
     * StateEloquentRepository constructor.
     * @param State $state
     */
    public function __construct(State $state)
    {
        $this->model = $state;
    }


    /**
     * Get All States By Country Id
     *
     * @param $countryId
     * @return mixed
     */
    public function getAllStatesByCountryId($countryId)
    {
    	return $this->model->where('country_id', $countryId)->get();
    }
}