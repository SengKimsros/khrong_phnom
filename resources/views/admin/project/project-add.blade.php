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
                                            <input type="text" id="name" class="form-control required_name" value="">
                                            <span class="alertName" style="font-size: 12px;"></span>
                                        </div>
                                        
                    
                                        <div class="form-group">
                                            <label for="">Plan</label> 
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                  <a id="image1" data-input="thumbnail2" data-input="holder1" class="btn btn-info"> <i class="fa fa-picture-o"></i> Choose</a>
                                                </span>
                                                <input id="thumbnail2" class="form-control" type="text" name="filepath" value="">
                                            </div>
                                        </div>
                                        
                                       
                                        
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea id="description" class="form-control" rows="4" placeholder="Short description" data-counter="350" name="description" cols="50"></textarea>
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="">Content</label>
                                            <span class="text-danger">*</span>
                                            <textarea id="content" class="form-control textarea" rows="4" placeholder="Short description" data-counter="350" name="description" cols="50"></textarea>
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="">Image</label> 
                                            <span class="text-danger">*</span>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                  <a id="image" data-input="thumbnail" data-preview="holder" class="btn btn-info"> <i class="fa fa-picture-o"></i> Choose</a>
                                                </span>
                                                <input id="thumbnail" class="form-control required_name" type="text" name="filepath" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="city_id" class="control-label">City</label>
                                            <div class="ui-select-wrapper form-group">
                                                <select id="city" class="form-control select-search-full ui-select ui-select select2-hidden-accessible" name="city_id">
                                                    <option value="">Alhambra</option>
                                                    <option value="">Oakland</option>
                                                    <option value="">Bakersfield</option>
                                                    <option value="">Anaheim</option>
                                                    <option value="">San Francisco</option>
                                                </select>
                                            </div>
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="">Location</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" id="location" class="form-control required_name" value="">
                                        </div>
                                        <div class="form-group">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3909.5325016133056!2d104.88496031412218!3d11.513608448303419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095062e8888a31%3A0xb76ac57b4c3cb2ac!2s131%2C%20Borey%20Piphop%20Thmey%2C%20Chamkar%20Doung%20Street%20(217)%2C%20Phnom%20Penh!5e0!3m2!1sen!2skh!4v1614301370684!5m2!1sen!2skh" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                        </div>
                    
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="number_block" class="control-label">Number blocks</label>
                                                <input id="number_block" class="form-control" placeholder="Number blocks" name="number_block" type="number" value="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="number_floor" class="control-label">Number floors</label>
                                                <input id="number_floor" class="form-control" placeholder="Number floors" name="number_floor" type="number" value="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="number_flat" class="control-label">Number flats</label>
                                                <input  id="number_flat" class="form-control" placeholder="Number flats" name="number_flat" type="number" value="">
                                            </div>
                                        </div>
                    
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="price_from" class="control-label">Lowest price</label>
                                                <input id="price_from" class="form-control input-mask-number" placeholder="Lowest price" name="price_from" type="text" value="">
                                                <span class="alertPrice_from" style="font-size:12px;"></span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="price_to" class="control-label">Max price</label>
                                                <input  id="price_to" class="form-control input-mask-number" placeholder="Max price" name="price_to" type="text" value="">
                                                <span class="alertPrice_to" style="font-size:12px;"></span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="currency_id" class="control-label">Currency</label>
                                                <div class="ui-select-wrapper form-group">
                                                    <select class="form-control select-full ui-select ui-select select2-hidden-accessible" id="currency" name="currency_id" tabindex="-1" aria-hidden="true">
                                                        <option value="">USD</option>
                                                        <option value="">VND</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="widget-title">
                                            <h4>
                                                <span> Distance key between facilities</span>
                                            </h4>
                                        </div>
                                        <hr>

                                        <div class="card p-3">
                                            <div class="widget-body">
                                                <div id="app-real-estate">
                                                    <div>
                                                        <div id="main">
                                                            <div class="selectFacility">
                                                                <div class="widget-body">
                                                                    <div id="app-real-estate">
                                                                        <div class="row getSelect">
                                                                            <div class="col-md-3 col-sm-5">
                                                                                <div class="form-group">
                                                                                    <div class="ui-select-wrapper">
                                                                                        <select class="ui-select form-control select_facility">
                                                                                            <option value="">Select facility</option>
                                                                                            <option value="1">Hospital</option>
                                                                                            <option value="2">Super Market</option>
                                                                                            <option value="3">School</option>
                                                                                            <option value="4">Entertainment</option>
                                                                                            <option value="5">Pharmacy</option>
                                                                                            <option value="6">Airport</option>
                                                                                            <option value="7">Railways</option>
                                                                                            <option value="8">Bus Stop</option>
                                                                                            <option value="9">Beach</option>
                                                                                            <option value="10">Mall</option>
                                                                                            <option value="11">Bank</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="col-md-3 col-sm-5">
                                                                                <div class="form-group">
                                                                                    <input id="distance" type="text" name="facilities[][distance]" placeholder="Distance (Km)" class="form-control distance" value="">
                                                                                </div>
                                                                            </div> 
                                                                            <div class="col-md-3 col-sm-2">
                                                                                <button type="button" class="btn btn-warning btnRemove" style="width: 50px;height: 50px;"><i class="fa fa-times"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-success bntAddNew">Add new</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="widget-title">
                                            <h4>
                                                <span>Features</span>
                                            </h4>
                                        </div>
                                        <hr>

                                        <div class="card p-3">
                                            <div class="widget-body">
                                                <label class="checkbox-inline">
                                                    <input class="checkAll" type="checkbox" value="1"> Wifi
                                                </label>&nbsp;&nbsp;
                                                <label class="checkbox-inline">
                                                    <input class="checkAll" type="checkbox" value="2"> Swimming pool
                                                </label>&nbsp;&nbsp;
                                                <label class="checkbox-inline">
                                                    <input class="checkAll" type="checkbox" value="3"> Balcony
                                                </label>&nbsp;&nbsp;
                                                <label class="checkbox-inline">
                                                    <input class="checkAll" type="checkbox" value="4"> Terrace
                                                </label>&nbsp;&nbsp;
                                                <label class="checkbox-inline">
                                                    <input class="checkAll" type="checkbox" value="5"> Parking
                                                </label>&nbsp;&nbsp;
                                                <label class="checkbox-inline">
                                                    <input class="checkAll" type="checkbox" value="6"> Garden
                                                </label>&nbsp;&nbsp;
                                                <label class="checkbox-inline">
                                                    <input class="checkAll" type="checkbox" value="7"> Security
                                                </label>&nbsp;&nbsp;
                                                <label class="checkbox-inline">
                                                    <input class="checkAll" type="checkbox" value="8"> Fitness center 
                                                </label>&nbsp;&nbsp;
                                            </div>
                                        </div>

                                        <div class="card p-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4><span>Search Engine Optimize</span></h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div style="text-align: right;">
                                                        <a href="javascript:" class="btbSEO"><span>Edit SEO meta</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                        
                                            <div class="seo-preview">
                                                <p class="default-seo-description">Setup meta title &amp; description to make your site easy to discovered on search engines such as Google</p>
                                            </div>
                        
                                            <div class="row hiddenTitle">
                                                <div class="col-md-12">
                                                    <hr>
                                                    <div class="form-group">
                                                        <label for="seo_title" class="control-label">SEO Title</label>
                                                        <input id="seo_title" class="form-control" placeholder="SEO Title" data-counter="120" type="text" value="">
                                                    </div>
                        
                                                    <div class="form-group">
                                                        <label for="seo_title" class="control-label">SEO description</label>
                                                        <textarea id="seo_descript" class="form-control" rows="3" placeholder="SEO description" data-counter="155" cols="50" value=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card p-3" style="text-align: right;">
                                            <div class="btn-set">
                                                <input type="hidden" name="" id="project_id" value="">
                                                <a href="" class="btn btn-secondary">Cancel</a>  
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
<script src="/js/my_app.js"></script>
<script>
    $(function(){
        alert(99);
    });
    var dataGlobal;
    // $(function(){
       
    //     $(".checkAll").on("click",function(){
    //         var arrChecke = [];
    //         $(".checkAll:checked").each(function(e){
    //             arrChecke[e]={
    //                 features : $(this).val()
    //             }
    //         });
    //         dataGlobal=null;
    //         dataGlobal=arrChecke;
    //     });

    //     var options = {
    //         filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    //         filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    //         filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    //         filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    //     };
    //     $('.textarea').ckeditor(options);
    //     var route_prefix = "/laravel-filemanager?type=Images";
    //     $('#image').filemanager('image', {prefix: route_prefix});
    //     // $('#image1').filemanager('image1', {prefix: route_prefix});
    //     var route_prefix1 = "/laravel-filemanager?type=Files";
    //     $('#image1').filemanager('file', {prefix: route_prefix1});

    //     $(".hiddenTitle").hide();
    //     $(".btbSEO").on("click" ,function(){
    //         $(".hiddenTitle").toggle();
    //     });

    //     $("#price_to").focusout(function () { 
    //         if(isNaN($(this).val())){
    //             $(".alertPrice_to").text("The price to must be a number.").css("color","red");
    //             $("#price_to").css("border-color","red");
    //         }else{
    //             $(".alertPrice_to").text("");
    //             $("#price_to").css("border-color","#ced4da");
    //         }
    //     });

    //     $("#price_from").focusout(function () { 
    //         if(isNaN($(this).val())){
    //             $(".alertPrice_from").text("The price from must be a number.").css("color","red");
    //             $("#price_from").css("border-color","red");
    //         }else{
    //             $(".alertPrice_from").text("");   
    //             $("#price_from").css("border-color","#ced4da");     
    //         }
    //     });

    //     $(".required_name").focus(function(){
    //         $(".required_name").css("border-color","#ced4da");
    //         $(".alertName").text("");
    //     });

    //     $(".btnSave").on('click',function(){
    //         FunctionSave();
    //     });

    //     $(".bntAddNew").on('click',function(){
    //         AddNewRecord();
    //     });

    //     $(".selectFacility").delegate(".btnRemove","click",function(){
    //         var tr = $(this).closest('.getSelect');
    //         tr.remove();
    //     });
    // });

    // function FunctionSave(){
    //     var arrFacility = [];
    //     $(".select_facility").each(function(e){
    //         var tr = $(this).closest('.getSelect');
    //         var thisInput = $(this).val();
    //         if(thisInput != ""){
    //             arrFacility[e] = {
    //                 select_facility : thisInput,
    //                 distance        : tr.find(".distance").val()
    //             }
    //         }
    //     });

    //     let num_miss = 0;
    //     $(".required_name").each(function(){
    //         if($(this).val() == ""){
    //             num_miss++;
    //         }
    //     });

    //     if(num_miss > 0){
    //         $(".alertName").text("The name field is required.").css("color","red");
    //         $(".required_name").css("border-color",'red');
    //     }else{
    //         let thislock = $('.btnSave').attr('is_lock');
    //         let setlock = parseInt(thislock)+1;
    //         $('.btnSave').attr('is_lock',setlock);
    //         let lock = $('.btnSave').attr("is_lock");
    //         if(lock == 1){
    //             $.ajax({
    //                 type: "POST",
    //                 url: "/dashboard/project/save",
    //                 data: {
    //                     project_id      : $("#project_id").val(),
    //                     name            : $("#name").val(),
    //                     plan            : thumbnail2.value,
    //                     descrition      : $("#description").val(),
    //                     content         : $("#content").val(),
    //                     city            : $("#city").val(),
    //                     location        : $("#location").val(),
    //                     image           : thumbnail.value,
    //                     number_block    : $("#number_block").val(),
    //                     number_floor    : $("#number_floor").val(),
    //                     number_flat     : $("#number_flat").val(),
    //                     price_from      : $("#price_from").val(),
    //                     price_to        : $("#price_to").val(),
    //                     currency        : $("#currency").val(),
    //                     arrFacility     : arrFacility,
    //                     features        : dataGlobal,
    //                     seo_title       : $("#seo_title").val(),
    //                     seo_descript    : $("#seo_descript").val()
    //                 },
    //                 success: function (response) {
    //                     if(response == 1){
    //                         toastr.success("Data has been save success","Message Title");
    //                         window.location.href="{{url('/dashboard/project/list')}}";
    //                     }
    //                 }
    //             });
    //         }
    //     }
    // }
    // function AddNewRecord(){
    //     var html = '<div class="widget-body">'+
    //                     '<div id="app-real-estate">'+
    //                         '<div>'+
    //                             '<div id="main">'+
    //                                 '<div class="form-group">'+
    //                                     '<div class="row getSelect">'+
    //                                         '<div class="col-md-3 col-sm-5">'+
    //                                             '<div class="form-group">'+
    //                                                 '<div class="ui-select-wrapper">'+
    //                                                     '<select class="ui-select form-control select_facility">'+
    //                                                         '<option value="">Select facility</option>'+
    //                                                         '<option value="1">Hospital</option>'+
    //                                                         '<option value="2">Super Market</option>'+
    //                                                         '<option value="3">School</option>'+
    //                                                         '<option value="4">Entertainment</option>'+
    //                                                         '<option value="5">Pharmacy</option>'+
    //                                                         '<option value="6">Airport</option>'+
    //                                                         '<option value="7">Railways</option>'+
    //                                                         '<option value="8">Bus Stop</option>'+
    //                                                         '<option value="9">Beach</option>'+
    //                                                         '<option value="10">Mall</option>'+
    //                                                         '<option value="11">Bank</option>'+
    //                                                     '</select>'+ 
    //                                                 '</div>'+
    //                                             '</div>'+
    //                                         '</div>'+ 
    //                                         '<div class="col-md-3 col-sm-5">'+
    //                                             '<div class="form-group">'+
    //                                                 '<input id="distance" type="text" name="facilities[][distance]" placeholder="Distance (Km)" class="form-control distance">'+
    //                                             '</div>'+
    //                                         '</div>'+ 
    //                                         '<div class="col-md-3 col-sm-2">'+
    //                                             '<button type="button" class="btn btn-warning btnRemove" data-id="1" style="width: 50px;height: 50px;"><i class="fa fa-times"></i></button>'+
    //                                         '</div>'+
    //                                     '</div>'+
    //                                 '</div>'+ 
    //                             '</div>'+
    //                         '</div>'+
    //                     '</div>'+
    //                 '</div>';
    //     $(".selectFacility").append(html);
    // }

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
</script>