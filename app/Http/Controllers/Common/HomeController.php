<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAppointmentRequest;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Appointment;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    
    public function index()
    {
        $data['products'] = $this->productRepository->getAllProducts()->take(7);
        if(auth()->check()){
            $data['chats'] = Chat::where('user_id', auth()->user()->id)->get();
        }
        return view('website.home', $data);

    }

    public function about()
    {
        return view('website.about');
    }

    public function appointmentForm()
    {
        return view('website.appointment_form');
    }

    public function storeAppointment(CreateAppointmentRequest $request)
    {
        $appointment = Appointment::where('appointdate', $request->appointdate)
                                    ->where('appointtime', $request->appointtime)
                                    ->where('status', '!=', 1)->first();
        if($appointment){
            return back()->with('error', 'نأسف، هذا الموعد محجوز مسبقا،يمكنك الحجز في موعد آخر');
        }
        $data = $request->validated();
        if(Auth::check()){
            $data['user_id'] = auth()->user()->id;
        }
        Appointment::create($data);
        return redirect()->route('home.index')->with([
            'msg_status' => 'success',
            'msg_title' => 'تم الإرسال',
            'msg_content' => 'تم إرسال طلب الحجز بنجاح',
        ]);
    }

    public function Instructions()
    {
        return view('website.instructions');
    }
}
