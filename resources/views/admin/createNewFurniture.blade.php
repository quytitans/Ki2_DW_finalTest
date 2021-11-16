@extends('admin.layout.master-layout')

@section('title')
    <title>Create new furniture</title>
@endsection

@section('breadcrumb')
    <header class="page-header">
        <h2>Add new furniture</h2>
    </header>
@endsection

@section('content')
    <div class="col-md-12">
        <form name="register-form" action="/furniture/create" method="post">
            @csrf
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                    </div>
                    <h2 class="panel-title">Create</h2>
                </header>
                <div class="panel-body">
                    @if($errors->all())
                        <div class="validation-message">
                            <ul style="display: block;">
                                @foreach($errors->all() as $error)
                                    <li>
                                        <label class="error">
                                            {{$error}}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="name">
                            @error('name')
                            <label for="eventName" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price" placeholder="price">
                            @error('price')
                            <label for="portfolio" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>Avartar</label>
                            <input id="thumbnailURL" type="hidden" class="form-control" name="avatar" value="">
                            <button id="upload_widget" class="form-control btn-default" type="button">Select furniture
                                image
                            </button>
                            <div id="previewIMG"></div>
                            @error('screenID')
                            <label for="thumbnail" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <button type="submit" class="btn btn-info btn-fill">Submit</button>
                    <a href="/furniture/all">
                        <button type="button" class="btn btn-danger pull-right">Cancel</button>
                    </a>
                </footer>
            </section>
        </form>
    </div>
@endsection

@section('script')
    <script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>
    <script type="text/javascript">
        var previewIMG = document.getElementById('previewIMG')
        var thumbnailURL = document.getElementById('thumbnailURL')
        var myWidget = cloudinary.createUploadWidget({
                cloudName: 'quynv300192',
                uploadPreset: 'qivdh8qo'
            }, function (error, result) {
                if (!error && result && result.event === "success") {
                    thumbnailURL.value += `${result.info.secure_url}` + ',';
                    console.log(thumbnailURL.value);
                    previewIMG.innerHTML += `
                        <button type="button" class="btn-xs">X</button>
                        <img class="img-thumbnail img-rounded" width="100" id="imgthumnail" src="${result.info.secure_url}" alt="">`
                    console.log(result.info)
                }
            }
        )
        document.getElementById("upload_widget").addEventListener("click", function () {
            myWidget.open();
        }, false);
    </script>
@endsection
