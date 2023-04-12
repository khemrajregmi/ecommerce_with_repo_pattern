<?php


/**
 * Created by sublime.
 * User: khem
 * Date: 9/05/16
 * Time: 12:00 PM
 */

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\ProductReturnStatusRequest;
use KerungRepo\Services\ProductReturnStatusService;
use KerungRepo\Services\ProductReturnService;

/**
 * Class ProductReturnController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regimi <khemrr067@gmail.com>
 */

class ProductReturnStatusController extends Controller
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
     * @var object $returnService
     */
    protected $returnService;

    /**
     * Return constructor.
     * @param ProductReturnStatusService $service
     * @param ProductReturnService $returnService
     *
     */
    public function __construct(ProductReturnStatusService $service,
                                ProductReturnService $returnService)
    {
        $this->service = $service;
        $this->returnService = $returnService;
    }


    /**
     * Add ReturnStatus Create
     *
     * @return View
     */
    public function create()
    {
        return view('admin.returnstatus.admin_add_return_status');
    }


    /**
     * List Return index
     *
     * @return View
     */

    public function index()
    {
        return view('admin.returnstatus.admin_table_return_status', ['returnstatus' => $this->service->getAll()]);
    }


    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.returnstatus.admin_edit_return_status', ['returnstatus' => $this->service->getById($id)]);
    }

    /**
     *
     * @param ProductReturnStatusRequest $request
     */
    public function store(ProductReturnStatusRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.returnstatus.index');

    }

    /**
     * Update return Data
     *
     * @param ProductReturnStatusRequest $request
     * @param $id
     * @return mixed
     */
    public function update(ProductReturnStatusRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
         Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.returnstatus.index');
    }

    /**
     *Delete return Data
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->returnService->hasChild('product_return_status_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }
}
