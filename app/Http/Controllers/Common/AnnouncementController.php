<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAnnounceRequest;
use App\Interfaces\AnnounceRepositoryInterface;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    private AnnounceRepositoryInterface $AnnounceRepository;

    public function __construct(AnnounceRepositoryInterface $AnnounceRepository)
    {
        $this->AnnounceRepository = $AnnounceRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.announcement_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAnnounceRequest $request)
    {
        $data = $request->except('_token');
        $this->AnnounceRepository->createAnnounce($data);
        return redirect()->route('home.index')->with([
            'msg_status' => 'success',
            'msg_title' => 'تم الإرسال',
            'msg_content' => 'تم إرسال طلب البلاغ بنجاح',
        ]);
    }
}
