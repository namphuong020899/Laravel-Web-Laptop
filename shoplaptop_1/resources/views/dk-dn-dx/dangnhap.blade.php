@yield('content-dn')
	<!--     Đăng nhập-->
	<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title" id="staticBackdropLabel"> Đăng Nhập</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	        <form id="loginForm" method="POST" action="{{route('dangnhap')}}" novalidate="novalidate">
	        <input type="hidden" name="_token" value="{{csrf_token()}}">
		       @if(count($errors)>0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
							{{$err}}<br>
						@endforeach
					</div>
				@endif
		       <div class="form-group">
		       	<label for="username" class="control-label">Tài khoản</label>
		       	<input class="form-control" id="username" name="email" required value="" title="Xin vui lòng nhập tên tài khoản" placeholder="abc@gmail.com" type="text"><span class="help-block"></span> 
		       </div>
		       <div class="form-group">
		       	<label for="password" class="control-label">Mật khẩu</label>
		       	<input class="form-control" id="password" name="password" value="" required title="Xin vui lòng nhập mật khẩu" type="password"><span class="help-block"></span> 
		       </div>

		       <div class="sub-w3l">
					<div class="custom-control custom-checkbox mr-sm-2">
						<input type="checkbox" class="custom-control-input" name='remember' id="customControlAutosizing">
						<label class="custom-control-label" for="customControlAutosizing" >Nhớ Mật Khẩu?</label>
					</div>
				</div><br>
		       <button type="submit" style="width: 100%" class="btn btn-primary">Đăng nhập</button>
		       <a href="" data-toggle="modal" data-target="#staticBackdrop_dk" class="btn btn-default btn-block">Đăng Ký Ngay</a>
	      </form>

	      </div>
	    </div>
	  </div>
	</div>