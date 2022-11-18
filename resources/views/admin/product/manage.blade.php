@extends('master.admin.master')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Product Info</h4>
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Selling Price</th>
                            <th>Stock Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->name}}</td>
                                <td><img src="{{asset($product->image)}}" alt="" width="50" height="40"/></td>
                                <td>{{$product->selling_price}}</td>
                                <td>{{$product->stock_amount}}</td>
                                <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    <input type="hidden" id="prod-link" value="{{ route('product-detail', ['id' => $product->id]) }}">
                                    <button onclick="copyToClipboard('#prod-link')" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Copy Link"> <i class="fas fa-copy"></i>
                                    </button>
                                    <a href="{{route('admin.product.detail', ['id' => $product->id])}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-book-open"></i>
                                    </a>
                                    <a href="{{route('admin.product.edit', ['id' => $product->id])}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('admin.product.delete', ['id' => $product->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this..');">
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
@endsection

@section('js')

<script>

function copyToClipboard(element) {
    console.log(element)
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).val()).select();
  document.execCommand("copy");
  $temp.remove();

  toastr["success"]("Link Copied")
}
</script>
    
@endsection
