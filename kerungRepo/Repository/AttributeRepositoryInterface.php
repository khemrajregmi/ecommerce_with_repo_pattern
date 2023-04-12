<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 8/29/16
 * Time: 04:00 PM
 */

namespace KerungRepo\Repository;


/**
 * Interface Attribute
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface AttributeRepositoryInterface
{

    /**
     * @return mixed
     */
    public function getAttributesWithAttributeGroup();

    /**
     * @param $productAttributes
     * @return mixed
     */
    public function getAttributesByAttributeId($productAttributes);

    /**
     * @param $id
     * @return mixed
     */
	// public function hasChild($id);
}