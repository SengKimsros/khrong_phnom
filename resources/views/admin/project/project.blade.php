@extends('../layouts.app')
@section('content')

<div class="page-wrapper">
    <!-- ===== Page-Container ===== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="text-align: right;">
                <div class="form-group">
                    @if(RolePermission(1,1))
                        <a href="{{url('admin/project/create')}}" class="btn btn-success" tabindex="0" type="button">
                            <span data-action="create"><i class="fa fa-plus"></i> Create New</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div style="min-height: 525px;">
            <div class="white-box">
                <table id="btnProject" class="table table-large mb-0  nowrap w-100 table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>CreatedAt</th>
                            <th class="text-center">Status</th>
                            <th style="text-align: center;">{{__('Actions')}}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($row as $item)
                            <tr>
                                <th><img src="{{$item->image}}" alt="" style="width: 60px;height: 60px;object-fit: cover;"></th>
                                <th style="padding-top: 30px;"> <a href="javascript:">{{$item->name}}</a> </th>
                                <th style="padding-top: 30px;">{{  $newDate = date("d-m-Y", strtotime($item->created_at)) }}</th>
                                <td class="align-middle text-center">{{$item->status}}</td>
                                <th style="padding-top: 30px;text-align: center;">
                                    @if (RolePermission(1,2))
                                        <a href="{{url('admin/project')}}/{{$item->id}}/edit" id="btnEdit" data-id="{{$item->id}}" class="btn btn-primary btn-sm">{{__('Edit')}}</a>
                                    @endif
                                    @if (RolePermission(1,3))
                                        <a href="javascript:" id="btnDelete" data-id="{{$item->id}}" class="btn btn-danger btn-sm">{{__('Delete')}}</a>
                                    @endif
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- ===== Page-Container-End ===== -->
    <footer class="footer t-a-c">
        © 2017 Cubic Admin
    </footer>
</div>
@endsection

