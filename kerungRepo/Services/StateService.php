<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/06/16
 * Time: 01:00 PM
 */
namespace KerungRepo\Services;


use KerungRepo\Repository\StateRepositoryInterface;

/**
 * Class StateService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class StateService extends BaseService
{
	/**
     * StateService constructor.
     * @param StateRepositoryInterface $repo
     */
	
    public function __construct(StateRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}