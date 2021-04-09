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
                                <form method="" action="" enctype="multipart/form-data">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" id="post_title" name="post_title"  class="form-control required_name" value="{{$rows['title'] ?? ""}}">
                                            <span class="alertName" style="font-size: 12px;"></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Slug</label> 
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                <a id="post_image" name="post_image" data-input="thumbnail1" data-input="holder1" class="btn btn-info"> <i class="fa fa-picture-o"></i> Choose</a>
                                                </span>
                                                <input id="thumbnail1" class="form-control" type="text" name="filepath" value="{{$rows['slug'] ?? ""}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <img src="{{$rows['slug'] ?? ""}}" alt="" style="width: 100px;">
                                        </div>
                                    </div>
                                    

                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Content</label>
                                            <span class="text-danger">*</span>
                                            <textarea id="content" class="form-control" rows="4" placeholder="Short description" data-counter="350" name="" cols="50">{{$rows['content'] ?? ""}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Thumbnail</label> 
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                <a id="post_thumbnail" data-input="thumbnail2" data-input="holder1" class="btn btn-info"> <i class="fa fa-picture-o"></i> Choose</a>
                                                </span>
                                                <input id="thumbnail2" class="form-control" type="text" name="filepath" value="{{$rows['post_thumbnail'] ?? ""}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <img src="{{$rows['post_thumbnail'] ?? ""}}" alt="" style="width: 100px;">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 text-right">
                                        <input type="hidden" name="" id="post_id" value="{{$rows['id'] ?? ""}}">
                                        <a href="{{url('/admin/post')}}" class="btn btn-danger">Cancel</a>
                                        <a href="javascript:" class="btn btn-success btnSavePost" is_lock=0><i class="fa fa-save"></i> Save</a>
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
        CKEDITOR.replace('post_content',options);
        var route_prefix1 = "/laravel-filemanager?type=Files";
        $('#post_image').filemanager('file', {prefix: route_prefix1});
        $('#post_thumbnail').filemanager('file', {prefix: route_prefix1});
    </script>
    <script>
	
        $(document).ready(function(){
            console.log(appData);
        });
    </script>
@endsection
