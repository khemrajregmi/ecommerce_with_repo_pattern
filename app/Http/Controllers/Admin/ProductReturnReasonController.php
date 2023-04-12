<?php

/**
 * Created by sublime.
 * User: khem
 * Date: 9/05/16
 * Time: 1:00 PM
 */

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\ProductReturnReasonRequest;
use KerungRepo\Services\ProductReturnReasonService;
use KerungRepo\Services\ProductReturnService;

/**
 * Class ProductReturnController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regimi <khemrr067@gmail.com>
 */


class ProductReturnReasonController extends Controller
{
    /**
     * ProductReturnReasonService Object
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
     * ProductReturnReason constructor.
     * @param ProductReturnService $productReturnService
     * @param ProductReturnReasonService $service
     *
     */
    public function __construct(ProductReturnReasonService $service,
                                ProductReturnService $productReturnService)
    {
        $this->service = $service;
        $this->productReturnService = $productReturnService;
    }


    /**
     * Add ReturnReason Create
     *
     * @return View
     */
    public function create()
    {
        return view('admin.returnreason.admin_add_return_reason');
    }


    /**
     * List Return index
     *
     * @return View
     */

    public function index()
    {
        return view('admin.returnreason.admin_table_return_reason', ['returnreason' => $this->service->getAll()]);
    }


    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.returnreason.admin_edit_return_reason', ['returnreason' => $this->service->getById($id)]);
    }

    /**
     *
     * @param ProductReturnReasonRequest $request
     */
    public function store(ProductReturnReasonRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.returnreason.index');

    }

    /**
     * Update return Data
     *
     * @param ProductReturnReasonRequest $request
     * @param $id
     * @return mixed
     */
    public function update(ProductReturnReasonRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
         Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.returnreason.index');
    }

    /**
     *Delete Return Reason Data
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->productReturnService->hasChild('product_return_reason_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }
}
