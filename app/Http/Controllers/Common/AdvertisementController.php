<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ads\CreateAdsRequest;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    private AdvertisementRepositoryInterface $AdsRepository;

    public function __construct(AdvertisementRepositoryInterface $AdsRepository)
    {
        $this->AdsRepository = $AdsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('ads_type') ){
            $ads = Advertisement::where('ads_type', $request->ads_type)->orderBy('id', 'DESC')->paginate(5);
        }else{
            $ads = $this->AdsRepository->getAdsPaginator(5);
        }
        return view('website.ads.index', compact('ads'));
    }
}
