<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<base href="{{asset('')}}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">


	
</head>

<body>
	@extends('dk-dn-dx/dangky')
	@section('content-dk')
	@endsection

	@extends('dk-dn-dx/dangnhap')
	@section('content-dn')
	@endsection

	@extends('dk-dn-dx/dangxuat')
	@section('content-dx')
	@endsection

	@extends('dk-dn-dx/thongtin')
	@section('content-tt')
	@endsection




<!------------------------------------------giỏ hàng---------------------------------------------------------------------->


	<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a ><i class="fa fa-home"></i> 312/3/4 tổ 5 khu 3 Phú Hòa</a></li>
						<li><a ><i class="fa fa-phone"></i> 0773654031</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">

						<li><a href="" @if(Auth::check()) data-toggle="modal" data-target="#staticBackdrop_gh" @else data-toggle="modal" data-target="#staticBackdrop" @endif >Giỏ Hàng (
								@if(Session::has('cart') && Auth::check())
									{{Session('cart')->totalQty}} 
								
								@else

									Trống

								
								@endif)</a>
								@if(Auth::check() && Session::has('cart'))
								
								<div class="modal fade" id="staticBackdrop_gh" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel_gh" aria-hidden="true">
								  <div class="modal-dialog modal-xl">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h4 class="modal-title" id="staticBackdropLabel_gh"> Giỏ Hàng</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close">
								        
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">

								        <table id="cart11" class="table table-hover table-condensed"> 
											  	<thead> 
												   <tr> 
												    <th style="width:40%; text-align: center;">Tên sản phẩm</th> 
												    <th style="width:0%"></th> 
												    <th style="width:21%; text-align: center;">Số lượng</th> 
												    <th style="width:22%; text-align: center;" class="text-center">Giá</th> 
												    <th style="width:25%"> </th> 
												   </tr> 
											  	</thead> 
											  	<tbody>
										  			@foreach($product_cart as $poroduct)
											  		<tr> 
													   <td data-th="Product"> 
														    <div class="row" > 
															     <div>
															     	<img src="source/image/product/{{$poroduct['item']['image']}}" alt="" style="width: 80px; height: 80px; margin-left: 80px "  >
															     </div> 

															     <div class="col-sm-10" style="text-align: center;"> 
															      	<h6 class="nomargin">{{$poroduct['item']['name']}}</h6> 
															     </div> 
														    </div> 
													   	</td> 
													   <td data-th="Price"></td> 
													   <td data-th="Quantity" style="text-align: center;">
												   			x {{$poroduct['qty']}}
													   </td> 
													   <td data-th="Subtotal" class="text-center" style="text-align: center;">@if($poroduct['item']['promotion_price']==0){{number_format($poroduct['item']['unit_price'])}} VNĐ @else {{number_format($poroduct['item']['promotion_price'])}} VNĐ @endif</td> 
													   <td class="actions" data-th="" align="center">
													    <a class="btn btn-danger btn-sm" href="{{route('xoagiohang',$poroduct['item']['id'])}}"><i class="fa fa-trash-o"></i></a>
													   </td> 
												  	</tr> 
											  		@endforeach
											    </tbody>
											    <tfoot>  
												   	<tr> 
													    <td></td> 
													    <td colspan="2" class="hidden-xs"> </td>
													    <td class="hidden-xs text-center"><strong>Tổng tiền: {{Session('cart')->totalPrice}} VNĐ</strong></td> 
													    <td><a href="{{route('dathang')}}" class="btn btn-primary">Thanh toán</a>
													    </td> 
												   </tr> 
											  </tfoot> 
											</table>

								      </div>
								    </div>
							  	</div>
							  	@endif

						</li>
					@if(Auth::check())
						<li><a href="" data-toggle="modal" data-target="#userUpdate"><i class="fa fa-user"></i>Chào bạn {{Auth::user()->full_name}}</a></li>
						<li><a href="#" data-toggle="modal" data-target="#logoutModal">Đăng xuất</a></li>
					@else
						
						<li><a href="" data-toggle="modal" data-target="#staticBackdrop_dk">Đăng ký</a></li>
						<li><a href="" data-toggle="modal" data-target="#staticBackdrop">Đăng nhập</a></li>
						
						
					@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('trang-chu')}}" id="logo"><img src="source/assets/dest/images/logo-laptop.png" width="150px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
					        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>


	<!---------------------------------------------------------------------------------------------------------------------------->


				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
						<li><a >Sản phẩm</a>
							<ul class="sub-menu">
								@foreach($loai_sanpham as $lsp)
								<li><a href="{{route('loaisanpham', $lsp->id)}}">{{$lsp->name_type}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
						<li><a href="{{route('lienhe')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
	<div class="rev-slider">
		@yield('content')
	</div> <!-- .container -->

	<div id="footer" class="color-div">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">Instagram Feed</h4>
						<div id="beta-instagram-feed" hidden=""><div></div></div>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="widget">
						<h4 class="widget-title">Information</h4>
						<div>
							<ul>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Web Design</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Web development</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Marketing</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Tips</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Resources</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Illustrations</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
				 <div class="col-sm-10">
					<div class="widget">
						<h4 class="widget-title">Contact Us</h4>
						<div>
							<div class="contact-info">
								<i class="fa fa-map-marker"></i>
								<p>312/3/4 tổ 5 khu 3 Phú Hòa Bình Dương Phone: +84 773 654 031</p>
								<p></p>
							</div>
						</div>
					</div>
				  </div>
				</div>
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">Newsletter Subscribe</h4>
						<form action="#" method="post">
							<input type="email" name="your_email">
							<button class="pull-right" type="submit">Subscribe <i class="fa fa-chevron-right"></i></button>
						</form>
					</div>
				</div>
			</div> <!-- .row -->
		</div> <!-- .container -->
		
	</div> <!-- #footer -->
	<div class="copyright">
		<div class="container">
		<p class="pull-left">Privacy policy. (&copy;) 2020</p>
			<p class="pull-right pay-options">
				<a href="#"><img src="source/assets/dest/images/pay/master.jpg" alt="" /></a>
				<a href="#"><img src="source/assets/dest/images/pay/pay.jpg" alt="" /></a>
				<a href="#"><img src="source/assets/dest/images/pay/visa.jpg" alt="" /></a>
				<a href="#"><img src="source/assets/dest/images/pay/paypal.jpg" alt="" /></a>
			</p>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .copyright -->


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


	<!-- include js files -->
	<script src="source/assets/dest/js/jquery.js"></script>
	<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="source/assets/dest/vendors/dug/dug.js"></script>
	<script src="source/assets/dest/js/scripts.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="source/assets/dest/js/waypoints.min.js"></script>
	<script src="source/assets/dest/js/wow.min.js"></script>
	
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

	
    <script src="{{ asset('source/assets/dest/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

	<!--customjs-->
	<script src="source/assets/dest/js/custom2.js"></script>
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
	



</body>


</html>
