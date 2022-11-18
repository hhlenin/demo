@extends('master.admin.master')

@section('title', 'Add Category')


@section('body')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Category Form</h4>
                    <p class="text-center text-success">{{ Session::get('message') }}</p>
                    <form action="{{ route('category.new') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <div class="col-sm-12 mx-auto">
                                <input type="text" placeholder="Category Name" class="form-control" name="name"
                                    id="horizontal-firstname-input" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-sm-12 mx-auto">
                                <textarea placeholder="Description about category" class="form-control" name="description" id="horizontal-email-input"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-sm-12 mx-auto">
                                <span>Click to add a image for category</span>
                                <div id="multi_image_picker" class="row">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $("#multi_image_picker").spartanMultiImagePicker({
            fieldName: 'image', // this configuration will send your images named "fileUpload" to the server
            maxCount: 1,
            rowHeight: '150px',
            groupClassName: 'col-4',
            maxFileSize: '',
            dropFileLabel: "",
            onAddRow: function(index) {
                console.log(index);
                console.log('add new row');
            },
            onRenderedPreview: function(index) {
                console.log(index);
                console.log('preview rendered');
            },
            onRemoveRow: function(index) {
                console.log(index);
            },
            onExtensionErr: function(index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function(index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });
    </script>
@endsection
