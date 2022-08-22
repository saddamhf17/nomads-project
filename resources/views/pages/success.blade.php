@extends('layout.success')

@section('title', 'Success')

@section('content')
<main>
	<div class="section-success d-flex align-items-center">
		<div class="col text-center"> <img src="{{ url('frontend/img/check.png') }}" height="175" alt="">
			<h1>Yay! Success</h1>
			<p> We've sent you email for trip Instruction
				<br> pleace read it as well </p> <a href="{{url('/')}}" class="btn btn-home-page mt-3 px-5">
                    Home Page
                </a> </div>
	</div>
</main>
@endsection