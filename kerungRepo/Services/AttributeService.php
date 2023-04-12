<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 8/29/16
 * Time: 04:00 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\AttributeRepositoryInterface;



/**
 * Class AttributeService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class AttributeService extends BaseService
{
	/**
     * AttributeService constructor.
     * @param AttributeRepositoryInterface $repo
     */
    public function __construct(AttributeRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }


    /**
     * @return mixed
     */
    public function getAttributesWithAttributeGroup()
    {
        return $this->repo->getAttributesWithAttributeGroup();
    }

}