@extends('../layouts.app')
@section('content')
<div class="page-wrapper">
    <!-- ===== Page-Container ===== -->
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="white-box">
                        <section>
                            @if (RolePermission(1,1))
                                <a href="" class="btn btn-info">ADD</a>
                            @endif
                            <h3 class="box-title">Role</h3>
                            <ul class="list-group">
                                @foreach ($role as $key=>$rol)
                                    <li class="list-group-item d-flex justify-content-between align-items-center {{$key==0 ? "active" : ""}}" value="{{$rol->id ?? 0}}">
                                        {{$rol->name ?? ''}}
                                    </li>
                                @endforeach
                              </ul>
                        </section>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="white-box">
                        <section>
                            <h3 class="box-title">Permission</h3>
                            <div class="clearfix icon-list-demo">
                                <table class="table" id="tbl_role_permission">
                                    <thead>
                                        <tr>
                                            <th>Table</th>
                                            <th>View</th>
                                            <th>Add</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($table as $item)
                                            <tr>
                                                <td>{{$item->name ?? ''}}</td>
                                                <td><input type="checkbox" name="view" id="" onclick="addPermission(this,{{$item->id ?? 0}},4);" @if (($item->_view ?? 0)>0)
                                                    checked
                                                @endif></td>
                                                <td><input type="checkbox" name="add" id="" onclick="addPermission(this,{{$item->id ?? 0}},1);" @if (($item->_add ?? 0)>0)
                                                    checked
                                                @endif></td>
                                                <td><input type="checkbox" name="update" id="" onclick="addPermission(this,{{$item->id ?? 0}},2);" @if (($item->_update ?? 0)>0)
                                                    checked
                                                @endif></td>
                                                <td><input type="checkbox" name="delete" id="" onclick="addPermission(this,{{$item->id ?? 0}},3);" @if (($item->_delete ?? 0)>0)
                                                    checked
                                                @endif></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </section>
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
<script>
    function addPermission(e,table_id,id){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var position_id=0;
        $('section ul li').each(function(value){
            if($(this).hasClass('active')){
                position_id=$(this).val();
            }
        });
        if(e.checked){
            insert_update=1;
        }else{
            insert_update=0;
        }
        $.ajax({
            type:'POST',
            url:'/admin/permission',
            data:{
                _token: CSRF_TOKEN,
                table_id:table_id,
                permission_type_id:id,
                position_id:position_id,
                checked:insert_update
            },
            success:function(data){
               console.log(data.success);
            }
         });
    }
</script>
@endsection
