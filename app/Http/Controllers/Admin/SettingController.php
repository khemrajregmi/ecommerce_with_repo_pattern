<?php

namespace Kerung\Http\Controllers\Admin;



use Kerung\Http\Requests;
use Kerung\Http\Controllers\Controller;
use KerungRepo\Services\CurrencyService;
use KerungRepo\Services\SettingService;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Requests\Admin\SettingRequest;
use Illuminate\Support\Facades\Redirect;

/**
 * Class SettingController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class SettingController extends Controller
{
    /**
     * Setting service
     *
     * @var SettingService
     */
    protected $service;

    /**
     * @var currencyService
     */
    protected $currencyService;

    public function __construct(SettingService $service)
    {
        $this->service = $service;
    }


    /**
     * Index View of Setting
     *
     * @return mixed
     */
    public function index()
    {

        return view('admin.setting.admin_table_setting', ['settings' => $this->service->getSettingByCodeAndKey('config','config_name')]);
    }

    /**
     * Edit Form Data
     *
     * @param $code
     * @return mixed
     */
    public function edit($code)
    {
        return view('admin.setting.admin_edit_setting', ['setting' => $this->service->getSettingByCode($code)]);
    }


    /**
     * Update Setting Data
     *
     * @param SettingRequest $request
     * @param $code
     * @return mixed
     */
    public function update(SettingRequest $request, $code)
    {
        $data = $request->all();
        // dd($data);
        $this->service->updateSettingByCode($code, $data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.setting.index');
    }
    

}
