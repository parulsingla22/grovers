@extends('layouts.app')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{URL::asset('assets/images/bg_1.jpg')}}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Orders</span></p>
            <h1 class="mb-0 bread">My Orders</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Order ID</th>
								<th>Address</th>
								<th>Payment</th>
								<th>Options</th>
								<th></th>
						      </tr>
						    </thead>
						    <tbody>
								
								@foreach ($orders as $order)
								
								@if($order->userId==$userId)
								<tr class="text-center">
									<td class="order-id">{{ $order->orderId }}</td>
									
									<td class="order-address">{{ $order->address }}</td>
									<td class="order-payment">{{ $order->total }}</td>
									<td class="online-payment">
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
										<form class="form-horizontal" target="_blank" method="POST" id="payment-form" role="form" action="{{route('paypal')}}" >
										  {{ csrf_field() }}
													  <p>   
														<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
														@if ($errors->has('amount'))
															<span class="help-block">
																<strong>{{ $errors->first('amount') }}</strong>
															</span>
														@endif
													  <input  type="hidden" class="w3-input w3-border" name="amount"  value="{{$order->total}}"></p>      
													  <input type="submit" value="Online Payment"/></p>
										</form>
									</td>	
									<td>
										<form method="get" action="{{route('orderdetails')}}">
											<input  type="hidden" class="w3-input w3-border" name="orderid"id="orderid" value="{{ $order->orderId }}"></p>      
											<input type="submit" value="Order Detail"/></p>
										</form>
									</td>
									<!--td>
										<details>
											<summary>View Details<summary>
											<p>{{$order->name}}</p>
										</details>
									</td-->
								</tr><!-- END TR-->
								@endif
								@endforeach
						    </tbody>
						</table>
					  </div>
    			</div>
    		</div>
			</div>
		</section>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
@endsection