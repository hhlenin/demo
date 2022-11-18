<form action="{{ route('admin.carousel.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Add Carousel Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        {{-- <div class="mb-4">
                            <select class="form-control" name="category_id">
                                <option selected disabled>-- Select a Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class=" mb-4">
                            <input type="text" placeholder="Small Header" class="form-control" name="small_header"
                                id="horizontal-firstname-input" />
                        </div>

                        <div class=" mb-4">
                            <input type="text" placeholder="H2 Header" class="form-control" name="h2_header"
                                id="horizontal-firstname-input" />
                        </div>

                        <div class=" mb-4">
                            <input type="text" placeholder="Paragraph" class="form-control" name="paragraph"
                                id="horizontal-firstname-input" />
                        </div>

                        <div class=" mb-4">
                            <input type="number" placeholder="Price" class="form-control" name="price"
                                id="horizontal-firstname-input" />
                        </div>

                        <div class=" mb-4">
                            <input type="text" placeholder="Link" class="form-control" name="link"
                                id="horizontal-firstname-input" />
                        </div>
                        {{-- <div class=" mb-4">
                            <textarea placeholder="Description about sub-category" class="form-control" name="description" id="horizontal-email-input"></textarea>
                        </div> --}}

                        <div class=" mb-4">
                            <span>Click to add a image for sub-category</span>
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

