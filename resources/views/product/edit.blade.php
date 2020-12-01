@extends('product.layout')
@section('content')
    <h2 style="margin-top: 12px;" class="text-center">Edit Product</h2>
    <br>
    <form action="{{ route('products.update', $product_info->id) }}" method="POST" name="update_product">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Title</strong>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ $product_info->title }}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Danh mục</strong>
                    <input type="text" name="category" class="form-control" placeholder="Enter Product Code" value="{{ $product_info->category }}">
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Danh mục nho</strong>
                    <input type="text" name="sub_category" class="form-control" placeholder="Enter Product Code" value="{{ $product_info->sub_category }}">
                    <span class="text-danger">{{ $errors->first('sub_category') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Chi mục</strong>
                    <input type="text" name="category" class="form-control" placeholder="Enter Product Code" value="{{ $product_info->child_sub_category }}">
                    <span class="text-danger">{{ $errors->first('child_sub_category') }}</span>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <strong>Description</strong>
                    <textarea class="form-control" col="4" name="description" placeholder="Enter Description" >{{ $product_info->description }}</textarea>
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>tu khoa</strong>
                    <textarea class="form-control" col="4" name="keyword" placeholder="Enter Description" >{{ $product_info->keyword }}</textarea>
                    <span class="text-danger">{{ $errors->first('keyword') }}</span>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <strong>Product Image</strong>
                    @if($product_info->image)
                        <img id="original" src="{{ url('public/image/'.$product_info->image) }}" height="70" width="70">
                    @endif
                    <input type="text" name="image" class="form-control" placeholder="" value="{{ $product_info->image }}">
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Gia</strong>
                    <textarea class="form-control" col="4" name="price" placeholder="Enter Description" >{{ $product_info->price }}</textarea>
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>So trang hien thi</strong>
                    <textarea class="form-control" col="4" name="viewpage" placeholder="Enter Description" >{{ $product_info->viewpage }}</textarea>
                    <span class="text-danger">{{ $errors->first('viewpage') }}</span>
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
