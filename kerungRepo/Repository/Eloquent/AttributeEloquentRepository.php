<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 8/29/16
 * Time: 04:00 PM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\Attribute;
use KerungRepo\Repository\AttributeRepositoryInterface;
use DB;

class AttributeEloquentRepository extends BaseEloquentRepository implements AttributeRepositoryInterface
{
    /**
     * AttributeEloquentRepository constructor.
     *  
     * @param Attribute $attribute
     */
    public function __construct(Attribute $attribute)
    {
        $this->model = $attribute;
    }


    /**
     * Get Attribute with AttributeGroup
     * 
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAttributesWithAttributeGroup(){
        return $this->model->with('attributeGroup')->get();
    }


    /**
     * @param $productAttributes
     * @return array
     */
    public function getAttributesByAttributeId($productAttributes)
    {
        $productsAttributes=[];
        foreach($productAttributes as $productAttribute)
        {
            $product['attribute_id']= $this->model->where('attribute_id','=',$productAttribute->attribute_id)->first()->attribute_id;
            $product['text'] = $productAttribute->text;
            $productsAttributes[] = $product;
        }
        return $productsAttributes;
    }

    /**
     * @param $id
     * @return mixed
     */
    // public function hasChild($id)
    // {
    //     return $this->model->where('attribute_group_id','=',$id)->first();
    // }

}