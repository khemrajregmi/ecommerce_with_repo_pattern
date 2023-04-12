<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 8/30/16
 * Time: 02:00 PM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\AttributeGroup;
use KerungRepo\Repository\AttributeGroupRepositoryInterface;

class AttributeGroupEloquentRepository extends BaseEloquentRepository implements AttributeGroupRepositoryInterface
{
    /**
     * AttributeGroupEloquentRepository constructor.
     *  
     * @param AttributeGroup $attribute_group
     */
    public function __construct(AttributeGroup $attribute_group)
    {
        $this->model = $attribute_group;
    }


    
}