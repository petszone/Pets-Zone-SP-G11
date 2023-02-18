<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ads\CreateAdsRequest;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Models\Advertisement;
use App\Models\City;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    private AdvertisementRepositoryInterface $AdsRepository;

    public function __construct(AdvertisementRepositoryInterface $AdsRepository)
    {
        $this->AdsRepository = $AdsRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get();
        return view('website.ads.ads_form', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdsRequest $request)
    {
        $data = $request->except('_token');
        $this->AdsRepository->createAds($data);
        return redirect()->route('account.index')->with([
            'msg_status' => 'success',
            'msg_title' => 'تم الإرسال',
            'msg_content' => 'تم إرسال طلب الإعلان بنجاح',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Advertisement::find($id)->delete();
        return response()->json('success');
    }
}
