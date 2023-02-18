<?php

namespace App\Repositories;

use App\Interfaces\AdvertisementRepositoryInterface;
use App\Models\Advertisement;
use App\Traits\SaveImageTrait;

class AdvertisementRepository implements AdvertisementRepositoryInterface
{
    use SaveImageTrait;

    public function getAllAds()
    {
        return Advertisement::orderBy('id', 'DESC')->get();
    } 

    public function getAdsByUserId()
    {
        return Advertisement::where('user_id', auth()->user()->id)->get();
    }

    public function getAdsPaginator($number)
    {
        return Advertisement::orderBy('id', 'DESC')->paginate($number);
    }

    public function createAds(array $adsDetails)
    {
        $adsDetails['user_id'] = auth()->user()->id;
        $adsDetails['image'] =  $this->uploadImage($adsDetails['image'], 'ads');

        Advertisement::create($adsDetails);
        return 'success';
    }

    public function updateAds(array $adsDetails, $adsId)
    {
        $ads = Advertisement::find($adsId);
        $ads->update($adsDetails);
        return 'success';
    }

    public function deleteAds($adsId)
    {
        Advertisement::destroy($adsId);
    }
}
