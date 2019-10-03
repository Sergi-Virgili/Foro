<!DOCTYPE html>
<html>
<head>
<title> Prueba de imagenes</title>
<link rel="stylesheet" href="http//getbootstrap.com/dist/css/bootstrap.css">
</head>
<body>
<div class="container">

    <div class="panel panel-primary">
        <div class="panel-heading"><h2>laravel 6 image upload example</h2></div>
        <div class="panel-body">
        
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
            </div>
            <img src="images/{{ Session::get('image') }}">
            @endif

            <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data"></form>
                @csrf
                <div class="row">
                
                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>
