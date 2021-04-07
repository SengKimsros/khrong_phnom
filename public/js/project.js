
$(function(){
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
 
    $("#btnProject tbody").delegate('#btnDelete','click',function(){
        Swal.fire({
            title: 'Confirm Delete ?',
            text: "Are you sure want to delete ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#17a2b8',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                let delBy = $(this).data("id");
                $.ajax({
                    type: "DELETE",
                    url: "/admin/project/"+delBy,
                    success: function (response) {
                        if(response.success==1){
                            Swal.fire('Deleted!','data delete success.','success')
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });
});

function FunctionSave(){
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
                    project_id      : $("#project_id").val(),
                    csrf_token      : $("csrf-token").val(),
                    name            : $("#name").val(),
                    plan            : thumbnail2.value,
                    description     : $("#description").val(),
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
                    seo_title       : $("#seo_title").val(),
                    seo_descript    : $("#seo_descript").val()
                },
                success: function (response) {
                    if(response == 1){
                        toastr.success("Data has been save success","Message Title");
                        window.location.href="/admin/project";
                    }
                }
            });
        }
    }
}
