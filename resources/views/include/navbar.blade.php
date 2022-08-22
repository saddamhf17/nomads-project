<!-- Navbar -->
<div class="container">
	<!--start navbar-->
	<nav id="hnav" class="row navbar navbar-expand-lg navbar-light bg-white">
		<a href="#" id="logo" class="navbar-brand"> <img sizes="" src="{{ url('frontend/img/logo.png') }}" alt="Logo Nomads"> </a>
		<!--Start toggler-->
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb"> <span class="navbar-toggler-icon"></span> </button>
		<!--end toggler-->
		<div id="navb" class="collapse navbar-collapse">
			<ul class="navbar-nav ml-auto mr-3">
				<li class="nav-item mx-md-2 "> <a href="{{url('home')}}" class="nav-link active">Home</a> </li>
				<li class="nav-item mx-md-2 "> <a href="" class="nav-link">Paket Travel</a> </li>
				<li class="nav-item mx-md-2 dropdown "> <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
								Services
							</a>
					<div class="dropdown-menu"> <a href="#" class="dropdown-item">link</a> <a href="#" class="dropdown-item">link</a> <a href="#" class="dropdown-item">link</a> </div>
				</li>
				<li class="nav-item mx-md-2 "> <a href="" class="nav-link">Testimonial</a> </li>
			</ul>

			@guest
			<!-- mobile button -->
			<form action="" class="form-inline d-sm-block d-md-none">
				@csrf
				<button class="btn btn-login my-2 my-ms-0 px-4" type="button"
				onclick="event.preventDefault(); location.href='{{url('login')}}';"> Masuk </button>
			</form>
			<!-- desktop button -->
			<form action="" class="form-inline my-lg-0 d-none d-md-block">
				@csrf	
				<button class="btn btn-login btn-navbar-right my-2 my-ms-0 px-4" type="button"
				onclick="event.preventDefault(); location.href='{{url('login')}}';"> Masuk </button>
			</form>
			@endguest

			@auth
			<!-- mobile button -->
			<form class="form-inline d-sm-block d-md-none" action="{{url('logout')}}" method="POST">
				@csrf
				<button class="btn btn-login my-2 my-ms-0 px-4" type="submit"> Logout </button>
			</form>
			<!-- desktop button -->
			<form class="form-inline my-lg-0 d-none d-md-block" action="{{url('logout')}}" method="POST">
				@csrf
				<button class="btn btn-login btn-navbar-right my-2 my-ms-0 px-4" type="submit"> Logout </button>
			</form>
			@endauth
		</div>
	</nav>
	<!--end navbar-->
</div>