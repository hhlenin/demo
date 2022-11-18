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
                                <form id="chat_form" method="POST">
                                    <input type="hidden" name="u_id" id="u_id" value="{{ Session::has('user_id')? Session:get('user_id') : 0}}">
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
                                            <input type="hidden" name="user_id" value="{{ $product->user_id }}">
                                        </div>
                                    </div>
                                    <div class="chat-history">
                                        <ul class="m-b-0 text-append">
                                            
                                            
                                        </ul>
                                    </div>
                                    <div class="chat-message clearfix">
                                        <div class="input-group mb-0">
                                            <div class="input-group-prepend">
                                                <button type="button"  
                                                 onclick="chat_ajax()" class="input-group-text"><i class="fa fa-send"></i></button>
                                            </div>
                                            <input type="text" name="chat" class="form-control send-chat" placeholder="Enter text here...">
                                        </div>
                                    </div>
                                </div>
                                </form>
                                
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

