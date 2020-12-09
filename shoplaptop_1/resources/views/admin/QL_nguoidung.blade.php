@extends('admin/Admin')
@section('title-ad')
    User Management
@endsection

@section('content-ad')





<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Users</h6>

    </div>
    @if(Session::has('thongbao'))
        <div class="alert alert-success" style="width: 100%">{{Session::get('thongbao')}}</div> 
    @endif

    <div class="card-body">
        <div class="table-responsive">
            <button class="btn btn-primary" data-toggle="modal" data-target="#userAdd" type="button">
                <i class="fa fa-plus" aria-hidden="true"></i> Add
            </button><br>
            <form>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center;">
                        <tr>
                            <th>STT</th>
                            <th>Full Name</th>
                            <th>Email </th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Level</th>
                            <th>Updated</th>
                            <th>Edit / Delete</th>
                        </tr>
                    </thead>
                    <br>
                    <tbody style="text-align: center;">
                        @foreach($user as $key => $usr)
                        <tr>
                            <td>{{$key++}}</td>
                            <td>{{$usr->full_name}}</td>
                            <td>{{$usr->email}}</td>
                            <td>{{$usr->phone}}</td>
                            <td>{{$usr->address}}</td>
                            <td>
                                <?php
                                if ($usr->level==1) {
                                    echo '<p style="color: blue; text-align: center"> Administrator</p>';
                                }
                                else
                                    echo '<p style="color: red; text-align: center">User</p>';
                                ?>
                            </td>
                            <td>{{$usr->updated_at}}</td>

                            <td>
                                <a href="{{route('update_admin',$usr->id)}}" class="btn btn-primary edit" type="button"><i class="fas fa-edit"></i></a><br><br>

                                <a href="{{route('delete',$usr->id)}}">
                                <button class="btn btn-danger delete" type="button"><i class="fas fa-trash-alt"></i></button>

                                </a>
            

                            </td>

                            
                            
                            

                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>

            </form>
        </div>
    </div>
 
</div>

<!-- Modal Add-->
<div class="modal fade" id="userAdd" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ti-close">&times;</i></span>
                </button>
            </div>
            <form action="{{route('addnew')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="text" hidden class="col-sm-9 form-control" id="idUpdate" name="idUpdate" value="" />
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
                @endif
                @if(Session::has('thongbao'))
                    <div class="alert alert-success" style="width: 100%">{{Session::get('thongbao')}}</div> 
                @endif
                <div class="modal-body">
                    <div class="form-group">
                        <label style="font-weight: bold; color: #000">Full Name</label>
                        <input type="text" id="e_name" name="name" class="form-control" />

                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold; color: #000">Address</label>
                        <input type="text" id="e_adress" required name="adress" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold; color: #000">Email address</label>
                        <input type="text" id="e_email" required name="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold; color: #000">Phone</label>
                        <input type="text" id="e_phone" required name="phone" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold; color: #000">Password</label>
                        <input type="password" id="e_password" required name="password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold; color: #000">Re password</label>
                        <input type="password" id="e_re_password" required name="re_password" class="form-control" />
                    </div>
                    <div class="form-group" style="font-weight: bold; color: #000">
                        <label style="font-weight: bold; color: #000">Level</label>
                        <select name="level" class="form-control">
                            <option value="2">User</option>
                            <option value="1">Administrator</option>
                        </select>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class="icofont icofont-check-circled"></i>Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Delete-->
<!-- <div class="modal fade" id="userDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  
                <form method="POST" action="{{ route('delete', $usr->id)}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#userDel">
                        Delete
                    </button>
                </form>

            </div>
        </div>
    </div>
</div> -->


@endsection