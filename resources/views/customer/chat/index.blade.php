@extends('master.customer.master')

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Chat</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Skote</a></li>
                    <li class="breadcrumb-item active">Chat</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="d-lg-flex">
    <div class="chat-leftsidebar mr-lg-4">
        <div class="">
            <div class="py-4 border-bottom">
                <div class="media">
                    <div class="align-self-center mr-3">
                        <img src="assets/images/users/avatar-1.jpg" class="avatar-xs rounded-circle" alt="">
                    </div>
                    <div class="media-body">
                        <h5 class="font-size-15 mt-0 mb-1">{{Session::get('customer_name')}}</h5>
                        <p class="text-muted mb-0"><i class="mdi mdi-circle text-success align-middle mr-1"></i> Active</p>
                    </div>

                    <div>
                        <div class="dropdown chat-noti-dropdown active">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-bell bx-tada"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="chat-leftsidebar-nav">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item">
                        <a href="#chat" data-toggle="tab" aria-expanded="true" class="nav-link active">
                            <i class="bx bx-chat font-size-20 d-sm-none"></i>
                            <span class="d-none d-sm-block">Chat</span>
                        </a>
                    </li>
                    
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane show active" id="chat">
                        <div>
                            <h5 class="font-size-14 mb-3">Recent</h5>
                            <ul class="list-unstyled chat-list" data-simplebar style="max-height: 410px;">
                                @foreach($unique_chats as $unique_chat)
                                <li class="active" id="{{$unique_chat->profile->id}}" onclick="get_message(this)">
                                    <a href="#">
                                        <div class="media">
                                            <div class="align-self-center mr-3">
                                                <i class="mdi mdi-circle font-size-10"></i>
                                            </div>
                                            <div class="align-self-center mr-3">
                                                <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="">
                                            </div>
                                            
                                            <div class="media-body overflow-hidden">
                                                <h5 class="text-truncate font-size-14 mb-1">{{ $unique_chat->profile->name }}</h5>
                                                <p class="text-truncate mb-0">{{ $unique_chat->message }}</p>
                                            </div>
                                            <div class="font-size-11">05 min</div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach

                               
                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane" id="group">
                        <h5 class="font-size-14 mb-3">Group</h5>
                        <ul class="list-unstyled chat-list" data-simplebar style="max-height: 410px;">
                            <li>
                                <a href="#">
                                    <div class="media align-items-center">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                G
                                            </span>
                                        </div>
                                        
                                        <div class="media-body">
                                            <h5 class="font-size-14 mb-0">General</h5>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="media align-items-center">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                R
                                            </span>
                                        </div>
                                        
                                        <div class="media-body">
                                            <h5 class="font-size-14 mb-0">Reporting</h5>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="media align-items-center">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                M
                                            </span>
                                        </div>
                                        
                                        <div class="media-body">
                                            <h5 class="font-size-14 mb-0">Meeting</h5>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="media align-items-center">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                A
                                            </span>
                                        </div>
                                        
                                        <div class="media-body">
                                            <h5 class="font-size-14 mb-0">Project A</h5>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="media align-items-center">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                B
                                            </span>
                                        </div>
                                        
                                        <div class="media-body">
                                            <h5 class="font-size-14 mb-0">Project B</h5>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-pane" id="contact">
                        <h5 class="font-size-14 mb-3">Contact</h5>

                        <div  data-simplebar style="max-height: 410px;">
                            <div>
                                <div class="avatar-xs mb-3">
                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        A
                                    </span>
                                </div>

                                <ul class="list-unstyled chat-list">
                                    <li>
                                        <a href="#">
                                            <h5 class="font-size-14 mb-0">Adam Miller</h5>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <h5 class="font-size-14 mb-0">Alfonso Fisher</h5>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-4">
                                <div class="avatar-xs mb-3">
                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        B
                                    </span>
                                </div>

                                <ul class="list-unstyled chat-list">
                                    <li>
                                        <a href="#">
                                            <h5 class="font-size-14 mb-0">Bonnie Harney</h5>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-4">
                                <div class="avatar-xs mb-3">
                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        C
                                    </span>
                                </div>

                                <ul class="list-unstyled chat-list">
                                    <li>
                                        <a href="#">
                                            <h5 class="font-size-14 mb-0">Charles Brown</h5>
                                        </a>
                                        <a href="#">
                                            <h5 class="font-size-14 mb-0">Carmella Jones</h5>
                                        </a>
                                        <a href="#">
                                            <h5 class="font-size-14 mb-0">Carrie Williams</h5>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-4">
                                <div class="avatar-xs mb-3">
                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        D
                                    </span>
                                </div>

                                <ul class="list-unstyled chat-list">
                                    <li>
                                        <a href="#">
                                            <h5 class="font-size-14 mb-0">Dolores Minter</h5>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 user-chat">
        <div class="card">
            <div class="p-4 border-bottom ">
                <div class="row">
                    <div class="col-md-4 col-9">
                        <h5 class="font-size-15 mb-1">{{ $last_chats[0]->profile->name }}</h5>
                        <p class="text-muted mb-0"><i class="mdi mdi-circle text-success align-middle mr-1"></i> Active now</p>
                    </div>
                    <div class="col-md-8 col-3">
                        <ul class="list-inline user-chat-nav text-right mb-0">
                            <li class="list-inline-item d-none d-sm-inline-block">
                                <div class="dropdown">
                                    <button class="btn nav-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-search-alt-2"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-md">
                                        <form class="p-3">
                                            <div class="form-group m-0">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li class="list-inline-item  d-none d-sm-inline-block">
                                <div class="dropdown">
                                    <button class="btn nav-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-cog"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">View Profile</a>
                                        <a class="dropdown-item" href="#">Clear chat</a>
                                        <a class="dropdown-item" href="#">Muted</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item">
                                <div class="dropdown">
                                    <button class="btn nav-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else</a>
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>


            <div class="get-message">
                <div class="chat-conversation p-3">
                    <ul class="list-unstyled" data-simplebar style="max-height: 470px;" >
                        <li> 
                            <div class="chat-day-title">
                                <span class="title">Today</span>
                            </div>
                        </li>
                        <div id="append-chat">
                            @foreach ($last_chats as $last_chat)
                            <li class="{{$last_chat->receive_by_customer == Session::get('customer_id')? '' : 'right' }}">
                                <div class="conversation-list">
                                    <div class="dropdown">
    
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                          </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy</a>
                                            <a class="dropdown-item" href="#">Save</a>
                                            <a class="dropdown-item" href="#">Forward</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                    <div class="ctext-wrap">
                                        <div class="conversation-name">{{$last_chat->receive_by_customer == Session::get('customer_id')? Session::get('customer_name') : $last_chat->profile->name }}</div>
                                        <p>
                                            {{ $last_chat['message'] }}
                                        </p>
                                        <p class="chat-time mb-0"><i class="bx bx-time-five align-middle mr-1"></i> {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $last_chat['created_at'])->format("h:i a") }}</p>
                                    </div>
                                    
                                </div>
                            </li>
                            @endforeach  
                        </div>

    
                        
                    </ul>
                </div> 
                <div class="p-3 chat-input-section">
                    <form method="POST" id="chat_form">
                    <div class="row">
                        <div class="col">
                            <div class="position-relative">
                                <input type="hidden" name="user_id" value="{{ $last_chats[0]->customer_id }}">
                                <input type="text" id="message" name="message" class="send-chat form-control chat-input" placeholder="Enter Message...">
                                <div class="chat-input-links">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Emoji"><i class="mdi mdi-emoticon-happy-outline"></i></a></li>
                                        <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Images"><i class="mdi mdi-file-image-outline"></i></a></li>
                                        <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Add Files"><i class="mdi mdi-file-document-outline"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="button" onclick="send_chat()" class="btn btn-primary btn-rounded chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block mr-2">Send</span> <i class="mdi mdi-send"></i></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end row -->

