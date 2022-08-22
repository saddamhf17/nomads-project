@extends('layout.app')

@section('title', 'Detail Travel')

@section('content')

<main>
	<section class="section-details-header"></section>
	<section class="section-details-content">
		<div class="container">
			<div class="row">
				<div class="col p-0">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"> Packet Travel </li>
							<li class="breadcrumb-item active"> Details </li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row">
				<!-- details -->
				<div class="col-lg-8 pl-lg-0">
					<div class="card card-detail">
						<h1>{{$item->title}}</h1>
						<p>{{$item->location}}</p>
						@if($item->galleries->count())
							<div class="gallery">
								<div class="xzoom-container"> 
									<img 
									src="{{ Storage::url($item->galleries->first()->image) }}" class="xzoom" id="xzoom-default" 
									xoriginal="{{ Storage::url($item->galleries->first()->image) }}" alt="">
									<div class="xzoom-thumbs">
										@foreach ($item->galleries as $gallery)
										<a href="{{ Storage::url($gallery->image)}}"> <img src="{{ Storage::url($gallery->image)}}" class="xzoom-gallery" width="128" xpreview="{{ Storage::url($gallery->image)}}" alt=""> </a>
										@endforeach
									</div>
								</div>
							</div>
						@endif
						<h2>
							Tentang Wisata
						</h2>
						<p>
							{{!! $item->about !!}}
						</p>
						<div class="features row">
							<div class="col-md-4"> <img src="{{ url('frontend/img/ticket.png') }}" class="features-image">
								<div class="description">
									<h3>Featured Event</h3>
									<p>{{$item->featured_event}}</p>
								</div>
							</div>
							<div class="col-md-4 border-left"> <img src="{{ url('frontend/img/chat.png') }}" class="features-image">
								<div class="description">
									<h3>Language</h3>
									<p>{{$item->language}}</p>
								</div>
							</div>
							<div class="col-md-4 border-left"> <img src="{{ url('frontend/img/dish.png') }}" class="features-image">
								<div class="description">
									<h3>Foods</h3>
									<p>{{$item->foods}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- right content -->
				<div class="col-lg-4">
					<div class="card card-detail card-right">
						<h2>Members are going</h2>
						<div class="members my-2"> <img src="{{ url('frontend/img/testimoni1.png') }}" alt="" class="member-image"> <img src="{{ url('frontend/img/testimoni2.png') }}" alt="" class="member-image"> <img src="{{ url('frontend/img/testimoni3.png') }}" alt="" class="member-image">
							<div class="member-image other-member text-center">+9</div>
						</div>
						<hr>
						<h2>Trip information</h2>
						<table width="100%" class="trip-information">
							<tr>
								<th width="50%">Date of Departure</th>
								<td width="50%" class="text-right">{{ \Carbon\Carbon::create($item->departure_date)->format('n F, Y') }}</td>
							</tr>
							<tr>
								<th width="50%">Duration</th>
								<td width="50%" class="text-right"> {{$item->duration}} </td>
							</tr>
							<tr>
								<th width="50%">Type</th>
								<td width="50%" class="text-right"> {{$item->type}} </td>
							</tr>
							<tr>
								<th width="50%">Price</th>
								<td width="50%" class="text-right"> ${{$item->price}},00 / person </td>
							</tr>
						</table>
					</div>
					<div class="join-container"> 
						@auth
						<form action="{{ route('checkout-process', $item->id) }}" method="post">
							@csrf
							<button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
								Join Now
							</button>
						</form>
						@endauth 
						@guest
							<a href="{{ url('login') }}" class="btn btn-block btn-join-now mt-3 py-2">
							Login or Register to Join
							</a>
						@endguest
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{url('frontend/lib/xzoom/xzoom.css')}}">
@endpush

@push('addon-script')
<script type="text/javascript" src="{{url('frontend/lib/xzoom/xzoom.min.js')}}"></script>
		<!-- load xzoom -->
	<script>
		$(document).ready(function() {
			$('.xzoom, .xzoom-gallery').xzoom({
				zoomWidth: 500,
				title : false,
				tint : '#333',
				xoffset : 15
			});
		});
    </script>
@endpush
