@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <!-- ===== Page-Container ===== -->
    <div class="container-fluid">
        <div class="" style="min-height: 525px;">
            {{-- @dump($user) --}}
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Add Post</h3><br><br>
                            <div class="row">
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
                                <form method="POST" action="/admin/user/{{$user['id'] ?? null}}" enctype="multipart/form-data">
                                    @if (isset($user))
                                    <input name="_method" type="hidden" value="PUT">
                                    @endif
                                    @csrf
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" name="first_name" class="form-control required_name" value="{{$user['first_name'] ?? ''}}">
                                        </div>
                                    </div>


                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Content</label>
                                            <span class="text-danger">*</span>
                                            <textarea name="content" id="content"></textarea>
                                        </div>

                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Content</label>
                                            <span class="text-danger">*</span>
                                            <input type="file" class="form-control" name="thumnail">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 text-right">
                                        <a href="{{url('admin/user')}}" class="btn btn-danger">Cancel</a>
                                        <input type="submit" class="btn btn-info" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ===== Page-Container-End ===== -->
    <footer class="footer t-a-c">
        © 2017 Cubic Admin
    </footer>
</div>
@endsection

@section("customScript")
    <script src="/ckeditor/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>

        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('content',options);
        var route_prefix1 = "/laravel-filemanager?type=Files";
        $('#Plan').filemanager('file', {prefix: route_prefix1});
    </script>
@endsection
