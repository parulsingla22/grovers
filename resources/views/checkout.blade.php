@extends('layouts.app')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{URL::asset('assets/images/bg_1.jpg')}}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
	
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form method="post" action="{{route('orders')}}" class="billing-form">
						@csrf
							<h3 class="mb-4 billing-heading">Billing Details</h3>
							<div class="row align-items-end">
								<div class="col-md-12">
								<div class="form-group">
									<label for="firstname">Name</label>
								  <input type="text" name="fname" class="form-control" placeholder="">
								</div>
							  </div>
							 
							<div class="w-100"></div>
								
								<div class="w-100"></div>
								<div class="col-md-6">
									<div class="form-group">
									<label for="streetaddress">Address</label>
								  <input type="text" class="form-control" name="address" placeholder="required" Required>
								</div>
								</div>
							   
								<div class="w-100"></div>
								<div class="col-md-6">
								<div class="form-group">
									<label for="phone">Contact</label>
								  <input type="number" min="10" max="10" class="form-control" name="contact" placeholder="">
								</div>
							  </div>
							</div>
						</div>
								<div class="col-xl-5">
									<div class="row mt-5 pt-3">
										<div class="col-md-12 d-flex mb-5">
											<div class="cart-detail cart-total p-3 p-md-4">
											<h3 class="billing-heading mb-4">Cart Total</h3>
											<p class="d-flex">
												<span>Subtotal</span>
												<span>Rs.{{$carttotal['subtotal']}}</span>
												<input type="hidden" name="subtotal" value="{{$carttotal['subtotal']}}">
				
											</p>
											<p class="d-flex">
												<span>Delivery</span>
												<span>Rs.{{$carttotal['delivery']}}</span>
												
												<input type="hidden" name="delivery" value="{{$carttotal['delivery']}}">
											</p>
											<p class="d-flex">
												<span>Discount</span>
												<span>Rs.{{$carttotal['discount']}}</span>
												
												<input type="hidden" name="discount" value="{{$carttotal['discount']}}">
											</p>
											<hr>
											<p class="d-flex total-price">
												<span>Total</span>
												<span>Rs.{{$carttotal['total']}}</span>
												
												<input type="hidden" name="total" value="{{$carttotal['total']}}">
											</p>
											</div>
							</div>
							
							<div class="col-md-12">
								<div class="cart-detail p-3 p-md-4">
									<h3 class="billing-heading mb-4">Payment Method</h3>
									
												<div class="form-group">
													<div class="col-md-12">
													
													
													<!--div class="radio">
													<form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="https://www.sandbox.paypal.com/cgi-bin/webscr">
													  {{ csrf_field() }}
													  <h2 class="w3-text-blue">Payment Form</h2>
													  <p>Demo PayPal form - Integrating paypal in laravel</p>
													  <p>      
													  <label class="w3-text-blue"><b>Enter Amount</b></label>
													  <input  type="radio" class="w3-input w3-border" name="amount" type="text" value="{{$carttotal['total']}}"></p>      
													  <button class="w3-btn w3-blue">Pay with PayPal</button></p>
													</form>
													</div-->
														<div class="radio">
														   <label><input type="radio" name="optradio" class="mr-2">Cash on Delivery</label>
														</div>
													</div>
												</div>
												
												
												<div class="form-group">
													<div class="col-md-12">
														<div class="checkbox">
														   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
														</div>
													</div>
												</div>
												<p>
												<button class="btn btn-primary py-3 px-4">Place an order</button></p>
									</form>
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
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