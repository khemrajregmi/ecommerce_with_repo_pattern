<?php

/**
 * Created by sublime.
 * User: khem
 * Date: 9/01/16
 * Time: 2:49 PM
 */

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\VoucherRequest;
use KerungRepo\Services\VoucherService;
use KerungRepo\Services\VoucherThemeService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;

/**
 * Class VoucherController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class VoucherController extends Controller
{
    /**
     * 
     * Voucher Object
     *
     * @var object $service
     */
    protected $service;


    /**
     * 
     * VoucherTheme Object
     *
     * @var object $service
     */
    protected $btService;


    /**
     *  Stote  Object
     *
     * @var object $storeService
     */
    protected $storeService;

    /**
     *  user  Object
     *
     * @var $userService
     */
    protected $userService;

    /**
     * Voucher constructor.
     * @param VoucherService $service
     * @param VoucherThemeService $agService
     * @param StoreService $storeService
     * @param UserService $userService
     */
    public function __construct(VoucherService $service,
                                VoucherThemeService $btService,
                                StoreService $storeService,
                                UserService $userService)
    {
        $this->service = $service;
        $this->btService = $btService;
        $this->storeService = $storeService;
        $this->userService = $userService;
    }


    /**
     * Get All Data Related To Voucher
     *
     * @return array
     */
    public function getVoucherRelatedModelData()
    {
        $user = $this->userService->getUser();
        return $data = 
        array(
            'userVouchers' => $this->service->getStoreWithVoucherAccToUser($user),
            'vouchers' => $this->service->getAll(),
            'stores' => $this->storeService->getStoreAccToUser($user),
            'vouchertheme' => $this->btService->getAll()
        );
    }


    /**
     * Index View of Voucher
     *
     * @return mixed
     */
    public function index()
    {

        return view('admin.voucher.admin_table_voucher')->with($this->getVoucherRelatedModelData());
    }

    /**
     * Create Voucher
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.voucher.admin_add_voucher')->with($this->getVoucherRelatedModelData());
    }

    /**
     * Store the Voucher Data
     *
     * @param VoucherRequest $request
     * @return mixed
     */
    public function store(VoucherRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.voucher.index');
    }

    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.voucher.admin_edit_voucher', ['voucher' => $this->service->getById($id)])->with($this->getVoucherRelatedModelData());
    }


    /**
     * Update Voucher Data
     *
     * @param VoucherRequest $request
     * @param $id
     * @return mixed
     */
    public function update(VoucherRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id, $data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.voucher.index');
    }

    /**
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return 'deleted';
    }

}
