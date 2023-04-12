<?php


/**
 * Created by sublime.
 * User: khem
 * Date: 8/30/16
 * Time: 10:49 AM
 */

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\AttributeRequest;
use KerungRepo\Services\AttributeService;
use KerungRepo\Services\AttributeGroupService;
use KerungRepo\Services\ProductAttributeService;

/**
 * Class AttributeController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regimi <khemrr067@gmail.com>
 */
class AttributeController extends Controller
{
    /**
     * Service Object
     *
     * @var object $service
     */
    protected $service;


    /**
     * agService Object
     *
     * @var object $agService
     */
    protected $agService;

    /**
     * ProductAttributeService Object
     *
     * @var object $productAttributeService
     */
    protected $productAttributeService;



    /**
     * Attribute constructor.
     * @param AttributeService $service
     * @param AttributeGroupService $agService
     */
    public function __construct(AttributeService $service, 
                                AttributeGroupService $agService, 
                                ProductAttributeService $productAttributeService)
    {
        $this->service = $service;
        $this->agService = $agService;
        $this->productAttributeService = $productAttributeService;
    }


    /**
     * Add Attribute Create
     *
     * @return View
     */
    public function create()
    {
        return view('admin.attribute.admin_add_attribute', ['attribute_group' => $this->agService->getAll()]);
    }


    /**
     * List Attribute index
     *
     * @return View
     */

    public function index()
    {
        return view('admin.attribute.admin_table_attribute', ['attributes' => $this->service->getAttributesWithAttributeGroup()]);
    }


    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.attribute.admin_edit_attribute', ['attribute' => $this->service->getById($id)],
            ['attribute_group' => $this->agService->getAll()]);
    }

    /**
     *
     * @param AttributeRequest $request
     */
    public function store(AttributeRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
       return Redirect::route('admin.attribute.index');


    }

    /**
     * Update Attribute Data
     *
     * @param AttributeRequest $request
     * @param $id
     * @return mixed
     */
    public function update(AttributeRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
        $this->service->store($data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.attribute.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {   
        $response= $this->productAttributeService->hasChild('attribute_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }
}
