<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/16/16
 * Time: 10:49 AM
 */
namespace Kerung\Http\Controllers\Home;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Kerung\Http\Requests;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Home\ReviewRequest;
use Jleon\LaravelPnotify\Notify;
use KerungRepo\Services\ReviewService;
/**
 * Class ReviewController
 *
 * @package Kerung\Http\Controllers\Home
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class ReviewController extends Controller
{
    /**
     * 
     * Service Object
     *
     * @var object $service
     */
    protected $service;

    /**
     * Review constructor.
     *
     * @param ReviewService $service
     */
    public function __construct(ReviewService $service)
    {
        $this->service = $service;
    }

    /**
     * Store Review
     *
     * @param ReviewRequest $request
     */

     public function store(ReviewRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Your Review Added Successfully.....');
        return Redirect::route('single.product',$request->slug);

    }
}
