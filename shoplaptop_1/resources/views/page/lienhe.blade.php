 @extends('master')
 @section('title')   
	Contact
@endsection
 @section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Contacts</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125317.66191195612!2d106.5869040563149!3d11.025348113916458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d17273d88fa1%3A0x4ce77ac2d75e8e4c!2zVHAuIFRo4bunIEThuqd1IE3hu5l0LCBCw6xuaCBExrDGoW5nLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2sus!4v1605159415568!5m2!1svi!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Contact Form</h2>
					<div class="space20">&nbsp;</div>
					
				    @if(Session::has('thongbao'))
				        <div class="alert alert-success" style="width: 100%">{{Session::get('thongbao')}}</div> 
				    @endif

					<div class="space20">&nbsp;</div>
					<form action="{{route('lienhe')}}" method="post" class="contact-form">	
						<div class="form-block">
							<input style="height: 50px" name="name" type="text" placeholder="Your Name (required)" required class="form-control"> 
						</div>
						<div class="form-block">
							<input style="height: 50px" name="email" type="email" placeholder="Your Email (required)" required class="form-control">
						</div>

						<div class="form-block">
							<textarea style="width: 60%" name="message" placeholder="Your Message" class="form-control" rows="8" cols="50"></textarea>
						</div>
						<div class="form-block">
							<button  type="submit" class="beta-btn primary">Send Message <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Contact Information</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa Chỉ</h6>
					<p>
						312/3/4 tổ 5 khu 3 Phú Hòa<br>
						
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Việc Làm</h6>
					<p>
						Chúng tôi luôn tìm kiếm những người tài năng<br>
						tham gia vào đội ngũ của mình.<br>
						<a href="mailto:npn0299@gmail.com">npn0299@gmail.com</a>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection