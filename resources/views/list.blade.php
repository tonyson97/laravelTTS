@extends('layouts.app')
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    .title-list{
        color: red;
        display: flex;
        justify-content: center;
        margin: 20px;
    }
    .bt-add-new-file{
        display: flex;
        justify-content: flex-end;
        margin: 10px 0;
    }
    .action{
        display: flex;
    }
    .bigsize{
        max-width: 100% !important;
    }
    .my-active span{
        background-color: #5cb85c !important;
        color: white !important;
        border-color: #5cb85c !important;
    }
    .pangi{
        display: flex;
        justify-content: center;
    }
    .pangi ul li{
        display: inline-block;
    }
</style>
@section('content')
<div class="container bigsize">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body bigsize" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="title-list">
                        <h1>List file upload</h1>
                    </div>
                    <div class="list-file">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Name File</th>
                                <th>Category</th>
                                <th>Category 1</th>
                                <th>Category 2</th>
                                <th>Description</th>
                                <th>Keyword</th>
                                <th>type</th>
                                <th>Number page preview</th>
                                <th>Created at</th>
                                <th>Update at</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($files as $file)
                                <tr>
                                    <td>{{$file->id}}</td>
                                    <td>{{$file->name}}</td>
                                    <td>{{$file->name_file}}</td>
                                    <td>{{$file->category}}</td>
                                    <td>{{$file->category_1}}</td>
                                    <td>{{$file->category_2}}</td>
                                    <td>{{$file->description}}</td>
                                    <td>{{$file->keyword}}</td>
                                    <td>{{$file->numberpagepreview}}</td>
                                    <td>{{$file->type}}</td>
                                    <td>{{$file->created_at}}</td>
                                    <td>{{$file->updated_at}}</td>
                                    <td>
                                        <div class="action">
                                            <a href="" class="btn btn-info">View</a>
                                            <a href="" class="btn btn-danger">Edit</a>
                                            <a href="" class="btn btn-dark">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                        <div class="bt-add-new-file">
                            <button type="button" style="border: none" onclick="location.href='{{ url('create') }}'">Add</button>
                        </div>
                        <div class="pangi">
                            {{ $files->links('vendor.pagination.custom') }}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
