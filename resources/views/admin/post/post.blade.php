@extends('../layouts.app')
@section('content')
<!-- Modal Delete User -->
<div class="modal fade" id="modal_delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Delete Post  !!!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="POST" id="fm_delete_user">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <div class="modal-body">

                <Strong>Are you sure ?</Strong>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-info">Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  {{-- end Modal Delete User --}}
<div class="page-wrapper">
    <!-- ===== Page-Container ===== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="text-align: right;">
                <div class="form-group">
                    @if (RolePermission(7,1))
                        <a href="{{url('admin/post/create')}}" class="btn btn-success" tabindex="0" type="button">
                            <span data-action="create"><i class="fa fa-plus"></i>{{__('Create New')}}</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div style="min-height: 525px;">
            <div class="white-box">
                <table id="btnPost" class="table table-large mb-0  nowrap w-100">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th style="text-align: center;">{{__('Actions')}}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($rows as $item)
                            <tr>
                                <th><img src="{{$item->slug}}" alt="" style="width: 60px;height: 60px;object-fit: cover;"></th>
                                <th style="padding-top: 30px;">{{$item->title}}</th>
                                <th >{{$item->content}}</th>
                                <th style="padding-top: 30px;text-align: center;">
                                    @if (RolePermission(7,2))
                                        <a href="{{url('admin/post')}}/{{$item->id}}/edit" data-id="{{$item->id}}" class="btn btn-primary btn-sm">{{__('Edit')}}</a>
                                    @endif
                                    @if (RolePermission(7,3))
                                        <a href="javascript:" id="btnDelete" class="btn btn-danger btn-sm" data-id="{{$item->id}}" >{{__('Delete')}}</a>
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
{{-- <script>
    function delete_user(id){
        $('#modal_delete_user').modal('show');
        $('#fm_delete_user').attr('action', '/admin/user/'+id);
    }
</script> --}}
@endsection
