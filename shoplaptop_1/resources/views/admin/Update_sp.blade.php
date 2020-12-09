@extends('admin/Admin')
 @section('title-ad')
    Update Product
@endsection
@section('content-ad')



        <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update</h1><br>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3"><a href="{{route('quanlysanpham')}}">
            <button class="btn btn-primary"  type="button">
                <i class="fas fa-reply-all" aria-hidden="true"></i> Return
            </button></a><br>
        </div>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif

        <div class="card-body">
            <form action="{{route('update_sp', $sp_update->id)}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-body">
                    <div class="form-group">
                        <label style="font-weight: bold; color: #000" >Name</label>
                        <input type="text" id="e_name" name="name" class="form-control" value="{{$sp_update->name}}" />

                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold; color: #000" >Description</label>
                        <textarea class="form-control" id="e_description" name="description" rows="5" cols="33">{{$sp_update->description}}</textarea>

                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold; color: #000" >Unit Price</label>
                        <input type="text" id="e_unit_price" name="unit_price" class="form-control"  value="{{$sp_update->unit_price}}" />


                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold; color: #000" >Promotion Price</label>
                        <input type="text" id="e_promotion_price" name="promotion_price" class="form-control"  value="{{$sp_update->promotion_price}}" />
                        

                    </div>
                     <div class="form-group" style="font-weight: bold; color: #000">
                        <label style="font-weight: bold; color: #000">New & Top</label>
                        <select name="new" class="form-control">
                            <option value="1" <?php if($sp_update->new==0)echo 'selected' ?> >New</option>
                            <option value="0" <?php if($sp_update->new==1)echo 'selected' ?> >Not New</option>
                        </select>
                    </div>
                    <div class="form-group" style="font-weight: bold; color: #000">
                        <label style="font-weight: bold; color: #000">Type</label>
                        <select name="type" class="form-control">
                            @foreach($type as $key => $tpe)
                                @if($tpe->id == $sp_update->id_type)
                                    <option selected value="{{$tpe->id}}">{{$tpe->name_type}}</option>
                                @else
                                    <option value="{{$tpe->id}}">{{$tpe->name_type}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label style="font-weight: bold; color: #000">Image</label>
                        <input type="file" id="e_image" name="image" class="form-control" multiple /><br>
                        <img src="http://localhost:8081/shoplaptop_1/public/source/image/product/{{$sp_update->image}}" alt="" width="200px">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-primary">Resest</button>
                    <button type="submit"  class="btn btn-primary"><i class="icofont icofont-check-circled"></i>Update</button>
                   

                </div>
            </form>
        </div>
    </div>


@endsection
            