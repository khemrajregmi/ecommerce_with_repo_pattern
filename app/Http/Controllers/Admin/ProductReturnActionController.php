<?php

/**
 * Created by sublime.
 * User: khem
 * Date: 9/05/16
 * Time: 9:00 AM
 */

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\ProductReturnActionRequest;
use KerungRepo\Services\ProductReturnActionService;
use KerungRepo\Services\ProductReturnService;

/**
 * Class ProductReturnController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regimi <khemrr067@gmail.com>
 */

class ProductReturnActionController extends Controller
{
    /**
     * Service Object
     *
     * @var object $service
     */
    protected $service;


    /**
     * ProductReturnService Object
     *
     * @var object $productReturnService
     */
    protected $productReturnService;

    /**
     * Return constructor.
     * @param ProductReturnActionService $service
     * @param ProductReturnService $productReturnService
     *
     */
    public function __construct(ProductReturnActionService $service,
                                ProductReturnService $productReturnService)
    {
        $this->service = $service;
        $this->productReturnService = $productReturnService;
    }


    /**
     * Add ReturnAction Create
     *
     * @return View
     */
    public function create()
    {
        return view('admin.returnaction.admin_add_return_action');
    }


    /**
     * List Return index
     *
     * @return View
     */

    public function index()
    {
        return view('admin.returnaction.admin_table_return_action', ['returnaction' => $this->service->getAll()]);
    }


    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.returnaction.admin_edit_return_action', ['returnaction' => $this->service->getById($id)]);
    }

    /**
     *
     * @param ProductReturnActionRequest $request
     */
    public function store(ProductReturnActionRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.returnaction.index');

    }

    /**
     * Update return Data
     *
     * @param ProductReturnActionRequest $request
     * @param $id
     * @return mixed
     */
    public function update(ProductReturnActionRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
         Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.returnaction.index');
    }

    /**
     *Delete return Data
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->productReturnService->hasChild('product_return_action_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }
}
