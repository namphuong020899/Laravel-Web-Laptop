 @extends('admin/Admin')
 @section('title-ad')
    Product management
@endsection
 @section('content-ad')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product</h6>
        </div>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <button class="btn btn-primary" data-toggle="modal"  data-target="#spAdd" type="button">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add
                </button><br><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center;">
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Promotion Price</th>
                            <th>Image</th>
                            <th>Type</th>
                            <th>New & Top</th>
                            <th>Edit / Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Promotion Price</th>
                            <th>Image</th>
                            <th>Type</th>
                            <th>New & Top</th>
                            <th>Edit / Delete</th>
                        </tr>
                    </tfoot>
                    <tbody style="text-align: center;">
                    @foreach($sanpham1 as $key => $sp)
                       <tr>
                            <td>{{$key++}}</td>
                            <td>{{$sp->name}}</td>
                            <td>{{$sp->description}}</td>
                            <td>{{$sp->unit_price}}</td>
                            <td>{{$sp->promotion_price}}</td>
                            <td><img src="source/image/product/{{$sp->image}}" alt="" width="100px"></td>

                            <td>{{$sp->loai}}</td>

                            <td>
                                @if($sp->new == 1)
                                    {{"New"}}
                                @else
                                    {{"Not New"}}
                                @endif

                            </td>

                            <td>
                                <a href="{{route('update_sp', $sp->id )}}">
                                    <button class="btn btn-primary edit"  type="button"><i class="fas fa-edit"></i></button>
                                </a><br><br>
                                <a href="{{route('deletensp', $sp->id )}}">
                                <button class="btn btn-danger delete" data-toggle="modal" data-target="#spDel" type="button"><i class="fas fa-trash-alt"></i></button>
                                </a>
                            </td>



                       
                        </tr>
                    @endforeach

                    </tbody>

                </table>

        </div>
    </div>

                    <!-- Modal Add-->
    <div class="modal fade" id="spAdd" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-write">
                    <h4 class="modal-title">Add New</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ti-close">&times;</i></span>
                    </button>
                </div>
                <form action="{{route('addnewsp')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label style="font-weight: bold; color: #000" >Name</label>
                            <input type="text" id="e_name" name="name" class="form-control"  />

                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold; color: #000" >Description</label>
                            
                            <textarea class="form-control" name="description" rows="5" cols="33"></textarea>

                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold; color: #000" >Unit Price</label>
                            <input type="text" id="e_unit_price" name="unit_price" class="form-control"  />


                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold; color: #000" >Promotion Price</label>
                            <input type="text" id="e_promotion_price" name="promotion_price" class="form-control"  />
                            

                        </div>
                         <div class="form-group" style="font-weight: bold; color: #000">
                            <label style="font-weight: bold; color: #000">New & Top</label>
                            <select name="new" class="form-control">
                                <option value="1">New</option>
                                <option value="0">Not New</option>
                            </select>
                        </div>
                        <div class="form-group" style="font-weight: bold; color: #000">
                            <label style="font-weight: bold; color: #000">Type</label>
                            <select name="type" class="form-control">
                                @foreach($type as $key=> $tpe)
                                    <option value="{{$tpe->id}}">{{$tpe->name_type}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label style="font-weight: bold; color: #000">Image</label>
                            <input type="file" id="e_image" name="image_file" class="form-control" multiple />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                        <button type="reset" class="btn btn-primary">Resest</button>
                        <button type="submit"  class="btn btn-primary"><i class="icofont icofont-check-circled"></i>Add</button>
                        

                    </div>
                </form>
            </div>
        </div>
    </div> 

                                                        <!-- Modal Delete-->
<!--                         <div class="modal fade" id="spDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                       
                                        <form method="" action="{{ route('deletensp', $sp->id)}}">
                   
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div> -->



@endsection