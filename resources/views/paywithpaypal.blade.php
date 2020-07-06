@extends('layouts.app')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{URL::asset('assets/images/bg_1.jpg')}}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Payments</span></p>
            <h1 class="mb-0 bread">Payments</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						@if ($message = Session::get('success'))
						<div class="custom-alerts alert alert-success fade in">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
							{!! $message !!}
						</div>
						<?php Session::forget('success');?>
						@endif

						@if ($message = Session::get('error'))
						<div class="custom-alerts alert alert-danger fade in">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
							{!! $message !!}
						</div>
						<?php Session::forget('error');?>
						@endif
						<div class="panel-heading">Paywith Paypal</div>
						<div class="panel-body">
							<form class="form-horizontal" method="POST" id="payment-form" role="form" action="{{route('paypal')}}" >
								{{ csrf_field() }}

								<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
									<label for="amount" class="col-md-4 control-label">Amount</label>

									<div class="col-md-6">
										<input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>

										@if ($errors->has('amount'))
											<span class="help-block">
												<strong>{{ $errors->first('amount') }}</strong>
											</span>
										@endif
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-6 col-md-offset-4">
										<button type="submit" class="btn btn-primary">
											Paywith Paypal
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		 </section> 
 <!-- .section -->
 @endsection
 