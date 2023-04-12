<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/06/16
 * Time: 01:00 PM
 */


namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\Country;
use KerungRepo\Repository\CountryRepositoryInterface;
/**
 * Class CountryEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class CountryEloquentRepository extends BaseEloquentRepository implements CountryRepositoryInterface
{
    /**
     * CountryEloquentRepository constructor.
     *  
     * @param Country $country
     */
    public function __construct(Country $country)
    {
        $this->model = $country;
    }


    
}