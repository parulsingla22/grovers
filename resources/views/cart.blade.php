@extends('layouts.app')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{URL::asset('assets/images/bg_1.jpg')}}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
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
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
							<input type="hidden" value="{{$subtotal=0}}"/>
							@foreach($cart as $product)
								<tr class="text-center">
								
						        <td class="product-remove">
									<form method="POST" id="form1{{$product->id}}" action="{{route('cart.remove')}}" >
										@csrf
										<input name="id" type="hidden" value="{{$product->id}}">
										<a href="#" onclick="document.getElementById('form1{{$product->id}}').submit();" class="buy-now d-flex justify-content-center align-items-center mx-1"><span class="ion-ios-close"></span></a>
									</form>
								</td>
						        <td class="image-prod"><img src="{{URL::asset('images/products/')}}/{{$product->productimg}}" alt="This is an image" width="50px" height="50px"/></div></td>
						        
						        <td class="product-name">
						        	<h3>{{$product->name}}</h3>
						        </td>
						        @if($product->saleprice=="no")
									<td class="price">Rs.{{$product->price}}</td>
									<td class="quantity">
										<div class="input-group mb-3">
											<button type="button" name="quantity-left-minus" data-quantity="{{$product->id}}" class="quantity-left-minus">-</button>
												<input type="text" name="quantity" readonly id="quantity{{$product->id}}"  class="quantity form-control input-number" value="{{$product->quantity }}" min="1" max="100">
											
												<meta name="csrf-token" content="{{ csrf_token() }}">
											<button type="button" name="quantity-right-plus" data-quantity="{{$product->id}}" class="quantity-right-plus">+</button>
									</div>
								  </td>
								  <td class="total">{{'Rs' . $product->price * $product->quantity}}</td>
									  <input type="hidden" value="{{$subtotal=$subtotal+$product->price * $product->quantity}}"/>
								@else
									<td class="price">Rs.{{$product->saleprice}}</td>
									<td class="quantity">
										<div class="input-group mb-3">
											<button type="button" name="quantity-left-minus" data-quantity="{{$product->id}}" class="quantity-left-minus">-</button>
												<input type="text" name="quantity" readonly id="quantity{{$product->id}}"  class="quantity form-control input-number" value="{{$product->quantity }}" min="1" max="100">
											
												<meta name="csrf-token" content="{{ csrf_token() }}">
											<button type="button" name="quantity-right-plus" data-quantity="{{$product->id}}" class="quantity-right-plus">+</button>
									</div>
								  </td>
								  <td class="total">{{'Rs' . $product->saleprice * $product->quantity}}</td>
									  <input type="hidden" value="{{$subtotal=$subtotal+$product->saleprice * $product->quantity}}"/>
								 @endif
						      </tr><!-- END TR-->
							@endforeach
						       </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
			 @if(isset($coupon) && $coupon->count() > 0)
				 <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Coupon Code</h3>
    					<p>Enter your coupon code if you have one</p>
									@csrf
								<div class="form-group">
								<label for="">Coupon code</label>
								<input type="text" name="code" id="code" class="form-control text-left px-3" placeholder="" value="{{$coupon->promocode}}">
							  </div>
						
							<p>
							<button class="btn btn-primary py-3 px-4">Promocode Applied</button>
							</p>
						</form>
					</div>
				</div>
    			
			@else
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Coupon Code</h3>
    					<p>Enter your coupon code if you have one</p>
						<form class="info" method="get" action="{{route('coupon')}}" >
									@csrf
								<div class="form-group">
								<label for="">Coupon code</label>
								<input type="text" name="code" id="code" class="form-control text-left px-3" placeholder="" value="">
							  </div>
						
							<p>
							<button class="btn btn-primary py-3 px-4">Apply Coupon</button>
							</p>
						</form>
					</div>
				</div>
			@endif
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>Rs.{{$subtotal}}</span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span id="shipping">{{$delivery=20}}</span>
    					</p>
    					<!--p class="d-flex">
    						<span>Discount</span>
    						<span>Rs.{{$discount=5}}</span>
    					</p-->
						<p class="d-flex">
    						<span>Discount</span>
							 @if(isset($coupon) && $coupon->count() > 0)
    						<span>Rs.{{$discount=$coupon->discount}}</span>
							@else
							<span>Rs.{{$discount=0}}</span>
							@endif
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>Rs.{{$total=($subtotal+$delivery-$discount)}}</span>
    					</p>
    				</div>
					<div class="row">
						<div class="col-md-12">	
						<form action="{{route('checkout.carttotal')}}" method="get">
							@csrf
							<input type="hidden" name="subtotal"  id="subtotal" value="{{$subtotal}}">
							<input type="hidden" name="delivery"  id="delivery" value="{{$delivery}}">
							<input type="hidden" name="discount"  id="discount" value="{{$discount}}">
							
							<input type="hidden" name="total"  id="total" value="{{$total}}">
							
								<p><button class="btn btn-primary py-3 px-4">Proceed to Checkout</button></p>
						</form>
						</div>
						<div class="col-md-12">
							<p>
								<form action="{{route('cart.clear')}}" method="POST">
									@csrf
									<a href="#" class="btn btn-danger py-3 px-4">Clear Cart</a>
								</form>
							</p>
						</div>
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
					var id = $(this).data("quantity");
					var quant = "#quantity"+id;
		        var quantity = parseInt($(quant).val());
		       
		        // If is not undefined
		            
		            $(quant).val(quantity + 1);
					
		          var quantitynew = parseInt($(quant).val());
		       
				var token = $("meta[name='csrf-token']").attr("content");
		            // Increment
					$.ajax(
					{
						url: "{{route('cart.update')}}",
						type:"Post",
						data: {
							"id": id,
							"quantity":quantitynew,
							"_token": token,
						},
						success: function ($data){
							 window.location.reload();
						}
					});
					return false;
				});
					
		        
		    

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
				
					var id = $(this).data("quantity");
					var quant = "#quantity"+id;
		        var quantity = parseInt($(quant).val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $(quant).val(quantity - 1);
		            }
					
					var quantitynew = parseInt($(quant).val());
		       
					var token = $("meta[name='csrf-token']").attr("content");
					
					$.ajax(
					{
						url: "{{route('cart.update')}}",
						type:"Post",
						data: {
							"id": id,
							"quantity":quantitynew,
							"_token": token,
						},
						success: function ($data){
							 window.location.reload();
						}
					});
					return false;
		    });
		    
		});
	</script>
	
@endsection