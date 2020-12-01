<html>
<head>
    <title>Laravel 8 File Upload example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <style type="text/css">
        h2{
            text-align: center;
            font-size:22px;
            margin-bottom:50px;
        }
        body{
            background:#f2f2f2;
        }
        .section{
            margin-top:150px;
            padding:50px;
            background:#fff;
        }
        .ipdt{
            margin: 10px 0;
            display: block;
        }
        .ipdt label{
            font-weight: normal;
            color: darkgrey;
        }
        .sip input{
            margin-left: 1.2rem;
            border: 1px solid darkgray;
        }
        .sip textarea{
            margin-left: 4rem;
            border: 1px solid darkgray;
        }

        .fldd .dropdown button{
            width: 23.7em;
        }
        .fldd1 .dropdown button{
            width: 23.7em;
        }
        .twothree{
            display: flex;
            margin-left: 6em;
        }
        .twothree .price .dropdown button{
            width: 100%;
        }
        .smful{
            display: flex;justify-content: center;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="col-md-8 section offset-md-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>Laravel 8 file Upload example</h2>
            </div>
            <div class="panel-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('file.upload.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row ipdt">
                        <div class="col-md-10">
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                    <div class="row ipdt">
                        <div class="col-md-10 sip">
                            <label for="name">Tên tài liệu<span style="color: red">(*)</span></label>
                            <input type="text" id="name" name="name" size="48"> <br><br>
                        </div>

                        <div>
                            <label for="category">Danh Mục<span style="color: red">(*)</span>:</label>

                            <select id="category">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="vw">VW</option>
                                <option value="audi" selected>Audi</option>
                            </select>
                        </div>
                        <br><br>

                        <div>
                            <select id="category_1">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="vw">VW</option>
                                <option value="audi" selected>Audi</option>
                            </select>
                        </div>
                        <br><br>
                        <div>
                            <select id="category_2">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="vw">VW</option>
                                <option value="audi" selected>Audi</option>
                            </select>
                        </div>
                        <br><br>

                        <div class="col-md-10 sip">
                            <label for="description">Mô tả</label>
                            <textarea name="description" id="description" cols="51" rows="3"></textarea><br><br>
                        </div>
                        <div class="col-md-10 sip">
                            <label for="keyword">Từ khoá<span style="color: red">(*)</span></label>
                            <input type="text" id="keyword" name="keyword" size="48"> <br><br>
                        </div>
                        <div class="twothree">
                            <div>
                                <label for="price"></label>

                                <select id="price">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="vw">VW</option>
                                    <option value="audi" selected>Audi</option>
                                </select>
                            </div>
                            <br><br>
                            <div>
                                <label for="numberpagepreview"></label>

                                <select id="numberpagepreview">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="vw">VW</option>
                                    <option value="audi" selected>Audi</option>
                                </select>
                            </div>
                            <br><br>
                        </div>

                        <div class="col-md-12 smful">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
