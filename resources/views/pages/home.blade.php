@extends('layout.app')

@section('title')

    NOMADS

@endsection

@section('content')

<!-- Header -->
<header class="text-center">
	<h1>
		Explore the Beautifull World <br> Easy One Click
	</h1>
	<p class="mt-3"> you will know beautifull destination
		<br> you never see before 
    </p> 
    <a href="#popular-content" class="btn btn-get-started px-4 mt-4">
		Get Started
	</a> 
</header>
<!-- main content -->
<main>
	<!-- statistik -->
	<div class="container">
		<section class="section-stats row justify-content-center" id="stats">
			<div class="col-3 col-md-2 stats-detail">
				<h2>
						20k
					</h2>
				<p> Members </p>
			</div>
			<div class="col-3 col-md-2 stats-detail">
				<h2>
						12
					</h2>
				<p> Countries </p>
			</div>
			<div class="col-3 col-md-2 stats-detail">
				<h2>
						3k	
					</h2>
				<p> Hotel </p>
			</div>
			<div class="col-3 col-md-2 stats-detail">
				<h2>
						72
					</h2>
				<p> Partner </p>
			</div>
		</section>
	</div>
	<!-- Popular Destination -->
	<section class="section-popular" id="popular-content">
		<div class="container">
			<div class="row">
				<div class="col text-center section-popular-heading">
					<h2>
							Popular Destination
						</h2>
					<p> Something that you never try
						<br>before in this world </p>
				</div>
			</div>
		</div>
	</section>
	<section class="section-popular-content" >
		<div class="container">
			<div class="section-popular-travel row justify-content-center">
				@foreach ($items as $item)
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="card-travel text-center d-flex flex-column" style="background-size: cover; background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
							<div class="travel-country">{{$item->location}}</div>
							<div class="travel-location">{{$item->title}}</div>
							<div class="travel-button mt-auto"> <a href="{{ route('detail', $item->slug)}}" class="btn btn-travel-details px-4">
										View Details
									</a> </div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- Network -->
	<section class="section-network">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h2>
							Our Network
						</h2>
					<p> Companies are trusted us
						<br> more than just a trip </p>
				</div>
				<div class="col-md-8 text-center"> <img src="frontend/img/img-netw.png" alt="Logo Partner" class="img-partner"> </div>
			</div>
		</div>
	</section>
	<!-- testimoni -->
	<section class="section-testimoni-heading" id="testimonialHeading">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<h2>
							They Are Loving Us
						</h2>
					<p> Moments were giving them
						<br> the best experience </p>
				</div>
			</div>
		</div>
	</section>
	<section class="section-testimoni-content" id="testimonialContent">
		<div class="container">
			<div class="section-popular-travel row justify-content-center">
				<!-- testi 1 -->
				<div class="col-sm-6 col-md-6 col-lg-4">
					<div class="card card-testimoni text-center">
						<div class="testimoni-content"> <img src="frontend/img/testimoni1.png" alt="User" class="mb-4 rounded-circle">
							<h3 class="mb-4">Saddam HF</h3>
							<p class="testimoni"> " travel yang dapat mengerti membernya " </p>
						</div>
						<hr>
						<p class="trip-to mt-2"> Trip To Sumba, NTT, Indonesia </p>
					</div>
				</div>
				<!-- testi 1 -->
				<div class="col-sm-6 col-md-6 col-lg-4">
					<div class="card card-testimoni text-center">
						<div class="testimoni-content"> <img src="frontend/img/testimoni2.png" alt="User" class="mb-4 rounded-circle">
							<h3 class="mb-4">Nabilla N.M.</h3>
							<p class="testimoni"> " travel yang dapat mengerti membernya " </p>
						</div>
						<hr>
						<p class="trip-to mt-2"> Trip To Nusa Penida, Bali, Indonesia </p>
					</div>
				</div>
				<!-- testi 1 -->
				<div class="col-sm-6 col-md-6 col-lg-4">
					<div class="card card-testimoni text-center">
						<div class="testimoni-content"> <img src="frontend/img/testimoni3.png" alt="User" class="mb-4 rounded-circle">
							<h3 class="mb-4">Agoos</h3>
							<p class="testimoni"> " travel yang dapat mengerti membernya " </p>
						</div>
						<hr>
						<p class="trip-to mt-2"> Trip To Bromo, East Java, Indonesia </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 text-center"> <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
							I Need Help
						</a> <a href="{{route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">
							Get Started
						</a> </div>
			</div>
		</div>
	</section>
</main>

@endsection