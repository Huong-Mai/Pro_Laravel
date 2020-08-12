@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">

			<form action="{{route('dang-ki')}}" method="post" class="beta-form-checkout">
                @csrf
				<div class="row">
					<div class="col-sm-3">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>

					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="your_last_name">Họ và tên*</label>
							<input type="text" name="fullname" >
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" name="adress"  >
						</div>

						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" >
						</div>

						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name="phone" >
						</div>
						<div class="form-block">
							<label for="username">Tên đăng nhập*</label>
							<input type="text" name="username">
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu*</label>
							<input type="password" name="password" >
						</div>
						<div class="form-block">
							<label for="phone">Nhập lại mật khẩu*</label>
							<input type="password" name="re_password" >
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng kí</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
