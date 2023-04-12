<?php
/**
 * Created by Sublime.
 * User: khem
 * Date: 21/12/16
 * Time: 10:29 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\CustomerProSugRepositoryInterface;

/**
 * Class CustomerProSugService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class CustomerProSugService extends BaseService
{
    /**
     * CustomerProSugService constructor.
     * @param CustomerProSugRepositoryInterface $repo
     */
    public function __construct(CustomerProSugRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}