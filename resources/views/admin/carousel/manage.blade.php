@extends('master.admin.master')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                            data-target="#exampleModalScrollable"><i class="bx bx-plus"></i> Add Carousel Item</button>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Carousel</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Small Heading</th>
                                <th>H2 Heading</th>
                                <th>Paragraph</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if (!empty($carousels)) --}}
                                @foreach ($carousels as $carousel)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $carousel->small_header }}</td>
                                        <td>{{ $carousel->h2_header }}</td>
                                        <td>{{ $carousel->paragraph }}</td>
                                        <td>{{ $carousel->price }}</td>
                                        <td>
                                            <img src="{{ asset($carousel->image) }}" alt="" height="50"
                                                width="80" style="object-fit: cover" />
                                        </td>
                                        {{-- <td>{{ $sub_category->status == 1 ? 'Published' : 'Unpublished' }}
                                            <div class="custom-control custom-switch mb-3" dir="ltr">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1" {{ $sub_category->status == 1 ? 'checked' : 'unchecked' }}>
                                                <label class="custom-control-label" for="customSwitch1"></label>
                                            </div>
                                        </td> --}}
                                        <td>
                                            <button id="edit_btn" type="button" value="{{ $carousel->id }}"
                                                class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="modal"
                                                data-target="#editModal"><i class="fa fa-edit"></i></button>
                                            <a href="" class="btn btn-danger btn-sm"
                                                onclick="event.preventDefault(); confirm('Are you sure?'); document.getElementById('subCategoryDeleteForm{{ $carousel->id }}').submit();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form action="{{ route('admin.carousel.destroy', ['carousel' => $carousel->id]) }}"
                                                method="POST" id="subCategoryDeleteForm{{ $carousel->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            {{-- @endif --}}

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    @include('admin.carousel.partial.insert_modal')


    @if (!empty($carousel))
        <form id="get_form" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Edit Carousel Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class=" mb-4">
                                <input type="text" placeholder="Small Header" class="form-control" name="small_header"
                                    id="small_header" />
                            </div>
    
                            <div class=" mb-4">
                                <input type="text" placeholder="H2 Header" class="form-control" name="h2_header"
                                    id="h2_header" />
                            </div>
    
                            <div class=" mb-4">
                                <input type="text" placeholder="Paragraph" class="form-control" name="paragraph"
                                    id="paragraph" />
                            </div>
    
                            <div class=" mb-4">
                                <input type="number" placeholder="Price" class="form-control" name="price"
                                    id="price" />
                            </div>

                            <div class=" mb-4">
                                <input type="text" placeholder="Link" class="form-control" name="link"
                                    id="link" />
                            </div>
                            <div class=" mb-4">
                                <input type="file" name="image" placeholder="Select a file to replace current image" class="form-control" name="paragraph"
                                     />
                            </div>
                            <img id="category_image" src="" alt="" height="100" width="150" />
                            
                            <div id="multi_image_picker" class="row">
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
            let url = "{{ route('admin.carousel.update', ':id') }}";
            let edit_url = "{{ route('admin.carousel.edit', ':id') }}";
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
                    $('#small_header').val(response.small_header);
                    $('#h2_header').val(response.h2_header);
                    $('#paragraph').val(response.paragraph);
                    $('#price').val(response.price);
                    $('#category_image').attr('src', "{{ asset('/') }}/"+ response.image);
                    $('#category_id').val('src', response.category_id);
                    $('#get_form').attr('src', response.id);
                    $('#link').val('src', response.link);
                }
            });

        });
    </script>
@endsection
