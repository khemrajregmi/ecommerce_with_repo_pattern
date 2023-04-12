<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 15/11/16
 * Time: 11:47 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\DiscountAttributeRepositoryInterface;

/**
 * Class DiscountAttributeService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class DiscountAttributeService extends BaseService
{

    /**
     * DiscountAttributeService constructor.
     * @param DiscountAttributeRepositoryInterface $repo
     */
    public function __construct(DiscountAttributeRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}