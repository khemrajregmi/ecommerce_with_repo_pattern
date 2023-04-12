<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/6/16
 * Time: 10:29 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\CurrencyRepository;
use KerungRepo\Repository\CurrencyRepositoryInterface;

/**
 * Class CurrencyService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class CurrencyService extends BaseService
{
    /**
     * CurrencyService constructor.
     * @param CurrencyRepositoryInterface $repo
     */
    public function __construct(CurrencyRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}