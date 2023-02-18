<?php

namespace App\Interfaces;

interface AdvertisementRepositoryInterface
{
    public function getAllAds();
    public function getAdsByUserId();
    public function getAdsPaginator($number);
    public function createAds(array $adsDetails);
    public function updateAds(array $adsDetails, $adsId);
    public function deleteAds($adsId);
}
