
$(function(){

    $(".required_name").focus(function(){
        $(".required_name").css("border-color","#ced4da");
        $(".alertName").text("");
    });

    $(".btnSavePost").on('click',function(){
        savePost();
    });
 
    $("#btnPost tbody").delegate('#btnDelete','click',function(){
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
                    url: "/admin/post/"+delBy,
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

function savePost(){
    let num_miss = 0;
    $(".required_name").each(function(){
        if($(this).val() == ""){
            num_miss++;
        }
    });

    if(num_miss > 0){
        $(".alertName").text("The title field is required.").css("color","red");
        $(".required_name").css("border-color",'red');
    }else{
        let thislock = $('.btnSavePost').attr('is_lock');
        let setlock = parseInt(thislock)+1;
        $('.btnSavePost').attr('is_lock',setlock);
        let lock = $('.btnSavePost').attr("is_lock");
        if(lock == 1){
            $.ajax({
                type: "POST",
                url: "/admin/post",
                data: {
                    post_id         : $("#post_id").val(),
                    title           : $("#post_title").val(),
                    slug            : thumbnail1.value,
                    content         : $("#content").val(),
                    post_thumbnail  : thumbnail2.value,
                },
                success: function (response) {
                    if(response == 1){
                        toastr.success("Data has been save success","Message Title");
                        window.location.href="/admin/post";
                    }
                }
            });
        }
    }
}
