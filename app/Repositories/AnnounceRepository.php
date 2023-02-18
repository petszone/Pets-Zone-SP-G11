<?php

namespace App\Repositories;

use App\Interfaces\AnnounceRepositoryInterface;
use App\Models\Advertisement;
use App\Models\Announcement;
use App\Traits\SaveImageTrait;

class AnnounceRepository implements AnnounceRepositoryInterface
{
    use SaveImageTrait;

    public function getAllAnnounce()
    {
        return Announcement::orderBy('id', 'DESC')->paginate(10);
    } 

    public function createAnnounce(array $AnnounceDetails)
    {
        $AnnounceDetails['image'] =  $this->uploadImage($AnnounceDetails['image'], 'Announce');

        Announcement::create($AnnounceDetails);
        return 'success';
    }
 
    public function updateAnnounce(array $AnnounceDetails, $AnnounceId)
    {
        $Announce = Announcement::find($AnnounceId);
        $Announce->update($AnnounceDetails);
        return 'success';
    }

    public function deleteAnnounce($AnnounceId)
    {
        Announcement::destroy($AnnounceId);
    }
}
