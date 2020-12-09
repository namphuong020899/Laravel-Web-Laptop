@extends('admin/Admin')
 @section('title-ad')
    Update User
@endsection
@section('content-ad')



        <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update</h1><br>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3"><a href="{{route('quanlynguoidung')}}">
            <button class="btn btn-primary"  type="button">
                <i class="fas fa-reply-all" aria-hidden="true"></i> Return
            </button></a><br>
        </div>
        <div class="card-body">
           <form action="{{route('update_admin', $user_up->id)}}" method="post">
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
                        <label style="font-weight: bold; color: #000">Full Name</label>
                        <input type="text" id="e_name" name="name" class="form-control" value="{{$user_up->full_name}}" />

                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold; color: #000">Address</label>
                        <input type="text" id="e_adress" required name="adress" class="form-control" value="{{$user_up->address}}" />
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold; color: #000">Email address</label>
                        <input type="text" id="e_email" required name="email" class="form-control" value="{{$user_up->email}}"/>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold; color: #000">Phone</label>
                        <input type="text" id="e_phone" required name="phone" class="form-control" value="{{$user_up->phone}}"/>
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
                        	<option <?php if($user_up->level==1)echo 'selected' ?> value="1">Administrator</option>
                        	<option <?php if($user_up->level==2)echo 'selected' ?> value="2">User</option>
                        </select>
                    </div>
                    <div class="modal-footer">
	                    <button type="submit" class="btn btn-primary"><i class="icofont icofont-check-circled"></i>Update</button>
	                </div>

                </div>
                
            </form>
        </div>
    </div>


@endsection
            