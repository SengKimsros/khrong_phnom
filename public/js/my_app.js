$(function(){
    // role
    $('section ul li').on('click',function($key,value){
        $('section ul li').removeClass('active');
        $(this).addClass('active');
        $.ajax({
            method:'POST',
            url:'admin/permission',
            async:false,
            data:$(this).val(),
            success:function(data){
                console.log(data);
            }
        });
        console.log($(this).val());
    });
    // role
})
