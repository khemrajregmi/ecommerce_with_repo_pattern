<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/16/16
 * Time: 03:00 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\BannerImageRepositoryInterface;

/**
 * Class BannerImageService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class BannerImageService extends BaseService
{
	/**
     * BannerImageService constructor.
     * @param BannerImageRepositoryInterface $repo
     */
	
    public function __construct(BannerImageRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}