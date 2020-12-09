 @extends('admin/Admin')
 @section('title-ad')
    NSX Management
@endsection
 @section('content-ad')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Producer Type</h6>
        </div>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{$err}}<br>
                @endforeach
            </div>
        @endif
         @if(Session::has('thongbao'))
            <div class="alert alert-success alert-dismissible" role="alert">{{Session::get('thongbao')}}</div> 
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <button class="btn btn-primary" data-toggle="modal"  data-target="#nsxAdd" type="button">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add
                </button><br><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center;">
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Updated</th>
                            <th>Edit / Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Updated</th>
                            <th>Edit / Delete</th>
                        </tr>
                    </tfoot>
                    <tbody style="text-align: center;">
                    @foreach($nsx as $key => $nsxx)
                       <tr>
                            <td>{{$key++}}</td>
                            <td>{{$nsxx->name_type}}</td>
                            <td>{{$nsxx->updated_at}}</td>

                            <td>
                                <a href="{{route('update_nsx', $nsxx->id )}}">
                                    <button class="btn btn-primary edit" type="button"><i class="fas fa-edit"></i></button>
                                </a>
                                <a href="{{route('deletensx', $nsxx->id )}}">
                                <button class="btn btn-danger delete"  type="button"><i class="fas fa-trash-alt"></i></button>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

                <!-- Modal Add-->
    <div class="modal fade" id="nsxAdd" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-write">
                    <h4 class="modal-title">Add New</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ti-close">&times;</i></span>
                    </button>
                </div>
                <form action="{{route('addnewnsx')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label style="font-weight: bold; color: #000" >Manufacturers Name</label>
                            <input type="text" id="e_name" name="name" class="form-control"  />

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                        <button type="submit"  class="btn btn-primary"><i class="icofont icofont-check-circled"></i>Add</button>

                    </div>
                </form>
            </div>
        </div>
    </div> 


        <!-- Modal Delete-->
<!--     <div class="modal fade" id="nsxDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn muốn xóa?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Delete" bên dưới nếu bạn đã chắc chắn muốn xóa.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ bỏ</button>
  
                    <form method="POST" action="{{ route('deletensx', $nsxx->id  )}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-danger" data-toggle="modal"  data-target="#nsxDel">
                            Delete
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div> -->

@endsection