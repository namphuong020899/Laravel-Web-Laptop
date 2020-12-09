 @extends('admin/Admin')

@section('title-ad')   
    Order Management
@endsection

 @section('content-ad')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Order</h6>
        </div>
       
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT </th>
                            <th>Full Name </th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Note</th>
                            <th>Created At </th>
                            <th>Total Money</th>
                            <th>Payment Methods</th>
                            <th>Edit / Del</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT </th>
                            <th>Full Name </th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Note</th>
                            <th>Created At </th>
                            <th>Total Money</th>
                            <th>Payment Methods</th>
                            <th>Edit / Del</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($donhang as $key => $dh)
                        <tr>
                            <td>{{$key++}}</td>
                            <td>{{$dh->name}}</td>
                            <td>{{$dh->gender}}</td>
                            <td>{{$dh->email}}</td>
                            <td>{{$dh->address}}</td>
                            <td>{{$dh->phone_number}}</td>
                            <td>{{$dh->note}}</td>
                            <td>{{$dh->date_order}}</td>
                            <td>{{number_format($dh->total)}}</td>
                            <td>{{$dh->payment}}</td>
                            <td>
                                 <a href="{{route('donhangchitiet', $dh->id_bill)}}">
                                    <button class="btn btn-primary edit"  type="button">&nbsp;<i class="fas fa-info">&nbsp;</i></button>
                                </a><br><br>
                                <a href="{{route('deletedh', $dh->id_bill)}}">
                                <button class="btn btn-danger delete" data-toggle="modal" data-target="#dhDel" type="button"><i class="fas fa-trash-alt"></i></button>
                                </a>
                            </td>
                        </tr>
                       
                     <!-- Modal Delete-->
                        <!-- <div class="modal fade" id="dhDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ bỏ </button>
                                        
                                         <form method="POST" action="{{ route('deletedh', $dh->id_bill)}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="DELETE" /> 
                                            <button type="submit" class="btn btn-danger" data-toggle="modal"  data-target="#dhDel">
                                                Delete
                                            </button>
                                        </form>                          
                                       
                                        
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection