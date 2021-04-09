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
                            <h3 class="box-title m-b-0">Add Home</h3><br><br>
                            <div class="row">

                                <form enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Project Name</label>
                                            <span class="text-danger">*</span>
                                            <select name="project_id" id="id_project" class="form-control need-validate">
                                                <option value="" disabled selected>-- select project --</option>
                                                @foreach ($project as $item)
                                                    <option value="{{$item->id ?? 0}}" data="{{$item->plan ?? ''}}">{{$item->name ?? ''}}</option>
                                                @endforeach
                                            </select>
                                            <div class="text-sm text-danger d-none" id="text-project_id">This field is required !!</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="" style="white-space: nowrap;overflow: auto;" id="img">
                                            {{-- image block --}}
                                        </div>
                                    </div>
                                    {{-- hidden field --}}
                                        <input type="hidden" name="fm_height" value="" class="need-validate" id="text-fm_height">
                                        <input type="hidden" name="fm_width" value="" class="need-validate" id="text-fm_width">
                                        <input type="hidden" name="fm_top" value="" class="need-validate" id="text-fm_top">
                                        <input type="hidden" name="fm_left" value="" class="need-validate" id="text-fm_left">
                                    {{-- end hidden field --}}
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" name="title" class="form-control need-validate" value="{{$user['last_name'] ?? ''}}">
                                            <div class="text-sm text-danger d-none" id="text-title">This field is required !!</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <span class="text-danger">*</span>
                                            <input type="number" name="price" class="form-control need-validate" value="">
                                            <div class="text-sm text-danger d-none" id="text-price">This field is required !!</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Size</label>
                                            <span class="text-danger">*</span>
                                            <input type="number" name="size" class="form-control need-validate" value="">
                                            <div class="text-sm text-danger d-none" id="text-size">This field is required !!</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Bed Rooms</label>
                                            <span class="text-danger">*</span>
                                            <input type="number" name="bed_rooms" class="form-control need-validate" value="">
                                            <div class="text-sm text-danger d-none" id="text-bed_rooms">This field is required !!</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Bath Rooms</label>
                                            <span class="text-danger">*</span>
                                            <input type="number" name="bath_rooms" class="form-control need-validate" value="">
                                            <div class="text-sm text-danger d-none" id="text-bath_rooms">This field is required !!</div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <span class="text-danger">*</span>
                                            <input type="file" name="image" class="form-control need-validate" value="">
                                            <div class="text-sm text-danger d-none" id="text-image">This field is required !!</div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Content</label>
                                            <span class="text-danger">*</span>
                                            <textarea name="content" id="content" class="need-validate"></textarea>
                                            <div class="text-sm text-danger d-none" id="text-content">This field is required !!</div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="description" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 text-right">
                                        <a href="{{url('admin/user')}}" class="btn btn-danger">Cancel</a>
                                        <input type="submit" class="btn btn-info" name="submit" value="Submit">
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

        CKEDITOR.replace('content');
        var route_prefix1 = "/laravel-filemanager?type=Files";
        $('#Plan').filemanager('file', {prefix: route_prefix1});
    </script>

    <script>
       id_project.onchange=(e)=>{
           for(let i=0;i<e.target.length;i++){
               if(e.target[i].selected==true){
                   var image=e.target[i].getAttribute('data');
                   var project_id=e.target[i].getAttribute('value');
                    var img='<img src="'+image+'" alt="" id="toAnnotate" width="100%" height="100%">';
                    $('#img').html(img);
                    $.ajax({
                        type:'GET',
                        url:'/admin/gethomebyid/'+project_id,
                        async: false,
                        data:{
                            _token:'_token = <?php echo csrf_token() ?>',
                            id:this.value
                            },
                        success:function(data) {
                            $("#toAnnotate").annotateImage({
                                editable: true,
                                notes: data.note
                            });
                        }
                    });

                   return;
               }
           }

       }


       $(function(){
            $('form').on('submit',function(){
                event.preventDefault();
                var i=0;
                $('form input,button,textarea,select').each(function(){
                    if($(this).hasClass('need-validate')){
                        if($(this).val()=='' || $(this).val()==null){
                            i++;
                            $('#text-'+$(this).attr('name')).removeClass('d-none');
                            // toastr.error('Please input '+$(this).attr('name')+' field !!');
                        }else{
                            $('#text-'+$(this).attr('name')).addClass('d-none');
                        }
                }

                    }
                });
                if(document.querySelector('.image-annotate-add').style.display!="none"){
                    i++;
                }
                if(i>0){
                    toastr.error('Please input required field !!');
                    return ;
                }

                $.ajax({
                    url:"{{url('admin/home')}}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        console.log(data);
                    }
                })
            });
       });

    </script>
@endsection
