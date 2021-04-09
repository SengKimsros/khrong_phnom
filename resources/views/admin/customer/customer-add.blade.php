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
                            <h3 class="box-title m-b-0">Add User</h3><br><br>
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
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" name="first_name" class="form-control required_name" value="{{old('first_name')?old('first_name'):($user['first_name'] ?? '')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" name="last_name" class="form-control required_name" value="{{old('last_name')?old('last_name'):($user['last_name'] ?? '')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Profile</label>
                                            <span class="text-danger">*</span>
                                            <input type="file" name="profile" class="form-control required_name" value="{{old('profile')?old('profile'):null}}">
                                        </div>
                                        <input type="hidden" name="profile_hidden" value="{{$user['profile_photo_path'] ?? ''}}">
                                    </div>

                                    {{-- <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">User Profile</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                  <a id="Plan" data-input="thumbnail2" data-input="holder1" class="btn btn-info"> <i class="fa fa-picture-o"></i> Choose</a>
                                                </span>
                                                <input id="thumbnail2" class="form-control" type="text" name="profile" value="">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            <span class="text-danger">*</span>
                                            <select name="gender" id="" class="form-control">
                                                <option value="1" @if ((old('gender')?old('gender'):($user['gender'] ?? null))==1)
                                                    selected
                                                @endif>Male</option>
                                                <option value="0" @if ((old('gender')?old('gender'):($user['gender'] ?? null))==0)
                                                    selected
                                                @endif>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Position</label>
                                            <span class="text-danger">*</span>
                                            <select name="position" id="" class="form-control">

                                                @foreach ($position as $item)
                                                    @if (old('position')?old('position'):($user['position_id'] ?? null)==($item->id ?? 0))
                                                        <option value="{{$item->id ?? 0}}" selected>{{$item->name ?? ''}}</option>
                                                    @else
                                                        <option value="{{$item->id ?? 0}}">{{$item->name ?? ''}}</option>
                                                    @endif

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" name="phone" class="form-control required_name" value="{{old('phone')?old('phone'):($user['phone'] ?? '')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <span class="text-danger">*</span>
                                            <input type="email" class="form-control" name="email" value="{{old('email')?old('email'):($user['email'] ?? '')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <span class="text-danger">*</span>
                                            <input type="password" name="password" class="form-control" value="{{old('password')?old('password'): null}}">
                                            <input type="hidden" name="password_hidden" value="{{$user['password'] ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="description" class="form-control" rows="5">{{old('description')?old('description'):($user['description'] ?? '')}}</textarea>
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
    <script src="/js/jquery.annotate.js"></script>
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
