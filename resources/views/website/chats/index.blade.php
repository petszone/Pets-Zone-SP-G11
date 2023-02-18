@extends('website.layout')
@section('title') استشر بيطري | Pets Zone @endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-20">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="/">الرئيسية</a></li>
                    <li class="active"><a href="#">استشر بيطري</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <div class="container">
        <div class="row mb-5">
            @foreach ($employees as $item)
                <div class="col-md-3 mt-3">
                    <div class="single-product" style="border: 1px solid #ddd;">
                        <div class="pro-img">
                            <a href="{{route('chats.show', ['doctorid' => $item->id])}}">
                                <img class="primary-img" src="{{ asset('admin/media/users/blank.png')}}" alt="single-product">
                            </a>
                        </div>
                        <div class="pro-content">
                            <h4><a href="{{route('chats.show', ['doctorid' => $item->id])}}">{{$item->firstname . ' ' . $item->lastname}}</a></h4>
                            <p><span class="price">طبيب عام @if($item->connection_status == 1) (متصل 🟢) @endif </span></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection


@section('js')

@endsection