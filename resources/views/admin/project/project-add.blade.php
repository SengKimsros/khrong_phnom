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
                            <h3 class="box-title m-b-0">Add Project</h3><br><br>
                            <div class="row">
                                <form>
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" id="name" class="form-control required_name" value="{{$rows['name'] ?? ''}}">
                                            <span class="alertName" style="font-size: 12px;"></span>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Plan</label> 
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                  <a id="Plan" data-input="thumbnail2" data-input="holder1" class="btn btn-info"> <i class="fa fa-picture-o"></i> Choose</a>
                                                </span>
                                                <input id="thumbnail2" class="form-control" type="text" name="filepath" value="{{$rows['plan'] ?? "" }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <img src="{{$rows['plan'] ?? "" }}" alt="" style="width: 100px;">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea id="description" class="form-control" rows="4" placeholder="Short description" data-counter="350" name="description" cols="50">{{$rows['description'] ?? ""}}</textarea>
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="">Content</label>
                                            <span class="text-danger">*</span>
                                            <textarea id="project_content" class="form-control textarea" rows="4" placeholder="Short description" data-counter="350" name="description" cols="50">{{$rows['content'] ?? ""}}</textarea>
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="">Image</label> 
                                            <span class="text-danger">*</span>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                  <a id="project_image" data-input="thumbnail" data-preview="holder" class="btn btn-info"> <i class="fa fa-picture-o"></i> Choose</a>
                                                </span>
                                                <input id="thumbnail" class="form-control required_name" type="text" name="filepath" value="{{$rows['image'] ?? ""}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <img src="{{$rows['image'] ?? ""}}" alt="" style="width: 100px;">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="city_id" class="control-label">City</label>
                                            <div class="ui-select-wrapper form-group">
                                                <select id="city" class="form-control select-search-full ui-select ui-select select2-hidden-accessible" name="city_id">
                                                    <option value="0">Phnom Penh</option>
                                                    <option value="1" >Oakland</option>
                                                </select>
                                            </div>
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="">Location</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" id="location" class="form-control required_name" value="{{$rows['location'] ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3909.5325016133056!2d104.88496031412218!3d11.513608448303419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095062e8888a31%3A0xb76ac57b4c3cb2ac!2s131%2C%20Borey%20Piphop%20Thmey%2C%20Chamkar%20Doung%20Street%20(217)%2C%20Phnom%20Penh!5e0!3m2!1sen!2skh!4v1614301370684!5m2!1sen!2skh" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                        </div>
                    
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="number_block" class="control-label">Number blocks</label>
                                                <input id="number_block" class="form-control" placeholder="Number blocks" name="number_block" type="number" value="{{$rows['number_of_block'] ?? ""}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="number_floor" class="control-label">Number floors</label>
                                                <input id="number_floor" class="form-control" placeholder="Number floors" name="number_floor" type="number" value="{{$rows['number_of_floor'] ?? ''}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="number_flat" class="control-label">Number flats</label>
                                                <input  id="number_flat" class="form-control" placeholder="Number flats" name="number_flat" type="number" value="{{$rows['number_of_flat'] ?? ''}}">
                                            </div>
                                        </div>
                    
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="price_from" class="control-label">Lowest price</label>
                                                <input id="price_from" class="form-control input-mask-number" placeholder="Lowest price" name="price_from" type="text" value="{{$rows['lowest_price'] ?? ''}}">
                                                <span class="alertPrice_from" style="font-size:12px;"></span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="price_to" class="control-label">Max price</label>
                                                <input  id="price_to" class="form-control input-mask-number" placeholder="Max price" name="price_to" type="text" value="{{$rows['max_price'] ?? ''}}">
                                                <span class="alertPrice_to" style="font-size:12px;"></span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="currency_id" class="control-label">Currency</label>
                                                <div class="ui-select-wrapper form-group">
                                                    <select class="form-control select-full ui-select ui-select select2-hidden-accessible" id="currency" name="currency_id" tabindex="-1" aria-hidden="true">
                                                        <option value="0" >USD</option>
                                                        <option value="1" >VND</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card p-3" style="text-align: right;">
                                            <div class="btn-set">
                                                <input type="hidden" name="" id="project_id" value="{{$rows['id'] ?? ''}}">
                                                <a href="{{url('admin/project')}}" class="btn btn-secondary">Cancel</a>  
                                                <a href="javascript:" class="btn btn-success btnSave" is_lock=0><i class="fa fa-save"></i> Save</a>
                                            </div>
                                        </div>
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
        $("#project_image").filemanager('file', {prefix: route_prefix1});
    </script>
@endsection