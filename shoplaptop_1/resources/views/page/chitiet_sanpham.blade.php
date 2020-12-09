@extends('master')
@section('title')   
	Product Details
@endsection
 @section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Product</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$sanpham->name}}</p><br>
								<p class="single-item-price">
									@if($sanpham->promotion_price == 0)
										<span>{{$sanpham->unit_price}}</span>
									@else
										<span class="flash-del">{{$sanpham->unit_price}} VNĐ</span>
										<span class="flash-sale">{{$sanpham->promotion_price}} VNĐ</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p></p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Options:</p>
							<div class="single-item-options">
								<select name="qty" class="wc-select">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
								<a class="add-to-cart pull-left" @if(Auth::check()) href="{{route('themgiohang',$sanpham->id)}}" @else data-toggle="modal" data-target="#staticBackdrop" @endif><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="">Description</a></li>
							
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham->description}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Related Products</h4><br>
						<div class="row">
							@foreach($tuongtu as $sptt)
							<div class="col-sm-4">
								<div class="single-item">
									@if($sptt->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$sptt->id)}}"><img src="source/image/product/{{$sanpham->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sanpham->name}}</p><br>
										<p class="single-item-price">
											@if($sptt->promotion_price == 0)
												<span>{{$sptt->unit_price}}</span>
											@else
												<span class="flash-del">{{$sptt->unit_price}} VNĐ</span>
												<span class="flash-sale">{{$sptt->promotion_price}} VNĐ</span>
											@endif
										</p>
									</div><br>
									<div class="single-item-caption">
										
										<a class="add-to-cart pull-left" @if(Auth::check()) href="{{route('themgiohang',$sptt->id)}}" @else data-toggle="modal" data-target="#staticBackdrop" @endif><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->id)}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div><br>
						<div class="row">{{$tuongtu->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sanpham_khuyenmai as $spkm)

								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$spkm->id)}}"><img src="source/image/product/{{$spkm->image}}" alt=""></a>
									<div class="media-body">
										{{$spkm->name}}<br>
										<span class="beta-sales-price">{{$spkm->unit_price}} VNĐ</span>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							
							<div class="beta-sales beta-lists">
								@foreach($new_product as $new)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt=""></a>
									<div class="media-body">
										{{$new->name}}<br>
										<span class="beta-sales-price">{{$new->unit_price}} VNĐ</span>
									</div>
								</div>
								@endforeach
							</div>
							
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection