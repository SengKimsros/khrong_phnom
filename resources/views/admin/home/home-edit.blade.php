@extends('layouts.app')
@section('content')

<div class="page-wrapper">
    <!-- ===== Page-Container ===== -->
    <div class="container-fluid">
        <div class="" style="min-height: 525px;">
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Edit Home</h3><br><br>
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
                                <form method="POST" action="/admin/home/{{$user['id'] ?? null}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Project Name</label>
                                            <span class="text-danger">*</span>
                                            <select name="project_id" id="id_project" class="form-control">
                                                <option value="" disabled selected>{{$home[0]->project_name ?? ''}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="" style="white-space: nowrap;overflow: auto;" id="img">
                                            <img id="toAnnotate" src="{{$home[0]->plan ?? ''}}" alt="">
                                        </div>
                                    </div>
                                    {{-- hidden field --}}
                                        <input type="text" name="fm_height" value="{{$home[0]->height ?? 0}}">
                                        <input type="text" name="fm_width" value="{{$home[0]->width ?? 0}}">
                                        <input type="text" name="fm_top" value="{{$home[0]->top ?? 0}}">
                                        <input type="text" name="fm_left" value="{{$home[0]->left}}">
                                    {{-- end hidden field --}}
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" name="title" class="form-control required_name" value="{{$home[0]->title ?? null}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <span class="text-danger">*</span>
                                            <input type="number" name="price" class="form-control" value="{{$home[0]->price ?? null}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Size</label>
                                            <span class="text-danger">*</span>
                                            <input type="number" name="size" class="form-control" value="{{$home[0]->size ?? null}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Bed Rooms</label>
                                            <span class="text-danger">*</span>
                                            <input type="number" name="bed_rooms" class="form-control" value="{{$home[0]->bath_rooms ?? null}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Bath Rooms</label>
                                            <span class="text-danger">*</span>
                                            <input type="number" name="bath_rooms" class="form-control" value="{{$home[0]->bed_rooms}}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <span class="text-danger">*</span>
                                            <input type="file" name="image" class="form-control" value="">
                                            <input type="hidden" name="image_hidden" value="{{$home[0]->image ?? null}}">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Content</label>
                                            <span class="text-danger">*</span>
                                            <textarea name="content" id="content">{{$home[0]->content ?? null}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <span class="text-danger">*</span>
                                            <textarea name="description" rows="5" class="form-control">{{$home[0]->description ?? null}}</textarea>
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
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/notation/css/annotation.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="/notation/js/jquery.annotate.js"></script>


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

    <script>
        var data=[
            {
                "top": {{$home[0]->top ?? 0}},
                "left": {{$home[0]->left ?? 0}},
                "width": {{$home[0]->width ?? 0}},
                "height":{{$home[0]->height ?? 0}},
                "image":"{{$home[0]->image ?? null}}",
                "title":"{{$home[0]->title}}",
                "price":{{$home[0]->price ?? null}},
                "size":{{$home[0]->size ?? null}},
                "bed_rooms":{{$home[0]->bed_rooms ?? null}},
                "bath_rooms":{{$home[0]->bath_rooms}},
                "editable": true
            }
        ];
        $(function(){
            $("#toAnnotate").annotateImage({
                editable: true,
                notes: data,
            });
        })


    </script>
@endsection
