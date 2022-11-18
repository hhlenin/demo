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