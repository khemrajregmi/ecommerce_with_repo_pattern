<?php

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Kerung\Http\Requests;
use Kerung\Http\Controllers\Controller;
use KerungRepo\Services\WeightClassService;
use KerungRepo\Services\ProductService;
use Jleon\LaravelPnotify\Notify;
use Illuminate\Support\Facades\Redirect;

/**
 * Class WeightClassController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class WeightClassController extends Controller
{

    /**
     * Weight Class Service
     * @var WeightClassService
     */
    protected $service;

    /**
     * Product service
     *
     * @var object $productService
     */
    protected $productService;

    /**
     * WeightClassController constructor.
     * @param WeightClassService $service
     */
    public function __construct(WeightClassService $service,
                                ProductService $productService)
    {
        $this->service = $service;
        $this->productService = $productService;
    }


    /**
     * Index View of Weight Class
     *
     * @return mixed
     */
    public function index()
    {
        return view('admin.weightclass.admin_table_weightclass', ['weightclasses' => $this->service->getAll()]);
    }

    /**
     * Create Weight Class
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.weightclass.admin_add_weightclass');
    }


    /**
     * Store Weight Class Data
     *
     * @param Requests\Admin\WeightClassRequest $request
     * @return mixed
     */
    public function store(Requests\Admin\WeightClassRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.weightclass.index');
    }

    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.weightclass.admin_edit_weightclass', ['weightclass' => $this->service->getById($id)]);
    }


    /**
     * Update WeightClass Data
     *
     * @param Requests\Admin\WeightClassRequest $request
     * @param $id
     * @return mixed
     */
    public function update(Requests\Admin\WeightClassRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id, $data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.weightclass.index');
    }

    /**
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->productService->hasChild('weight_class_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }

}
