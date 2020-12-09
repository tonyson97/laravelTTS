@extends('product.layout')
@push('styles')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@endpush
@section('content')
    <a href="{{ route('products.create') }}" class="btn btn-success mb-2">Add</a>
    <br>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered" id="laravel_crud">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên</th>
                    <th>Danh Mục</th>
                    <th>Danh mục nhỏ</th>
                    <th>Chỉ mục</th>
                    <th>Mô tả</th>
                    <th>Từ khoá</th>
                    <th>File</th>
                    <th>Giá</th>
                    <th>Số trang hiển thị</th>
                    <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->sub_category }}</td>
                        <td>{{ $product->child_sub_category }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->keyword }}</td>
                        <td>{{ $product->file }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->viewpage }}</td>
{{--                        <td>{{ date('Y-m-d', strtotime($product->created_at)) }}</td>--}}
                        <td><a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id)}}" method="post">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                        <td> <a class="btn btn-primary"  href="{{ route('products.download', $product->id)}}"  method="post">Download</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="pagination">
        {!! $products->links('vendor.pagination.custom') !!}
    </div>
@endsection
