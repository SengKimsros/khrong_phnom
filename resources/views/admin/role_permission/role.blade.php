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
                            {{-- @dump($table) --}}
                            <div class="clearfix icon-list-demo">
                                <table class="table">
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
                                                <td><input type="checkbox" name="view" id="" onclick="addPermission(1,2);"></td>
                                                <td><input type="checkbox" name="add" id=""></td>
                                                <td><input type="checkbox" name="update" id=""></td>
                                                <td><input type="checkbox" name="delete" id=""></td>
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
    function addPermission(table_id,id){
        var position_id=0;
        $('section ul li').each(function(value){
            if($(this).hasClass('active')){
                position_id=value+1;
            }
        });
        alert(position_id);
    }
</script>
@endsection
