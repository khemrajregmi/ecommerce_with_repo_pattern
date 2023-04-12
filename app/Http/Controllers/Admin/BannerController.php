<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/16/16
 * Time: 10:49 AM
 */

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\BannerRequest;
use KerungRepo\Services\BannerService;
use KerungRepo\Services\BannerImageService;


/**
 * Class BannerController
 * @package app\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class BannerController extends Controller
{
    /**
     * Banner Service
     *
     * @var object $service
     */
    private $service;

     /**
     * BannerImage Service 
     *
     * @var object $service
     */
    private $bimgService;

    /**
     * BannerController constructor.
     * @param BannerService $service
     */
    public function __construct(BannerService $service, BannerImageService $bannerimageservice)
    {
        $this->service = $service;
        $this->bimgService = $bannerimageservice;
    }

    public function create()
    {
        return view('admin.banner.admin_add_banner');
    }


    /**
     * Add Banner index
     *
     * @return View
     */

    public function index(){
        return view('admin.banner.admin_table_banner',['banner'=> $this->service->getAll()]);
       

    }

    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id){
        return view('admin.banner.admin_edit_banner',
                        ['banner'=>$this->service->getById($id)],
                        ['bannerimage'=>$this->service->getBannerImagesByBannerId($id)]
            );
        
    }

    /**
     * Update Banner Data
     *
     * @param BannerRequest $request
     * @param $id
     * @return mixed
     */
    public function update(BannerRequest $request, $id)
    {
        // dd($request->all());
        $this->service->update($id, $request->all());
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.banner.index');
    }

    /**
     * 
     * @param BannerRequest $request
     */
    public function store(BannerRequest $request) 
    {
        // dd($request->all());
        $this->service->store($request->all());
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.banner.index');
    }

     /**
     * Delete form Data
     * @param $id
     * @return mixed
     */
     public function destroy($id)
    {
        $this->service->destroy($id);
            return 'deleted';
    }
}
