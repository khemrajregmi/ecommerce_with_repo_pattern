<?php

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use Analytics;
use Spatie\Analytics\Period;
use Kerung\Http\Requests;
use Kerung\Http\Controllers\Controller;

/**
 * Class DashboardController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khjemrr067@gmail.com>
 */
class DashboardController extends Controller
{


    /**
     * Dashboard Index
     *
     * @return View
     */
    public function index()
    {
        // $analyticsStats=$this->fetchGoogleAnalytics();
        return view('admin.dashboard');
        // ->with(array('pageViews'=>$analyticsStats['pageViews'],
        //                                     'addToCart'=>$analyticsStats['addToCart'],
        //                                     'soldItem'=>$analyticsStats['soldItem'],
        //                                     'totalUser'=>$analyticsStats['totalUser'],
        //                                     'productListClicks'=>$analyticsStats['productListClicks'],
        //                                     'productListViews'=>$analyticsStats['productListViews'],
        //                                     'totalShare'=>$analyticsStats['totalShare'],
        //                                     'totalVisitor'=>$analyticsStats['totalVisitor'])
        //                                 );
    }

    public function fetchGoogleAnalytics(){
        //dimensions=ga:source,ga:medium
        //metrics=ga:sessions,ga:transactionRevenue,ga:transactions,ga:uniquePurchases
        //sort=-ga:sessions
//        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
//        $analytics = Analytics::getAnalyticsService();

        $data=array();

        $analyticsData = Analytics::performQuery(Period::days(7),"ga:sessions,ga:pageviews,ga:itemQuantity,ga:productAddsToCart,ga:productListClicks,ga:productListViews",array("dimensions"=>"ga:source"));

//        dd($analyticsData->totalsForAllResults);
        $responseData=$analyticsData->totalsForAllResults;
        $data['pageViews']= $responseData['ga:pageviews'];
        $data['addToCart']=$responseData['ga:productAddsToCart'];
            $data['soldItem']=$responseData['ga:itemQuantity'];
            $data['productListClicks']=$responseData['ga:productListClicks'];
            $data['productListViews']=$responseData['ga:productListViews'];
            $data['totalUser']=3;//got to fetch from user table
            $data['totalShare']=365; //got to fetch link share from social media
            $data['totalVisitor']=$responseData['ga:sessions'];
        return $data;
    }

}
