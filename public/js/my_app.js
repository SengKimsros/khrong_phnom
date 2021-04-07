$(function(){
    // $('table').each(function(){
    //     $(this).DataTable();
    // });
    // role
    $('section ul li').on('click',function($key,value){
        $('section ul li').removeClass('active');
        $(this).addClass('active');

        $.ajax({
            type:'GET',
            url:'/admin/permission',
            data:{
                id:$(this).val()
            },
            success:function(data){
                $('#tbl_role_permission tbody').empty();
               $.each(data.success,function(index,value){
                    var view_check="";
                    var add_check="";
                    var update_check="";
                    var delete_check="";
                    if(value._view>0){
                        view_check="checked";
                    }

                    if(value._add>0){
                        add_check="checked";
                    }

                    if(value._update>0){
                        update_check="checked";
                    }
                    if(value._delete>0){
                        delete_check="checked";
                    }
                    var tr='<tr><td>'+value.name+'</td><td><input type="checkbox" name="view" id="" onclick="addPermission(this,'+value.id+',4);" '+view_check+'></td><td><input type="checkbox" name="view" id="" onclick="addPermission(this,'+value.id+',1);" '+add_check+'></td><td><input type="checkbox" name="view" id="" onclick="addPermission(this,'+value.id+',2);" '+update_check+'></td><td><input type="checkbox" name="view" id="" onclick="addPermission(this,'+value.id+',3);" '+delete_check+'></td></tr>';
                    $('#tbl_role_permission tbody').append(tr);
               });
            }
         });
    });
    // role
})
