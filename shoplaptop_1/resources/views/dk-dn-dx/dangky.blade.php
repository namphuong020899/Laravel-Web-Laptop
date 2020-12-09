
@yield('content-dk')
<!--     Đăng Ký------------------------------------------------------------------------------------------------------>
	<div class="modal fade" id="staticBackdrop_dk" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel_dk" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title" id="staticBackdropLabel_dk"> Đăng Ký</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	        <form id="loginForm" method="POST" action="{{route('dangky')}}" novalidate="novalidate">
	        <input type="hidden" name="_token" value="{{csrf_token()}}">
				@if(count($errors)>0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
						{{$err}}<br>
						@endforeach
					</div>
				@endif
		       	<div class="form-group">
					<label for="email">Email address*</label>
					<input type="email" name="email" required>
				</div>

				<div class="form-group">
					<label for="your_last_name">Fullname*</label>
					<input type="text" name="fullname" required>
				</div>

				<div class="form-group">
					<label for="adress">Address*</label>
					<input type="text" name="adress" required>
				</div>


				<div class="form-group">
					<label for="phone">Phone*</label>
					<input type="text" name="phone" required>
				</div>
				<div class="form-group">
					<label for="phone">Password*</label>
					<input type="password" name="password" required>
				</div>
				<div class="form-group">
					<label for="phone">Re password*</label>
					<input type="password" name="re_password" required>
				</div>
		      
		       <button type="submit" style="width: 100%"  class="btn btn-primary">Đăng Ký</button>
		      
	      </form>

	      </div>
	    </div>
	  </div>
	</div>


