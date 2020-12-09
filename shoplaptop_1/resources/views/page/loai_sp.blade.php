 @extends('master')
 @section('title')   
	Product Type
@endsection
 @section('content')
<div class="inner-header">
		<div class="container">
			
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>{{$loaisanpham->name_type}}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
					@foreach($loai as $sl)
						<li><a href="{{route('loaisanpham',$sl->id)}}">{{$sl->name_type}}</a></li>
					@endforeach
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>{{$loaisanpham->name}}</h4>
						<div class="beta-products-details">
							<p class="pull-left">{{count($sanpham_theoloai)}} styles found</p>
							<div class="clearfix"></div>
						</div>

						@if(count($sanpham_theoloai) > 0)
						<div class="row">
							@foreach($sanpham_theoloai as $sptl)
							<div class="col-sm-4">
								<div class="single-item">
									@if($sptl->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$sptl->id)}}"><img src="source/image/product/{{$sptl->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body"><br>
										<p class="single-item-title">{{$sptl->name}}</p>
										<p class="single-item-price">
											@if($sptl->promotion_price == 0)
												<span>{{$sptl->unit_price}}</span>
											@else
												<span class="flash-del">{{$sptl->unit_price}} VNĐ</span>
												<span class="flash-sale">{{$sptl->promotion_price}} VNĐ</span>
											@endif
										</p>
									</div><br>
									<div class="single-item-caption">

										<a class="add-to-cart pull-left" @if(Auth::check()) href="{{route('themgiohang',$sptl->id)}}" @else data-toggle="modal" data-target="#staticBackdrop" @endif><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$sptl->id)}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
										<div class="space50">&nbsp;</div>

										
									</div>
								</div>
							</div>
							@endforeach
							@endif
						</div>
						
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Other Products</h4>
						<div class="beta-products-details">
							<p class="pull-left">{{count($sanpham_khac)}} styles found</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
						@foreach($sanpham_khac as $spk)
							<div class="col-sm-4">
								<div class="single-item">
									@if($spk->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$spk->id)}}"><img src="source/image/product/{{$spk->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$spk->name}}</p>
										<p class="single-item-price">
											@if($spk->promotion_price == 0)
												<span>{{$spk->unit_price}}</span>
											@else
												<span class="flash-del">{{$spk->unit_price}} VNĐ</span>
												<span class="flash-sale">{{$spk->promotion_price}} VNĐ</span>
											@endif
										</p>
									</div><br>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" @if(Auth::check()) href="{{route('themgiohang',$sptl->id)}}" @else data-toggle="modal" data-target="#staticBackdrop" @endif><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$spk->id)}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div><br>
						<div class="row">{{$sanpham_khac->links()}}</div>
						<div class="space40">&nbsp;</div>
						
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection