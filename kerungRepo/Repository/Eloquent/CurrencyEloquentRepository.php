<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/6/16
 * Time: 10:27 AM
 */

namespace KerungRepo\Repository\Eloquent;


use Kerung\Models\Currency;
use KerungRepo\Repository\CurrencyRepositoryInterface;

/**
 * Class CurrencyEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class CurrencyEloquentRepository extends BaseEloquentRepository implements CurrencyRepositoryInterface
{
    /**
     * CurrencyEloquentRepository constructor.
     * @param Currency $currency
     */
    public function __construct(Currency $currency)
    {
        $this->model = $currency;
    }

}