@extends('master.admin.master')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Brand Info</h4>
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>Brand Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->description}}</td>
                                <td><img src="{{asset($brand->image)}}" alt="" height="50" width="80"/></td>
                                <td>{{$brand->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    <a href="{{route('admin.brand.edit', $brand->id)}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    
                                    <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure?'); document.getElementById('deleteBrand{{ $brand->id }}').submit()">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form action="{{route('admin.brand.destroy', $brand->id)}}" method="POST" id="deleteBrand{{$brand->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>       
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