@endsection

@section('js')
<script>
    function send_chat() {

        let message = $('#message').val();
        let chat = $('.send-chat').val()


        console.log(message);
        $('#append-chat').append(
            '<li class="right">'+
            '<div class="conversation-list">'+
                '<div class="dropdown">'+
                    ' <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                        '<i class="bx bx-dots-vertical-rounded"></i>'+
                    '</a>'+
                    '<div class="dropdown-menu">'+
                        '<a class="dropdown-item" href="#">Copy</a>'+
                        '<a class="dropdown-item" href="#">Save</a>'+
                        '<a class="dropdown-item" href="#">Forward</a>'+
                        '<a class="dropdown-item" href="#">Delete</a>'+
                    '</div>'+
                '</div>'+
                '<div class="ctext-wrap">'+
                    '<div class="conversation-name">'+
                        "{{ Session::get('customer_name') }}"+
                    '</div>'+
                     '<p>'+
                        message +
                     '</p>'+
                    '<p class="chat-time mb-0"><i class="bx bx-time-five align-middle mr-1"></i> '+
                        '{{ Carbon\Carbon::createFromFormat("Y-m-d H:i:s", now())->format("h:i a") }}' +
                    '</p>'+
                '</div>'+
                                
            '</div>'+
        '</li>'
        )

        $('#message').val('')


        // $.post( "{{ route('customer.chats.store') }}",
        //  {
        //     data: $('#chat_form').serialize(),
        //     chat: chat
        //  },
        //  function (data, status, xhr) {
        //     if (data.status == 1) {
        //                 toaster("success", "Message Sent!");
        //             } 
        //             else if (data.status == 0) {
        //                 toaster("error", "Can't Send Message to yourself");
                        
        //             }
        //  }

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
    function get_message(t) {
        console.log("{{route('customer.chats.get')}}"+"?customer_id=" + $(t).attr('id'))
        $.get(
            "{{route('customer.chats.get')}}"+"?customer_id=" + $(t).attr('id'), 
            function (data,status,xhr) {
                console.log(data)

                $('.get-message').empty().append(data)
            }
        )
    }
</script>
@endsection