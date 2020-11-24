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
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
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
                                <th>Created AT</th>
                            </tr>
                            @foreach ($files as $file)
                                <tr>
                                    <td>{{$file->id}}</td>
                                    <td>{{$file->name}}</td>
                                    <td>{{$file->created_at}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="bt-add-new-file">
                        <button type="button" style="border: none" onclick="location.href='{{ url('create') }}'">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
