@extends('master')
@section('content')

<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$sanpham->TenLoai}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Sản phẩm</span>/<span>{{$sanpham->TenLoai}}</span>
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
							<img src="source/image/product/{{$sanpham->Hinh}}" alt="#">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{$sanpham->TenSP}}</h2></p>
								<p class="single-item-price">
									@if($sanpham->GiamGia==0)
										<span class="flash-sale" style="font-size: 18px">{{number_format($sanpham->DonGia)}} đồng</span>
											@else
												
													<span class="flash-del" style="font-size: 18px">{{number_format($sanpham->DonGia)}} đồng</span>
													<span class="flash-sale" style="font-size: 18px">{{number_format($sanpham->GiamGia)}} đồng</span>
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
								<select class="wc-select" name="size">
									<option>Size</option>
									<option value="XS">XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
								</select>
								<select class="wc-select" name="color">
									<option>Color</option>
									<option value="Red">Red</option>
									<option value="Green">Green</option>
									<option value="Yellow">Yellow</option>
									<option value="Black">Black</option>
									<option value="White">White</option>
								</select>
								<select class="wc-select" name="color">
									<option>Số lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
							<li><a href="#tab-reviews">Đánh giá (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham->Mota}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sptuongtu as $sptt)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('san-pham',$sptt->MaSP)}}"><img src="source/image/product/{{$sptt->Hinh}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sptt->TenSP}}</p>
											<p class="single-item-price" >
												@if($sptt->GiamGia==0)
													<span class="flash-sale" style="font-size: 18px">{{number_format($sptt->DonGia)}} đồng</span>
												@else
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
													<span class="flash-del" >{{number_format($sptt->DonGia)}} đồng</span>
													<span class="flash-sale">{{number_format($sptt->GiamGia)}} đồng</span>
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
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản phẩm bán chạy</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($top_sanpham as $top)
								<div class="media beta-sales-item">
									<a href="{{route('san-pham',$top->MaSP)}}"><img src="source/image/product/{{$top->Hinh}}" alt=""></a>
									<div class="media-body">
										{{$top->TenSP}}
										<p class="single-item-price" style="font-size: 15px">
												@if($top->GiamGia==0)
													<span class="flash-sale">{{number_format($top->DonGia)}} đồng</span>
												@else
													<span class="flash-del">{{number_format(														$top->DonGia)}}đồng</span>
													<span class="flash-sale">{{number_format($top->GiamGia)}} đồng</span>
												@endif
										</p>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($new_sanpham as $new)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('san-pham',$new->MaSP)}}"><img src="source/image/product/{{$new->Hinh}}" alt=""></a>
									<div class="media-body">
										{{$new->TenSP}}
										<p class="single-item-price" style="font-size: 15px">
												@if($new->GiamGia==0)
													<span class="flash-sale">{{number_format($new->DonGia)}} đồng</span>
												@else
													<span class="flash-del">{{number_format(														$new->DonGia)}}đồng</span>
													<span class="flash-sale">{{number_format($new->GiamGia)}} đồng</span>
												@endif
										</p>
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