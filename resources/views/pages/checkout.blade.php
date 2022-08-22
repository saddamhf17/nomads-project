@extends('layout.checkout')

@section('title', 'Checkout')

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
							<li class="breadcrumb-item"> Details </li>
							<li class="breadcrumb-item active"> Chekout </li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row">
				<!-- details -->
				<div class="col-lg-8 pl-lg-0">
					<div class="card card-detail">
						@if($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{$error}}</li>
									@endforeach
								</ul>
							</div>
						@endif

						<h1>Who is Going ?</h1>
						<p>Trip to {{$item->travel_package->title}}, {{$item->travel_package->location}}</p>
						<div class="attendee">
							<table class="table table-responsive-sm text-center">
								<thead>
									<tr>
										<td>Picture</td>
										<td>Name</td>
										<td>Nationality</td>
										<td>Visa</td>
										<td>Passport</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
									@forelse ($item->details as $detail)

									<tr>
										<td> 
											<img src="https://ui-avatar.com/api/?name={{ $detail->username }}" height="60" class="rounded-circle"> 
										</td>
										<td class="align-middle">
											{{$detail -> username}} 
										</td>
										<td class="align-middle"> 
											{{$detail -> nationality}} 
										</td>
										<td class="align-middle"> 
											{{$detail -> is_visa ? '30 Days' : 'N/A'}} 
										</td>
										<td class="align-middle"> 
											{{\Carbon\Carbon::createFromDate($detail->doe_passport) >
											\Carbon\Carbon::now() ? 'Active' : 'Inactive'}}	 
										</td>
										<td class="align-middle">
											<a href="{{route('checkout-remove', $detail->id)}}"> 
												<img src="{{ url('frontend/img/cancel.png') }}" height="20" alt=""> 
											</a>
										</td>
									</tr>
									@empty
									<tr>
										<td colspan="6" class="text-center">
											No Visitor
										</td>
									</tr>

									@endforelse
								</tbody>
							</table>
						</div>
						<div class="member mt-3">
							<h2>Add Member</h2>
							<form class="form-inline" action="{{route('checkout-create', $item->id)}}" method="post">
								@csrf
								<label for="username" class="sr-only">Name</label>
								<input type="text" class="form-control mb-2 mr-sm-2" required name="username" id="username" placeholder="Username" name="" id="">

								<label for="nationality" class="sr-only">Nationality</label>
								<input type="text" class="form-control mb-2 mr-sm-2" style="width: 50px" required name="nationality" id="nationality" placeholder="Nationality" name="" id="">

								<label for="is_visa" class="sr-only">Visa</label>
								<select name="is_visa" id="is_visa" required class="custom-select mb-2 mr-sm-2">
									<option value="" selected>Visa</option>
									<option value="1">30 Days</option>
									<option value="0">N/A</option>
								</select>
								<label for="doe_passport" class="sr-only">DOE Passport</label>
								<div class="input-group mb-2 mr-sm-2">
									<input type="text" class="form-control datepicker" id="doe_passport" name="doe_passport" placeholder="DOE Passport"> </div>
								<button type="submit" class="btn btn-add-now mb-2 px-4"> Add Now </button>
							</form>
							<h3 class="mt-2 mb-0">
										Note
									</h3>
							<p class="disclaimer mb-0"> blablablablablballablablaba </p>
						</div>
					</div>
				</div>
				<!-- right content -->
				<div class="col-lg-4">
					<div class="card card-detail card-right">
						<h2>Checkout information</h2>
						<table width="100%" class="trip-information">
							<tr>
								<th width="50%">Member</th>
								<td width="50%" class="text-right"> 
									{{$item -> details->count()}} Person 
								</td>
							</tr>
							<tr>
								<th width="50%">Additional Visa</th>
								<td width="50%" class="text-right">
									${{$item->additional_visa}},00 
								</td>
							</tr>
							<tr>
								<th width="50%">Trip Price</th>
								<td width="50%" class="text-right"> 
									${{$item->travel_package->price}},00 / person 
								</td>
							</tr>
							<tr>
								<th width="50%">Sub Total</th>
								<td width="50%" class="text-right">
									${{$item->transaction_total}},00 
								</td>
							</tr>
							<tr>
								<th width="50%">Total(+ Unique Code)</th>
								<td width="50%" class="text-right"> 
									<span class="text-blue">
										${{$item->transaction_total}}
									</span>
									<span class="text-orange">
										,{{mt_rand(0,99)}}
									</span> 
								</td>
							</tr>
						</table>
						<hr/>
						<h2>Payment Instruction</h2>
						<p class="payment-instruction">Pleace complete your payment</p>
						<div class="bank">
							<div class="bank-item pb-3"> <img src="{{ url('frontend/img/credit-card.png') }}" alt="" class="bank-img">
								<div class="description">
									<h3>PT Nomads ID</h3>
									<p> 8900 9800 7800
										<br/> Bank Central Asia </p>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="bank-item pb-3"> <img height="60" src="{{ url('frontend/img/credit-card.png') }}" alt="" class="bank-img">
								<div class="description">
									<h3>PT Nomads ID</h3>
									<p> 8900 9800 7821
										<br>Bank XYZ </p>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="join-container"> 
						<a href="{{ route('checkout-success', $item->id) }}" class="btn btn-block btn-join-now mt-3 py-2">I Have Made Payment</a> 
					</div>
					<div class="text-center mt-3"> 
						<a href="{{ route('detail', $item->travel_package->slug) }}" class="text-muted">
									Cancel Booking
						</a> 
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/lib/gijgo/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/lib/gijgo/js/gijgo.min.js') }}"></script>
	<!-- load xzoom -->
	<script>
		$(document).ready(function() {
			$('.datepicker').datepicker({
				format : 'yyyy-mm-dd',
				uiLibrary :'bootstrap4',
				icons:{
					rightIcon:'<img height="20" src="{{ url('frontend/img/date.png') }}"/>'
				}
			});
		});
	</script>
@endpush