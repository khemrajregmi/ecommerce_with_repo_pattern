<?php
/**
 * Created by sublime.
 * User: khem
 * Date: 12/12/16
 * Time: 11:49 AM
 */

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\DurationRequest;
use KerungRepo\Services\DurationService;
use KerungRepo\Services\CustomerService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;


/**
 * Class DurationController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regimi <khemrr067@gmail.com>
 */
class DurationController extends Controller
{
    /**
     * Service Object
     * Service Object
     *
     * @var object $service
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
     * Duration constructor.
     * @param DurationService $service
     * @param StoreService $storeService
     * @param UserService $userService
     */
    public function __construct(DurationService $service,
                                StoreService $storeService,
                                UserService $userService)
    {
        $this->service = $service;
        $this->storeService = $storeService;
        $this->userService = $userService;
    }

    /**
     * Get All Data Related To Duration
     *
     * @return array
     */
    public function getDurationRelatedModelData()
    {   

        $user = $this->userService->getUser();
        return $data = array(
            'userDurations' => $this->service->getStoreWithDurationAccToUser($user),
            'stores' => $this->storeService->getStoreAccToUser($user)
        );
    }


    /**
     * Duration Create
     * 
     *@return View
     */
    public function create()
    {
        return view('admin.duration.admin_add_duration')
        ->with($this->getDurationRelatedModelData());
    }




  
    /**
     * List Duration index
     *
     * @return View
     */

    public function index()
    {  
        return view('admin.duration.admin_table_duration')
        ->with($this->getDurationRelatedModelData());
    }


    /**

     * 
     * @param  $id
     *
     * @param Request $request
     */

    public function edit($id)
    {
        return view('admin.duration.admin_edit_duration',
            ['duration' => $this->service->getById($id)])
            ->with($this->getDurationRelatedModelData());

    }

    /**
     *
     * @param DurationRequest $request
     */
    public function store(DurationRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
       return Redirect::route('admin.duration.index');
    }

    /**
     * Update Duration Data
     *
     * @param DurationRequest $request
     * @param $id
     * @return mixed
     */
    public function update(DurationRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.duration.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
            $this->service->destroy($id);
            return 'deleted';
    }
}
