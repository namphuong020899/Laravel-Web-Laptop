@extends('admin/Admin')
@section('title-ad')
    Slide Management
@endsection
 @section('content-ad')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Slide</h6>
        </div>
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
        <div class="card-body">
            <div class="table-responsive">
                <button class="btn btn-primary" data-toggle="modal"  data-target="#slideAdd" type="button">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add
                </button><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center;">
                        <tr>
                            <th>STT</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Updated</th>
                            <th>Edit / Delete</th>
                        </tr>
                    </thead>
                    <br>
                    <tbody style="text-align: center;">
                    @foreach($slide as $key => $sl)
                       <tr>
                            <td>{{$key++}}</td>
                            <td>{{$sl->link }}</td>
                            <td><img src="source/image/slide/{{$sl->image}}" alt="" width="200px"></td>
                            <td>{{$sl->updated_at}}</td>

                            <td>
                                <a href="{{route('update_slide',$sl->id )}}">
                                    <button class="btn btn-primary edit" type="button"><i class="fas fa-edit"></i></button>
                                </a>
                                <a href="{{route('deleteslide',$sl->id )}}">
                                <button class="btn btn-danger delete" type="button"><i class="fas fa-trash-alt"></i></button>
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
    <div class="modal fade" id="slideAdd" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-write">
                    <h4 class="modal-title">Add New</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ti-close">&times;</i></span>
                    </button>
                </div>
                <form action="{{route('addnewslide')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label style="font-weight: bold; color: #000" >Link</label>
                            <input type="text" id="e_link" name="link_slide" class="form-control"  />

                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold; color: #000">Image</label>
                            <input type="file" id="e_image" name="image_file" class="form-control" multiple />
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
<!--     <div class="modal fade" id="slideDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                    <form method="POST" action="{{ route('deleteslide', $sl->id  )}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-danger" data-toggle="modal"  data-target="#slideDel">
                            Delete
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div> -->


@endsection