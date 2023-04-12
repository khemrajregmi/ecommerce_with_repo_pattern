<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 8/30/16
 * Time: 12:00 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\AttributeGroupRepositoryInterface;
use KerungRepo\Repository\AttributeRepositoryInterface;

/**
 * Class AttributeGroupService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class AttributeGroupService extends BaseService
{
	/**
     * AttributeGroupService constructor.
     * @param AttributeGroupRepositoryInterface $repo
     * @param AttributeRepositoryInterface $attributeRepo
     */
    public function __construct(
                AttributeGroupRepositoryInterface $repo,
                AttributeRepositoryInterface $attributeRepository)
    {
        $this->repo = $repo;
        $this->attributeRepo = $attributeRepository;
    }

    // public function hasChild($id)
    // {
    // 	return $this->attributeRepo->hasChild($id);
    // }
}