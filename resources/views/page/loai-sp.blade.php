@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$loaisp->TenLoai}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Sản phẩm</span>
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
							@foreach($tenloai as $tl)
							<li><a href="{{route('loai-sp',$tl->TenLoai)}}">{{$tl->TenLoai}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theoloai as $sp)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('san-pham',$sp->MaSP)}}"><img src="source/image/product/{{$sp->Hinh}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp->TenSP}}</p>
											<p class="single-item-price" >
												@if($sp->GiamGia==0)
													<span class="flash-sale" style="font-size: 18px">{{number_format($sp->DonGia)}} đồng</span>
												@else
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
													<span class="flash-del" style="font-size: 18px">{{number_format($sp->DonGia)}} đồng</span>
													<span class="flash-sale" style="font-size: 18px">{{number_format($sp->GiamGia)}} đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Giỏ hàng <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as$spk)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('san-pham',$spk->MaSP)}}"><img src="source/image/product/{{$spk->Hinh}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$spk->TenSP}}</p>
											<p class="single-item-price" >
												@if($spk->GiamGia==0)
													<span class="flash-sale" style="font-size: 18px">{{number_format($spk->DonGia)}} đồng</span>
												@else
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
													<span class="flash-del" style="font-size: 18px">{{number_format($spk->DonGia)}} đồng</span>
													<span class="flash-sale" style="font-size: 18px">{{number_format($spk->GiamGia)}} đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Giỏ hàng <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>

							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection