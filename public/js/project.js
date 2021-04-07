

var dataGlobal;
$(function(){
    $(".checkAll").on("click",function(){
        var arrChecke = [];
        $(".checkAll:checked").each(function(e){
            arrChecke[e]={
                features : $(this).val()
            }
        });
        dataGlobal=null;
        dataGlobal=arrChecke;
    });

    $(".hiddenTitle").hide();
    $(".btbSEO").on("click" ,function(){
        $(".hiddenTitle").toggle();
    });

    $("#price_to").focusout(function () { 
        if(isNaN($(this).val())){
            $(".alertPrice_to").text("The price to must be a number.").css("color","red");
            $("#price_to").css("border-color","red");
        }else{
            $(".alertPrice_to").text("");
            $("#price_to").css("border-color","#ced4da");
        }
    });

    $("#price_from").focusout(function () { 
        if(isNaN($(this).val())){
            $(".alertPrice_from").text("The price from must be a number.").css("color","red");
            $("#price_from").css("border-color","red");
        }else{
            $(".alertPrice_from").text("");   
            $("#price_from").css("border-color","#ced4da");     
        }
    });

    $(".required_name").focus(function(){
        $(".required_name").css("border-color","#ced4da");
        $(".alertName").text("");
    });

    $(".btnSave").on('click',function(){
        FunctionSave();
    });

    $(".bntAddNew").on('click',function(){
        AddNewRecord();
    });

    $(".selectFacility").delegate(".btnRemove","click",function(){
        var tr = $(this).closest('.getSelect');
        tr.remove();
    });
});

function FunctionSave(){
    var arrFacility = [];
    $(".select_facility").each(function(e){
        var tr = $(this).closest('.getSelect');
        var thisInput = $(this).val();
        if(thisInput != ""){
            arrFacility[e] = {
                select_facility : thisInput,
                distance        : tr.find(".distance").val()
            }
        }
    });

    let num_miss = 0;
    $(".required_name").each(function(){
        if($(this).val() == ""){
            num_miss++;
        }
    });

    if(num_miss > 0){
        $(".alertName").text("The name field is required.").css("color","red");
        $(".required_name").css("border-color",'red');
    }else{
        let thislock = $('.btnSave').attr('is_lock');
        let setlock = parseInt(thislock)+1;
        $('.btnSave').attr('is_lock',setlock);
        let lock = $('.btnSave').attr("is_lock");
        if(lock == 1){
            $.ajax({
                type: "POST",
                url: "/admin/project",
                data: {
                    // project_id      : $("#project_id").val(),
                    csrf_token      : $("csrf-token").val(),
                    name            : $("#name").val(),
                    plan            : thumbnail2.value,
                    descrition      : $("#description").val(),
                    content         : $("#project_content").val(),
                    city            : $("#city").val(),
                    location        : $("#location").val(),
                    image           : thumbnail.value,
                    number_block    : $("#number_block").val(),
                    number_floor    : $("#number_floor").val(),
                    number_flat     : $("#number_flat").val(),
                    price_from      : $("#price_from").val(),
                    price_to        : $("#price_to").val(),
                    currency        : $("#currency").val(),
                    arrFacility     : arrFacility,
                    features        : dataGlobal,
                    seo_title       : $("#seo_title").val(),
                    seo_descript    : $("#seo_descript").val()
                },
                success: function (response) {
                    if(response == 1){
                        toastr.success("Data has been save success","Message Title");
                        window.location.href="{{url('/dashboard/project/list')}}";
                    }
                }
            });
        }
    }
}
function AddNewRecord(){
    var html = '<div class="widget-body">'+
                    '<div id="app-real-estate">'+
                        '<div>'+
                            '<div id="main">'+
                                '<div class="form-group">'+
                                    '<div class="row getSelect">'+
                                        '<div class="col-md-3 col-sm-5">'+
                                            '<div class="form-group">'+
                                                '<div class="ui-select-wrapper">'+
                                                    '<select class="ui-select form-control select_facility">'+
                                                        '<option value="">Select facility</option>'+
                                                        '<option value="1">Hospital</option>'+
                                                        '<option value="2">Super Market</option>'+
                                                        '<option value="3">School</option>'+
                                                        '<option value="4">Entertainment</option>'+
                                                        '<option value="5">Pharmacy</option>'+
                                                        '<option value="6">Airport</option>'+
                                                        '<option value="7">Railways</option>'+
                                                        '<option value="8">Bus Stop</option>'+
                                                        '<option value="9">Beach</option>'+
                                                        '<option value="10">Mall</option>'+
                                                        '<option value="11">Bank</option>'+
                                                    '</select>'+ 
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+ 
                                        '<div class="col-md-3 col-sm-5">'+
                                            '<div class="form-group">'+
                                                '<input id="distance" type="text" name="facilities[][distance]" placeholder="Distance (Km)" class="form-control distance">'+
                                            '</div>'+
                                        '</div>'+ 
                                        '<div class="col-md-3 col-sm-2">'+
                                            '<button type="button" class="btn btn-warning btnRemove" data-id="1" style="width: 50px;height: 50px;"><i class="fa fa-times"></i></button>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+ 
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
    $(".selectFacility").append(html);
}