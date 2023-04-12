<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/1/16
 * Time: 11:31 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\LengthClassRepositoryInterface;

/**
 * Class LengthClassService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class LengthClassService extends BaseService
{

    /**
     * LengthClassService constructor.
     * @param LengthClassRepositoryInterface $repo
     */
    public function __construct(LengthClassRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}