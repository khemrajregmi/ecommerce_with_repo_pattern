<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/06/16
 * Time: 3:53 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\FeatureProductRepositoryInterface;

/**
 * Class FeatureProductService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class FeatureProductService extends BaseService
{

    /**
     * FeatureProductService constructor.
     * @param FeatureProductRepositoryInterface $repo
     */
    public function __construct(FeatureProductRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function storeData(array $data)
    {
        
        if(isset($data['product'])){
                $this->repo->storeData($data['product']);
            }
    }
}