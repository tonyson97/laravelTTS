@extends('product.layout')
@section('content')
    <h2 style="margin-top: 12px;" class="text-center">Add Product</h2>
    <br>
    <form action="{{ route('products.store') }}" method="POST" name="add_product">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Tên</strong>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Danh mục</strong>
                    <input type="text" name="category" class="form-control" placeholder="Enter here">
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Danh mục nhỏ</strong>
                    <input type="text" name="sub_category" class="form-control" placeholder="Enter here">
                    <span class="text-danger">{{ $errors->first('sub_category') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Chỉ mục</strong>
                    <input type="text" name="child_sub_category" class="form-control" placeholder="Enter here">
                    <span class="text-danger">{{ $errors->first('child_sub_category') }}</span>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <strong>Mô tả</strong>
                    <textarea class="form-control" col="4" name="description" placeholder="Enter Description"></textarea>
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Từ khoá</strong>
                    <input type="text" name="keyword" class="form-control" placeholder="Enter keyword">
                    <span class="text-danger">{{ $errors->first('keyword') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>File</strong>
                    <input type="file" name="image" class="form-control" placeholder="">
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Giá</strong>
                    <input type="number" name="price" class="form-control" placeholder="Enter price">
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Số trang hiển thị</strong>
                    <input type="text" name="viewpage" class="form-control" placeholder="Enter page">
                    <span class="text-danger">{{ $errors->first('viewpage') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
