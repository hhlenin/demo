@extends('master.customer.master')

@section('body')
{{-- <h1>resoty;royyoeyopyoreporeyoeyoy</h1> --}}
    <form action="{{ route('customer.product.new') }}" method="POST" enctype="multipart/form-data">

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Add Product Form</h4>

                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id"
                                    onchange="getProductSubcategory(this.value)">
                                    <option value=""> -- Select Product Category -- </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sub Category
                                name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="sub_category_id" id="subCategoryId">
                                    <option value=""> -- Select Product Sub Category -- </option>
                                    @foreach ($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}"> {{ $sub_category->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Brand name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="brand_id">
                                    <option value=""> -- Select Product Brand -- </option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"> {{ $brand->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Unit name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="unit_id">
                                    <option value=""> -- Select Product Unit -- </option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"> {{ $unit->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="horizontal-firstname-input" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="code" id="horizontal-firstname-input" />
                            </div>
                        </div>


                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Stock Amount</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="stock_amount"
                                    id="horizontal-firstname-input" />
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="short_description" id="horizontal-email-input"></textarea>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote" name="long_description" id="horizontal-email-input"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Location</label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote" name="location" id="horizontal-email-input"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Product Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" name="image"
                                    id="horizontal-password-input" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Product Other
                                Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" name="other_image[]" multiple
                                    id="horizontal-password-input" />
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">
                                <div class="col-sm-9">
                                    <input type="radio" id="sell" class="form-control-lg" name="preference"
                                        value="sell">
                                </div> Sell
                            </label>
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">
                                <div class="col-sm-9">
                                    <input checked type="radio" id="exchange" class="form-control-lg" name="preference"
                                        value="exchange">
                                </div> Exchange
                            </label>
                        </div>

                        <div class="form-group row mb-4" id="selling_price">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Selling Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="selling_price"
                                    id="horizontal-firstname-input" />
                            </div>
                        </div>

                        <div class="form-group row mb-4" id="regular_price">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Regular Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="regular_price"
                                    id="horizontal-firstname-input" />
                            </div>
                        </div>

                        <div class="form-group row mb-4" id="exchangeable_with">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Exchangeable
                                Product</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="exchangeable_with"
                                    id="horizontal-firstname-input" />
                            </div>
                        </div>

                        <div class="form-group row mb-4" id="exchange_price">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Adding Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="adding_price"
                                    id="horizontal-firstname-input" />
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Create New Product</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection

@section('js')
    <script>
        $('#selling_price').hide();
        $('#regular_price').hide();
        
        $('#exchangeable_with').show();
        $('#exchange_price').show();

        $('#sell').change(function() {
            $('#selling_price').show();
            $('#regular_price').show();
            $('#exchangeable_with').hide();
            $('#exchange_price').hide();
        });

        $('#exchange').change(function() {
            $('#exchangeable_with').show();
            $('#exchange_price').show();
            $('#selling_price').hide();
            $('#regular_price').hide();


        });
    </script>
@endsection
