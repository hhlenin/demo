@extends('master.admin.master')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                            data-target="#exampleModalScrollable"><i class="bx bx-plus"></i> Add New Sub-Category</button>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Sub Category Info</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($sub_categories))
                                @foreach ($sub_categories as $sub_category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sub_category->category->name }}</td>
                                        <td>{{ $sub_category->name }}</td>
                                        <td>{{ $sub_category->description }}</td>
                                        <td>
                                            <img src="{{ asset($sub_category->image) }}" alt="" height="50"
                                                width="80" />
                                        </td>
                                        <td>{{ $sub_category->status == 1 ? 'Published' : 'Unpublished' }}
                                            <div class="custom-control custom-switch mb-3" dir="ltr">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1" {{ $sub_category->status == 1 ? 'checked' : 'unchecked' }}>
                                                <label class="custom-control-label" for="customSwitch1"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <button id="edit_btn" type="button" value="{{ $sub_category->id }}"
                                                class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="modal"
                                                data-target="#editModal"><i class="fa fa-edit"></i></button>
                                            <a href="" class="btn btn-danger btn-sm"
                                                onclick="event.preventDefault(); confirm('Are you sure?'); document.getElementById('subCategoryDeleteForm{{ $sub_category->id }}').submit();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form action="{{ route('admin.sub-category.delete', ['id' => $sub_category->id]) }}"
                                                method="POST" id="subCategoryDeleteForm{{ $sub_category->id }}">
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    @include('admin.sub-category.partial.insert_modal')


    @if (!empty($sub_categories))
        <form id="get_form" action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Edit Category Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-4">
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-sm-12">
                                    <input placeholder="Category Name" type="text" class="form-control" name="name"
                                        id="category_name" value="{{ $sub_category->name }}" />
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <div class="col-sm-12">
                                    <textarea placeholder="Description about category" class="form-control" name="description" id="category_description">{{ $sub_category->description }}</textarea>
                                </div>
                            </div>

                            <div class=" mb-4">
                                <span>Click to replace image for this category</span>

                                <div id="multi_image_pickerr" class="row">
                                    <img id="category_image" src="{{ asset($sub_category->image) }}" alt=""
                                        height="100" width="150" />
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
            let url = "{{ route('admin.sub-category.update', ':id') }}";
            let edit_url = "{{ route('admin.sub-category.edit', ':id') }}";
            url = url.replace(':id', id);
            edit_url = edit_url.replace(':id', id);
            console.log(edit_url);

            $('#get_form').attr('action', url);

            $.ajax({
                type: "GET",
                url: edit_url,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('#category_name').val(response[0].name);
                    $('#category_description').val(response[0].description);
                    $('#category_image').attr('src', "{{ asset('/') }}/" + response[0].image);
                    $('#category_id').attr('src', response[0].category_id);
                }
            });

        });
    </script>
@endsection
