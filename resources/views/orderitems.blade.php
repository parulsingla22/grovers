@extends('layouts.app')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{URL::asset('assets/images/bg_1.jpg')}}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Orders</span></p>
            <h1 class="mb-0 bread">My Orders Details</h1>
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
						        <th>Order Id</th>
								<th>Order Items</th>
								<th>Quantity</th>
								<!--th>Details</th-->
						      </tr>
						    </thead>
						    <tbody>
								
								@foreach ($orders as $orderitem)
								
								@if($orderitem->userId==$userId)
								<tr class="text-center">
									<td class="order-id">{{ $orderitem->orderId }}</td>
									
									<td class="order-address">{{ $orderitem->proname }}</td>
									<td class="order-payment">{{ $orderitem->quantity }}</td>
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