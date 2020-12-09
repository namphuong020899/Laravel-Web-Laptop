 @extends('admin/Admin')
@section('title-ad')
    Update Product Type
@endsection
 @section('content-ad')    

<h1 class="h3 mb-2 text-gray-800">Update</h1><br>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3"><a href="{{route('quanlynsx')}}">
            <button class="btn btn-primary"  type="button">
                <i class="fas fa-reply-all" aria-hidden="true"></i> Return
            </button></a><br>
        </div>
        <div class="card-body">
           <form action="" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
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

                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input type="text" id="e_name" name="name" class="form-control" value="{{$nsx_update->name_type}}" />
                        
                    </div>
                   
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="icofont icofont-check-circled"></i>Update</button>
                    </div>

                </div>
                
            </form>
        </div>
    </div>

@endsection
