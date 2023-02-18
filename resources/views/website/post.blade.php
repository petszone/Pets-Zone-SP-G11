@extends('website.layout')
@section('title') من نحن |Pets Zone @endsection
@section('content')
<style>

* {
    box-sizing: border-box;
}
body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    line-height: 1.4;
    color: rgba(0, 0, 0, 0.85);
    background-color: #f9f9f9;

}
button {
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
    font-size: 14px;
    padding: 4px 8px;
    color: rgba(0, 0, 0, 0.85);
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 4px;
}
button:hover,
button:focus,
button:active {
    cursor: pointer;
    background-color: #ecf0f1;
}
.comment-thread {
    width: 700px;
    max-width: 100%;
    margin: auto;
    padding: 0 30px;
    background-color: #fff;
    border: 1px solid transparent; /* Removes margin collapse */
}
.m-0 {
    margin: 0;
}
.sr-only {
    position: absolute;
    right: -10000px;
    top: auto;
    width: 1px;
    height: 1px;
    overflow: hidden;
}

/* Comment */

.comment {
    position: relative;
    margin: 20px auto;
}
.comment-heading {
    display: flex;
    align-items: center;
    height: 50px;
    font-size: 14px;
}
.comment-voting {
    width: 20px;
    height: 32px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 4px;
}
.comment-voting button {
    display: block;
    width: 100%;
    height: 50%;
    padding: 0;
    border: 0;
    font-size: 10px;
}
.comment-info {
    color: rgba(0, 0, 0, 0.5);
    margin-right: 10px;
}
.comment-author {
    color: rgba(0, 0, 0, 0.85);
    font-weight: bold;
    text-decoration: none;
}
.comment-author:hover {
    text-decoration: underline;
}
.replies {
    margin-right: 20px;
}

/* Adjustments for the comment border links */

.comment-border-link {
    display: block;
    position: absolute;
    top: 50px;
    right: 0;
    width: 12px;
    height: calc(100% - 50px);
    border-right: 4px solid transparent;
    border-left: 4px solid transparent;
    background-color: rgba(0, 0, 0, 0.1);
    background-clip: padding-box;
}
.comment-border-link:hover {
    background-color: rgba(0, 0, 0, 0.3);
}
.comment-body {
    padding: 0 20px;
    padding-right: 28px;
}
.replies {
    margin-right: 28px;
}

/* Adjustments for toggleable comments */

details.comment summary {
    position: relative;
    list-style: none;
    cursor: pointer;
}
details.comment summary::-webkit-details-marker {
    display: none;
}
details.comment:not([open]) .comment-heading {
    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
}
.comment-heading::after {
    display: inline-block;
    position: absolute;
    left: 5px;
    align-self: center;
    font-size: 12px;
    color: rgba(0, 0, 0, 0.55);
}
/* details.comment[open] .comment-heading::after {
    content: "Click to hide";
}
details.comment:not([open]) .comment-heading::after {
    content: "Click to show";
} */

/* Adjustment for Internet Explorer */

@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
    /* Resets cursor, and removes prompt text on Internet Explorer */
    .comment-heading {
        cursor: default;
    }
    details.comment[open] .comment-heading::after,
    details.comment:not([open]) .comment-heading::after {
        content: " ";
    }
}

/* Styling the reply to comment form */

.reply-form textarea {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 16px;
    width: 100%;
    max-width: 100%;
    margin-top: 15px;
    margin-bottom: 5px;
}
.d-none {
    display: none;
}
</style>
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-20">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="/">الرئيسية</a></li>
                    <li class="active"><a href="#">من نحن</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->

    <div class="container">
        <form method="POST" class="reply-form" id="post-reply-form" action="{{route('posts.storepost')}}">
            @csrf
            <textarea placeholder="أكتب سؤالك هنا" name="content" rows="4"></textarea>
            <button type="submit">إرسال</button>
            <button type="button" data-toggle="reply-form" data-target="post-reply-form">إالغاء</button>
        </form>
    </div>

    <div class="container">
        @foreach ($posts as $item)
            <details open class="comment" id="comment-1">
                <summary>
                    <div class="comment-heading">
                        <div class="comment-voting">
                            <button type="button">
                                <span aria-hidden="true">&#9650;</span>
                                <span class="sr-only">Vote up</span>
                            </button>
                            <button type="button">
                                <span aria-hidden="true">&#9660;</span>
                                <span class="sr-only">Vote down</span>
                            </button>
                        </div>
                        <div class="comment-info">
                            <a href="#" class="comment-author">{{$item->user->name}}</a>
                            <p class="m-0">
                                {{$item->created_at}}
                            </p>
                        </div>
                    </div>
                </summary>
        
                <div class="comment-body">
                    <p>
                        {{$item->content}}
                    </p>
                    <button type="button" data-toggle="reply-form" data-target="comment-{{$item->id}}-reply-form">رد</button>
                    {{-- <button type="button">Flag</button> --}}
        
                    <!-- Reply form start -->
                    <form method="POST" class="reply-form d-none" id="comment-{{$item->id}}-reply-form" action="{{route('posts.storecomment')}}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$item->id}}" id="">
                        <textarea placeholder="Reply to comment" name="content" rows="4"></textarea>
                        <button type="submit">إرسال</button>
                        <button type="button" data-toggle="reply-form" data-target="comment-{{$item->id}}-reply-form">إالغاء</button>
                    </form>
                    <!-- Reply form end -->
                </div>
        
                <div class="replies">
                    @foreach ($item->comment as $itemaa)
                        <details open class="comment" id="comment-2">
                            <summary>
                                <div class="comment-heading">
                                    <div class="comment-voting">
                                        <button type="button">
                                            <span aria-hidden="true">&#9650;</span>
                                            <span class="sr-only">Vote up</span>
                                        </button>
                                        <button type="button">
                                            <span aria-hidden="true">&#9660;</span>
                                            <span class="sr-only">Vote down</span>
                                        </button>
                                    </div>
                                    <div class="comment-info">
                                        <a href="#" class="comment-author">{{$itemaa->user->name}}</a>
                                        <p class="m-0">
                                            {{$itemaa->created_at}}
                                        </p>
                                    </div>
                                </div>
                            </summary>
            
                            <div class="comment-body">
                                <p>
                                    {{$itemaa->content}}
                                </p>
                                {{-- <button type="button" data-toggle="reply-form" data-target="comment-2-reply-form">Reply</button> --}}
                                {{-- <button type="button">Flag</button> --}}
            
                                <!-- Reply form start -->
                                <form method="POST" class="reply-form d-none" id="comment-2-reply-form" action="{{route('posts.storecomment')}}">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{$itemaa->post_id}}" id="">
                                    <textarea placeholder="Reply to comment" name="content" rows="4"></textarea>
                                    <button type="submit">إرسال</button>
                                    <button type="button" data-toggle="reply-form" data-target="comment-2-reply-form">إالغاء</button>
                                </form>
                                <!-- Reply form end -->
                            </div>
                        </details>
                    @endforeach
                </div>
            </details>
        @endforeach

    </div>
@endsection

@section('js')
    <script>
        document.addEventListener("click", function(event) {
                var target = event.target;
                var replyForm;
                if (target.matches("[data-toggle='reply-form']")) {
                    replyForm = document.getElementById(target.getAttribute("data-target"));
                    replyForm.classList.toggle("d-none");
                }
            },
            false
        );
    </script>
@endsection