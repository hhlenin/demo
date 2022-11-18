@extends('master.admin.master')

@section('title', 'Categories')

@section('body')


    {{-- Jquery: --}}


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                            data-target="#exampleModalScrollable"><i class="bx bx-plus"></i> Add New Category</button>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Category Info</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Category Image</th>
                                <th>Publication Status</th>
                                {{-- <th>Featured</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <p class="">{{ $category->name }}</p>
                                    </td>
                                    <td>{{ $category->description }}</td>
                                    <td><img src="{{ asset($category->image) }}" alt="" height="80"
                                            width="80" style="object-fit: cover; border-radius: 50%" /></td>
                                    <td>
                                        <div class="custom-control custom-switch mb-3" dir="ltr">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1" {{ $category->status == 1 ? 'checked' : 'unchecked' }}>
                                            <label class="custom-control-label" for="customSwitch1"></label>
                                        </div>
                                        
                                    </td>
                                    <td>
                                        <button id="edit_btn" type="button" value="{{ $category->id }}"
                                            class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="modal"
                                            data-target="#editModal"><i class="fa fa-edit"></i></button>
                                    
                                        <a href="{{ route('admin.category.delete', ['id' => $category->id]) }}"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure to delete this..');">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->




    @include('admin.category.partial.insert_modal')

@if(!empty($categories))

    <form id="get_form" action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Edit Category Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group row mb-4">
                            <div class="col-sm-12">
                                <input placeholder="Category Name" type="text" class="form-control"
                                     name="name" id="category_name" value="{{ $category->name }}" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-sm-12">
                                <textarea placeholder="Description about category" class="form-control" name="description" id="category_description">{{ $category->description }}</textarea>
                            </div>
                        </div>

                        <div class=" mb-4">
                            <span>Click to replace image for this category</span>

                            <div id="multi_image_pickerr" class="row">
                                <img id="category_image" src="" alt="" height="100" width="150" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form>

@endif

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


        $("#multi_image_pickerr").spartanMultiImagePicker({
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


        $('button[id^="edit_btn"]').on('click', function() {
            let id = this.value;
            let url = "{{ route('admin.category.update', ':id') }}";
            let edit_url = "{{ route('admin.category.edit', ':id') }}";
            url = url.replace(':id', id);
            edit_url = edit_url.replace(':id', id);
            console.log(edit_url);

            $('#get_form').attr('action', url);
            
                $.ajax({
                    type: "GET",
                    url: edit_url ,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#category_name').val(response.name);
                        $('#category_description').val(response.description);
                        $('#category_image').attr('src', "{{ asset('/') }}" + response.image)
                    }
                });
            
        });

    </script>


@endsection
