<?php

/**
 * Created by sublime.
 * User: khem
 * Date: 8/30/16
 * Time: 11:49 AM
 */

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\AttributeGroupRequest;
use KerungRepo\Services\AttributeGroupService;
use KerungRepo\Services\AttributeService;

/**
 * Class AttributeGroupController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regimi <khemrr067@gmail.com>
 */
class AttributeGroupController extends Controller
{
    /**
     * Service Object
     *
     * @var object $service
     */
    protected $service;

    /**
     * Service Object
     *
     * @var object $service
     */
    protected $attributeService;

    /**

     * AttributeGroup constructor.
     * @param AttributeGroupService $service
     */
    public function __construct(AttributeGroupService $service,
                                AttributeService $attributeService)
    {
        $this->service = $service;
        $this->attributeService = $attributeService;
    }


    /**
     * Add Category Create
     * 
     *@return View
     */
    public function create(){
        return view('admin.attributegroup.admin_add_attributegroup');
    }




  
    /**
     * List AttributeGroup index
     *
     * @return View
     */

    public function index()
    {
        return view('admin.attributegroup.admin_table_attributegroup', ['attribute_group' => $this->service->getAll()]);
    }


    /**

     * 
     * @param  $id
     *
     * @param Request $request
     */

    public function edit($id)
    {
        return view('admin.attributegroup.admin_edit_attributegroup',
            ['attribute_group' => $this->service->getById($id)]);
    }

    /**
     *
     * @param AttributeGroupRequest $request
     */
    public function store(AttributeGroupRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
       return Redirect::route('admin.attributegroup.index');
    }

    /**
     * Update AttributeGroup Data
     *
     * @param AttributeGroupRequest $request
     * @param $id
     * @return mixed
     */
    public function update(AttributeGroupRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.attributegroup.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        
        $response= $this->attributeService->hasChild('attribute_group_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }
}
