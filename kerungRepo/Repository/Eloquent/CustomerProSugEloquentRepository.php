<?php
/**
 * Created by Sublime.
 * User: khem
 * Date: 21/12/16
 * Time: 10:29 AM
 */

namespace KerungRepo\Repository\Eloquent;


use Kerung\Models\CustomerProSug;
use KerungRepo\Repository\CustomerProSugRepositoryInterface;

/**
 * Class CustomerProSugEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class CustomerProSugEloquentRepository extends BaseEloquentRepository implements CustomerProSugRepositoryInterface
{
    /**
     * CustomerProSugEloquentRepository constructor.
     * @param CustomerProSug $customerProSug
     */
    public function __construct(CustomerProSug $customerProSug)
    {
        $this->model = $customerProSug;
    }

}