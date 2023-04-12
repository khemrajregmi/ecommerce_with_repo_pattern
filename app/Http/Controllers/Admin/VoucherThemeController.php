<?php


/**
 * Created by sublime.
 * User: khem
 * Date: 9/01/16
 * Time: 10:49 AM
 */


namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\VoucherThemeRequest;
use KerungRepo\Services\VoucherService;
use KerungRepo\Services\VoucherThemeService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;

/**
 * Class VoucherThemeController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class VoucherThemeController extends Controller
{
    
    /**
     * VoucherTheme service
     *
     * @var VoucherThemeService
     */
    protected $service;

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
     *  Voucher  Object
     *
     * @var $voucherService
     */
    protected $voucherService;


    /**
     * VoucherTheme constructor.
     * @param VoucherThemeService $agService
     * @param StoreService $storeService
     * @param UserService $userService
     */
    public function __construct(VoucherThemeService $service,
                                StoreService $storeService,
                                UserService $userService,
                                VoucherService $voucherService)
    {
        $this->service = $service;
        $this->storeService = $storeService;
        $this->userService = $userService;
        $this->voucherService = $voucherService;
    }


     /**
     * Get All Data Related To Voucher Theme
     *
     * @return array
     */
    public function getVoucherThemeRelatedModelData()
    {
        $user = $this->userService->getUser();
        return $data = 
        array(
            'userVoucherstheme' => $this->service->getStoreWithVoucherThemeAccToUser($user),
            'voucherthemes' => $this->service->getAll(),
            'stores' => $this->storeService->getStoreAccToUser($user)
        );
    }


    /**
     * Index View of Voucher Theme
     *
     * @return mixed
     */
    public function index()
    {

        return view('admin.vouchertheme.admin_table_vouchertheme')
               ->with($this->getVoucherThemeRelatedModelData());
    }

    /**
     * Create Voucher Theme
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.vouchertheme.admin_add_vouchertheme')
                ->with($this->getVoucherThemeRelatedModelData());
    }

    /**
     * Store the Voucher Theme Data
     *
     * @param VoucherThemeRequest $request
     * @return mixed
     */
    public function store(VoucherThemeRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.vouchertheme.index');
    }

    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.vouchertheme.admin_edit_vouchertheme', 
            ['vouchertheme' => $this->service->getById($id)])
            ->with($this->getVoucherThemeRelatedModelData());
    }


    /**
     * Update VoucherTheme Data
     *
     * @param VoucherThemeRequest $request
     * @param $id
     * @return mixed
     */
    public function update(VoucherThemeRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id, $data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.vouchertheme.index');
    }

    /**
     *Delete Form Data
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->voucherService->hasChild('voucher_theme_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }

}
