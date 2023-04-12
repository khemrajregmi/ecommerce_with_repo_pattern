<?php

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\OrderStatusRequest;
use KerungRepo\Services\OrderStatusService;
use KerungRepo\Services\OrderService;

/**
 * Class OrderStatusController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class OrderStatusController extends Controller
{
    /**
     * Service Object
     *
     * @var object $service
     */
    protected $service;

    /**
     * OrderService Object
     *
     * @var object $orderService
     */
    protected $orderService;

    /**

     * OrderStatus constructor.
     * @param OrderStatusService $service
     */
    public function __construct(OrderStatusService $service,
                                OrderService $orderService)
    {
        $this->service = $service;
        $this->orderService = $orderService;
    }


    /**
     * Add OrderStatus Create
     * 
     *@return View
     */
    public function create(){
        return view('admin.orderstatus.admin_add_orderstatus');
    }




  
    /**
     * List OrderStatus index
     *
     * @return View
     */

    public function index()
    {   
        return view('admin.orderstatus.admin_table_orderstatus', ['orderstatus' => $this->service->getAll()]);
        // return view('admin.orderstatus.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.orderstatus.admin_edit_orderstatus',
            ['orderstatus' => $this->service->getById($id)]);
    }

    /**
     *
     * @param OrderStatusRequest $request
     */
    public function store(OrderStatusRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
       return Redirect::route('admin.orderstatus.index');
    }

    /**
     * Update OrderStatus Data
     *
     * @param OrderStatusRequest $request
     * @param $id
     * @return mixed
     */
    public function update(OrderStatusRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.orderstatus.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->orderService->hasChild('order_status_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }
}
