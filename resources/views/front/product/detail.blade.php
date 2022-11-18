@extends('master.front.master')

@section('css')

    <style>
        body{
            background-color: #f4f7f6;
            margin-top:20px;
        }
        .card {
            background: #fff;
            transition: .5s;
            border: 0;
            margin-bottom: 30px;
            border-radius: .55rem;
            position: relative;
            width: 100%;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
        }
        .chat-app .people-list {
            width: 280px;
            position: absolute;
            left: 0;
            top: 0;
            padding: 20px;
            z-index: 7
        }

        .chat-app .chat {
            /*margin-left: 280px;*/
            border-left: 1px solid #eaeaea
        }

        .people-list {
            -moz-transition: .5s;
            -o-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s
        }

        .people-list .chat-list li {
            padding: 10px 15px;
            list-style: none;
            border-radius: 3px
        }

        .people-list .chat-list li:hover {
            background: #efefef;
            cursor: pointer
        }

        .people-list .chat-list li.active {
            background: #efefef
        }

        .people-list .chat-list li .name {
            font-size: 15px
        }

        .people-list .chat-list img {
            width: 45px;
            border-radius: 50%
        }

        .people-list img {
            float: left;
            border-radius: 50%
        }

        .people-list .about {
            float: left;
            padding-left: 8px
        }

        .people-list .status {
            color: #999;
            font-size: 13px
        }

        .chat .chat-header {
            padding: 15px 20px;
            border-bottom: 2px solid #f4f7f6
        }

        .chat .chat-header img {
            float: left;
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-header .chat-about {
            float: left;
            padding-left: 10px
        }

        .chat .chat-history {
            padding: 20px;
            border-bottom: 2px solid #fff
        }

        .chat .chat-history ul {
            padding: 0
        }

        .chat .chat-history ul li {
            list-style: none;
            margin-bottom: 30px
        }

        .chat .chat-history ul li:last-child {
            margin-bottom: 0px
        }

        .chat .chat-history .message-data {
            margin-bottom: 15px
        }

        .chat .chat-history .message-data img {
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-history .message-data-time {
            color: #434651;
            padding-left: 6px
        }

        .chat .chat-history .message {
            color: #444;
            padding: 18px 20px;
            line-height: 26px;
            font-size: 16px;
            border-radius: 7px;
            display: inline-block;
            position: relative
        }

        .chat .chat-history .message:after {
            bottom: 100%;
            left: 7%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #fff;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .my-message {
            background: #efefef
        }

        .chat .chat-history .my-message:after {
            bottom: 100%;
            left: 30px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #efefef;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .other-message {
            background: #e8f1f3;
            text-align: right
        }

        .chat .chat-history .other-message:after {
            border-bottom-color: #e8f1f3;
            left: 93%
        }

        .chat .chat-message {
            padding: 20px
        }

        .online,
        .offline,
        .me {
            margin-right: 2px;
            font-size: 8px;
            vertical-align: middle
        }

        .online {
            color: #86c541
        }

        .offline {
            color: #e47297
        }

        .me {
            color: #1d8ecd
        }

        .float-right {
            float: right
        }

        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0
        }

        @media only screen and (max-width: 767px) {
            .chat-app .people-list {
                height: 465px;
                width: 100%;
                overflow-x: auto;
                background: #fff;
                left: -400px;
                display: none
            }
            .chat-app .people-list.open {
                left: 0
            }
            .chat-app .chat {
                margin: 0
            }
            .chat-app .chat .chat-header {
                border-radius: 0.55rem 0.55rem 0 0
            }
            .chat-app .chat-history {
                height: 300px;
                overflow-x: auto
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 992px) {
            .chat-app .chat-list {
                height: 650px;
                overflow-x: auto
            }
            .chat-app .chat-history {
                height: 600px;
                overflow-x: auto
            }
        }

        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
            .chat-app .chat-list {
                height: 480px;
                overflow-x: auto
            }
            .chat-app .chat-history {
                height: calc(100vh - 350px);
                overflow-x: auto
            }
        }
    </style>


@endsection


@section('title')
    Product Detail Page
@endsection

@section('body')
{{-- <h1>{{Session::get('customer_id')}}</h1> --}}
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{$product->name}}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('product-category', ['id' =>$product->category->id])}}">Shop</a></li>
                        <li>Single Product</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="xzoom-container">
                            <img class="xzoom" id="xzoom-default" src="{{asset($product->otherImages[0]->image)}}" xoriginal="{{asset($product->otherImages[0]->image)}}"/>
                            <div class="xzoom-thumbs">
                                @foreach($product->otherImages as $subImage)
                                    <a href="{{asset($subImage->image)}}">
                                        <img class="xzoom-gallery" width="80" src="{{asset($subImage->image)}}" title="The description goes here"></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{$product->name}}</h2>
                            <p class="category">
                                <i class="lni lni-tag"></i> Category Name:<a href="javascript:void(0)">{{$product->category->name}}</a>
                            </p>
                            <p class="category">
                                <i class="lni lni-tag"></i> Brand Name:<a href="javascript:void(0)">{{$product->brand->name}}</a>
                            </p>
                            @if($product->selling_price != null)
                            <h3 class="price">Tk {{$product->selling_price}}<span>Tk. {{$product->regular_price}}</span></h3>
                            @else
                            <h3 class="price">Exchange Priority Product: {{$product->exchangeable_with}}<span></h3>
                            <h3 class="price">Added Amount:  {{$product->exchange_price}}</span></h3>

                            @endif
                            <p class="info-text">
                                {{$product->short_description}}
                            </p>
                            <form action="{{route('add-to-cart', ['id' => $product->id])}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        {{-- <div class="form-group color-option">
                                            <label class="title-label" for="size">Choose color</label>
                                            <div class="single-checkbox checkbox-style-1">
                                                <input type="checkbox" id="checkbox-1" checked>
                                                <label for="checkbox-1"><span></span></label>
                                            </div>
                                            <div class="single-checkbox checkbox-style-2">
                                                <input type="checkbox" id="checkbox-2">
                                                <label for="checkbox-2"><span></span></label>
                                            </div>
                                            <div class="single-checkbox checkbox-style-3">
                                                <input type="checkbox" id="checkbox-3">
                                                <label for="checkbox-3"><span></span></label>
                                            </div>
                                            <div class="single-checkbox checkbox-style-4">
                                                <input type="checkbox" id="checkbox-4">
                                                <label for="checkbox-4"><span></span></label>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        {{-- <div class="form-group">
                                            <label for="color">Battery capacity</label>
                                            <select class="form-control" id="color">
                                                <option>5100 mAh</option>
                                                <option>6200 mAh</option>
                                                <option>8000 mAh</option>
                                            </select>
                                        </div> --}}
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group quantity">
                                            <label for="color">Quantity</label>
                                            <input type="number" class="form-control" value="1" name="qty" min="1"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-content">
                                    <div class="row align-items-end">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="button cart-button">
                                                <button type="submit" class="btn" style="width: 100%;">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="wish-button">
                                                <button class="btn"><i class="lni lni-reload"></i> Buy</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="wish-button">
                                                <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="lni lni-heart"></i> Contact</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>Details</h4>
                                {!! $product->long_description !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php($review = App\Models\Review::where('product_id', $product->id)->get())
                    @if($review->count() < 1)
                    <div class="col-lg-4 col-12">
                        <div class="single-block give-review">
                            No Review
                        </div>
                    </div>
                    @else
                    <div class="col-lg-4 col-12">
                        <div class="single-block give-review">
                            <h4>{{ round($review->avg('rating'), 2) }} (Overall)</h4>
                            <ul>
                                <li>
                                    <span>5 stars - {{ $review->where('rating', 5)->count() }}</span>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                </li>
                                <li>
                                    <span>4 stars - {{ $review->where('rating', 4)->count() }}</span>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star"></i>
                                </li>
                                <li>
                                    <span>3 stars - {{ $review->where('rating', 3)->count() }}</span>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                </li>
                                <li>
                                    <span>2 stars - {{ $review->where('rating', 2)->count() }}</span>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                </li>
                                <li>
                                    <span>1 star - {{ $review->where('rating', 1)->count() }}</span>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                </li>
                            </ul>

                            <button type="button" class="btn review-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Leave a Review
                            </button>
                        </div>
                    </div>
                    @endif
                    @if($review->count() < 1)
                    <div class="col-lg-8 col-12">
                        <div class="single-block">
                            <div class="reviews">
                                <h4 class="title">No Reviews</h4>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-8 col-12">
                        <div class="single-block">
                            <div class="reviews">
                                <h4 class="title">Latest Reviews</h4>

                                @foreach($review as $r)
                                <div class="single-review">
                                    <img src="{{asset('/')}}front/assets/images/blog/comment2.jpg" alt="#">
                                    <div class="review-info">
                                        <h4>{{ $r->subject }}
                                            <span>{{ $r->name }}</span>
                                        </h4>
                                        <ul class="stars">
                                            <?php 
                                            for($i = 0; $i < 5; $i++) {
                                                if ($i < $r->rating) {
                                                    echo '<li><i class="lni lni-star-filled"></i></li>';
                                                }
                                                else {
                                                    echo '<li><i class="lni lni-star"></i></li>';
                                                }
                                            }
                                        
                                            ?>
                                        </ul>
                                        <p>{{ $r->message}}</p>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leave a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="" method="POST" id="review_form">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-name">Your Name</label>
                                <input class="form-control" name="name" type="text" id="review-name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-email">Your Email</label>
                                <input class="form-control" name="email" type="email" id="review-email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-subject">Subject</label>
                                <input class="form-control" name="subject" type="text" id="review-subject" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-rating">Rating</label>
                                <select name="rating" class="form-control" id="review-rating">
                                    <option value="5">5 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="2">2 Stars</option>
                                    <option value="1">1 Star</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="review-message">Review</label>
                        <textarea class="form-control" name="message" id="review-message" rows="8" required></textarea>
                    </div>
                </form>

                </div>
                <div class="modal-footer button">
                    <button type="button" onclick="submit_review()" class="btn">Submit Review</button>
                </div>
            </div>
        </div>
        
    </div>
    


    {{-- @include('front.partial.chat_modal') --}}
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

                <div class="container">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card chat-app">
                                    <div class="chat">
                                    <div class="chat-header clearfix">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                                </a>
                                                <div class="chat-about">
                                                    <h6 class="m-b-0">Aiden Chavez</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-history">
                                        <ul class="m-b-0 text-append">
                                            
                                            
                                        </ul>
                                    </div>
                                    <div class="chat-message clearfix">
                                        <div class="input-group mb-0">
                                            <form id="chat_form" method="POST">
                                            <input type="text" name="message" class="form-control send-chat">

                                            <input type="hidden" name="u_id" id="u_id" value="{{ Session::has('customer_id')? Session::get('customer_id') : 0}}">
                                            <input type="hidden" name="user_id" value="{{ $product->user_id }}">
                                            {{-- <input type="text" name="message" class="form-control send-chat" placeholder="Enter text here..."> --}}
                                            </form>

                                            <div class="input-group-prepend">
                                                <button type="button"  
                                                 onclick="chat_ajax()" class="input-group-text"><i class="fa fa-send"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Back to Chatting</button>
            </div>
        </div>
    </div>
</div>



@endsection

@section('js')
    {{-- <script>
        function chat_ajax(id) {

            console.log($('.send-chat').val())
            let chat = $('.send-chat').val()
            let time = "{{ now() }}"
            console.log(id)

            $('.text-append').append('<li class="clearfix">' +
                                    '<div class="message-data text-right">' +
                                    '<span class="chat-time message-data-time">'+ time +
                                    '</span>' +
                                    '</div>' +
                                    '<div class="chat-text message other-message float-right">' + chat +
                                    '</div>' +
                                    '</li>')
            $('.send-chat').val('')

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }),

            $.post({
                url: '{{route('customer.chats.store')}}',
                // dataType: 'json',
                data: {
                    chat: chat
                    id: id
                },
                
                success: function (data) {
                    console.log('id');
                },
                
                
            }),


        }
                
    </script> --}}

    <script>
        function chat_ajassfsfx(id) {
            console.log($('.send-chat').val())
            let chat = $('.send-chat').val()
            let time = "{{ now() }}"
            console.log(id)
            $('.text-append').append('<li class="clearfix">' +
                                    '<div class="message-data text-right">' +
                                    '<span class="chat-time message-data-time">'+ time +
                                    '</span>' +
                                    '</div>' +
                                    '<div class="chat-text message other-message float-right">' + chat +
                                    '</div>' +
                                    '</li>')
            $('.send-chat').val('')

            console.log($('#address-form').serialize());
           

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('customer.chats.store')}}",
                type: 'POST',
                dataType: 'json',
                header: {
                    'X-CSRF-TOKEN': token
                        },
                data: {
                    _token: token,
                    _method: "PUT",
                },

                success: function() {
                    console.log('ok')
                    location.reload(true);
                },
                error: function(){
                    console.log('error')
                };
            });

            
        }
    </script>
    <script>
        function chat_ajax()
        {
            let customer_id = $("#u_id").val();
            console.log();
            if (customer_id == 0) {
                location.href = "{{route('customer.login')}}"
            }
            let chat = $('.send-chat').val()
            
            let time = "{{ now() }}"
            console.log($('#chat_form').serialize())
            $('.text-append').append('<li class="clearfix">' +
                                    '<div class="message-data text-right">' +
                                    '<span class="chat-time message-data-time">'+ time +
                                    '</span>' +
                                    '</div>' +
                                    '<div class="chat-text message other-message float-right">' + chat +
                                    '</div>' +
                                    '</li>')
            $('.send-chat').val('')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{route('customer.chats.store')}}",
                {
                    data: $('#chat_form').serialize(),
                    chat: chat
                },
                function(data, status, xhr) {
                    console.log(data);
                    console.log(status);
                    console.log(xhr);
                    if (data.status == 1) {
                        toaster("success", "Message Sent!");
                    } 
                    else if (data.status == 0) {
                        toaster("error", "Can't Send Message to yourself");
                        
                    }
                } 
            );
        }
    </script>
    <script>
        function submit_review()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{route('customer.review.store')}}",
                {
                    review: $('#review_form').serialize(),
                }, 
                function(data, status, xhr) {
                    if (data.status == 1) {
                        toaster("success", "Review Submitted");
                        $('#exampleModal').modal('hide')
                    }
                }
                
            );


        }
    </script>

@endsection
