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
                            <h3 class="box-title m-b-0">Add User</h3><br><br>
                            <div class="row">
                                <form>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" id="name" class="form-control required_name" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" id="name" class="form-control required_name" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            <span class="text-danger">*</span>
                                            <select name="gender" id="" class="form-control">
                                                <option value="1">Male</option>
                                                <option value="0">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Position</label>
                                            <span class="text-danger">*</span>
                                            <select name="position" id="" class="form-control">
                                                @foreach ($position as $item)
                                                    <option value="{{$item->id ?? 0}}">{{$item->name ?? ''}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Position</label>
                                            <span class="text-danger">*</span>
                                            <select name="position" id="" class="form-control">
                                                @foreach ($position as $item)
                                                    <option value="{{$item->id ?? 0}}">{{$item->name ?? ''}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Position</label>
                                            <span class="text-danger">*</span>
                                            <select name="position" id="" class="form-control">
                                                @foreach ($position as $item)
                                                    <option value="{{$item->id ?? 0}}">{{$item->name ?? ''}}</option>
                                                @endforeach
                                            </select>
                                        </div>
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
