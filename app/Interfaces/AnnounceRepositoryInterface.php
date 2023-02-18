<?php

namespace App\Interfaces;

interface AnnounceRepositoryInterface
{
    public function getAllAnnounce();
    public function createAnnounce(array $AnnounceDetails);
    public function updateAnnounce(array $AnnounceDetails, $AnnounceId);
    public function deleteAnnounce($AnnounceId);
}
