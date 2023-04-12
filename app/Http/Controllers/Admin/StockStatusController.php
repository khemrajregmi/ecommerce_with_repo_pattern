<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 8/29/16
 * Time: 11:28 AM
 */

namespace Kerung\Http\Controllers\Admin;


use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\StockStatusRequest;
use KerungRepo\Services\StockStatusService;
use KerungRepo\Services\ProductService;

/**
 * Class StockStatusController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class StockStatusController extends Controller
{

    /**
     * StockStatus service
     *
     * @var object $service
     */
    protected $service;

    /**
     * Product service
     *
     * @var object $productService
     */
    protected $productService;

    public function __construct(StockStatusService $service,
                                ProductService $productService)
    {
        $this->service = $service;
        $this->productService = $productService;
    }


    /**
     * Index View of Stock Status
     *
     * @return mixed
     */
    public function index()
    {

        return view('admin.stockstatus.admin_table_stockstatus', ['stockStatus' => $this->service->getAll()]);
    }

    /**
     * Create Stock Status
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.stockstatus.admin_add_stockstatus');
    }

    /**
     * Store the Stock Status Data
     *
     * @param StockStatusRequest $request
     * @return mixed
     */
    public function store(StockStatusRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.stockstatus.index');
    }

    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.stockstatus.admin_edit_stockstatus', ['stockStatus' => $this->service->getById($id)]);
    }


    /**
     * Update StockStatus Data
     *
     * @param StockStatusRequest $request
     * @param $id
     * @return mixed
     */
    public function update(StockStatusRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id, $data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.stockstatus.index');
    }

    /**
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->productService->hasChild('stock_status_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }


}