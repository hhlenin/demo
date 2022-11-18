<form action="{{ route('admin.category.new') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Add Category Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class=" mb-4">
                            <input type="text" placeholder="Category Name" class="form-control" name="name"
                                id="horizontal-firstname-input" />
                        </div>
                        <div class=" mb-4">
                            <textarea placeholder="Description about category" class="form-control" name="description" id="horizontal-email-input"></textarea>
                        </div>

                        {{-- <div class="mb-4">
                            <div class="custom-control custom-switch mb-3" dir="ltr">
                                <input type="checkbox" name="feature_status" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">Featured Status</label>
                            </div>
                        </div> --}}

                        <div class=" mb-4">
                            <span>Click to add a image for category</span>
                            <div id="multi_image_picker" class="row">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>