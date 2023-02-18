@extends('website.layout')
@section('title') دردشة مع طبيب | Pets Zone @endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-20">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="/">الرئيسية</a></li>
                    <li class="active"><a href="#">تحدث مع طبيب</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <div class="container">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @auth
                <section class="avenue-messenger">
                    <div class="menu">
                        <div class="items"><span>
                                <a href="#" title="Minimize">—</a><br>
                                <a href="#" title="End Chat">✕</a>
                            </span>
                        </div>
                        {{-- <div class="button">...</div> --}}
                    </div>
                    <div class="agent-face">
                        <div class="half">
                            <img class="agent circle" src="{{ asset('admin/media/users/blank.png')}}" alt="Jesse Tino">
                        </div>
                    </div>
                    <div class="chat">
                        <div class="chat-title">
                            <h1>{{$employee->firstname . ' ' . $employee->lastname}}  @if($employee->connection_status == 1) (متصل 🟢) @endif </h1>
                            {{-- <h2>طبيب عام</h2> --}}
                        </div>
                        <div class="messages">
                            <div class="messages-content mCustomScrollbar _mCS_1 mCS_no_scrollbar" style="overflow: auto;">
                                <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0" style="max-height: none;">
                                    <div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
                                        <div class="message new">
                                            <figure class="avatar"><img src="{{ asset('admin/media/users/blank.png')}}"></figure>
                                            أهلا بك، كيف يمكنني مساعدتك؟ 
                                            {{-- <div class="timestamp">7:26</div> --}}
                                            <div class="checkmark-sent-delivered">✓</div>
                                            <div class="checkmark-read">✓</div>
                                        </div>
                                    @foreach ($chats as $chat)
                                        @if($chat->sender == 'employee')
                                            {{-- <div id="mCSB_1_container" class="mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;margin-bottom: 0;" dir="ltr"> --}}
                                                <div class="message new">
                                                    <figure class="avatar"><img src="{{ asset('admin/media/users/blank.png')}}"></figure>
                                                    {{$chat->message}}
                                                    {{-- <div class="timestamp">{{$chat->created_at}}</div> --}}
                                                    {{-- <div class="checkmark-sent-delivered">✓</div>
                                                    <div class="checkmark-read">✓</div> --}}
                                                </div>
                                            {{-- </div> --}}
                                        @else
                                            <div class="message message-personal new" style="margin-right: 10px;margin-top: 0;">
                                                {{$chat->message}}
                                                {{-- <div class="timestamp">{{$chat->created_at}}</div> --}}
                                                {{-- <div class="checkmark-sent-delivered">✓</div>
                                                <div class="checkmark-read">✓</div> --}}
                                            </div>
                                        @endif 
                                    @endforeach

                                </div> 

                                    <div id="mCSB_1_scrollbar_vertical"
                                        class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical"
                                        style="display: none;">
                                        <div class="mCSB_draggerContainer">
                                            <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                                style="position: absolute; min-height: 30px; top: 0px; height: 0px;"
                                                oncontextmenu="return false;">
                                                <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                                            </div>
                                            <div class="mCSB_draggerRail"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="message-box">
                            <textarea type="text" class="message-input" placeholder="اكتب رسالة.." id="input-msg"></textarea>
                            <button type="submit" class="message-submit">أرسل</button>
                        </div>
                    </div>
                </section>
            @endauth
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>

@endsection


@section('js')
    {{-- سكربت بيجيب اللي قاعد ببعتوا الدكتور --}}
    <script type="text/javascript"> 
        $( window ).load(function(){
            ajax_function();
            setInterval( function(){
                ajax_function();
            }, 5000);  
        });

        function ajax_function(){
            $.ajax({
                type: "POST",
                url: "{{route('chats.home')}}",
                data:{
                    _token:"{{ csrf_token() }}",
                } ,
                success: function(html)
                {
                    $.each(html.data, function(key, value){
                        // $('.message-input').append(value.message)
                        $('<div class="message new"><figure class="avatar"><img src="{{ asset('admin/media/users/blank.png')}}" /></figure>' + value.message + '</div>').appendTo($('.mCSB_container')).addClass('new');
                    })
                }
            }); 
        }
    </script>
    {{-- سكربت بيجيب اللي قاعد ببعتوا الدكتور --}}

    
    {{-- سكربت بيخزن الللي ببعتوا المستخدم --}}
    <script>
        $('.message-submit').click( function(){
            let message = $('#input-msg').val();
            // alert(message)
            $.ajax({
                type: "POST",
                url: "{{route('chats.store')}}",
                data:{
                    message:message,
                    employee_id:"{{$employee->id}}",
                    _token:"{{ csrf_token() }}",
                } ,
                success: function(html)
                {
                    $('.message-input').val(null);
                }
            }); 
        })
    </script>
    {{-- سكربت بيخزن الللي ببعتوا المستخدم --}}

@endsection