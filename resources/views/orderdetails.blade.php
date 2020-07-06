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
				<div class="col-md-6">
				<h1 style="color:green">Shipping Details</h1>
				<hr>
					<div class="row">
						<div class="col-md-6" style="color:green;font-size:20px;">OrderId</div>
						<div class="col-md-6" style="color:black"><h6>{{$orders[0]->orderId}}</h6></div>
						
						<div class="col-md-6" style="color:green;font-size:20px;">Name</div>
						<div class="col-md-6" style="color:black"><h6>{{$orders[0]->ordername}}</h6></div>
						
						<div class="col-md-6" style="color:green;font-size:20px;">Contact</div>
						<div class="col-md-6" style="color:black">{{$orders[0]->contact}}</div>
					
					
							<div class="col-md-12" style="color:green;font-size:20px;">Address</div>
							<div class="col-md-12" style="color:black">{{$orders[0]->address}}</div>
						</div>
					</div>
					
				<div class="col-md-6">
					<h1 style="color:green">Payment Details</h1>
				<hr>
				<div class="row">
					<div class="col-md-6" style="color:green;font-size:20px;">Discount</div>
					<div class="col-md-6" style="color:black"><h6>{{$orders[0]->discount}}</h6></div>
					
					<div class="col-md-6" style="color:green;font-size:20px;">Delivery</div>
					<div class="col-md-6" style="color:black"><h6>{{$orders[0]->delivery}}</h6></div>
					
					<div class="col-md-6" style="color:green;font-size:20px;">Subtotal</div>
					<div class="col-md-6" style="color:black">{{$orders[0]->amount}}</div>
					
					<div class="col-md-6" style="color:green;font-size:20px;">Total</div>
					<div class="col-md-6" style="color:black">{{$orders[0]->total}}</div>
					
				</div>
				</div>
			</div>
			
			<hr>
			<h1 style="color:green">Order Details</h1>
			<hr>
			
			<div class="row">
    			<div class="col-md-12 ftco-animate">
				
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						  
								<th>Order Items</th>
								<th>Products</th>
								<th>Quantity</th>
								<!--th>Details</th-->
						      </tr>
						    </thead>
						    <tbody>
								
								@foreach ($orders as $orderitem)
								
								@if($orderitem->userId==$userId)
								<tr class="text-center">
									
									<td class="order-address" style="color:black">{{ $orderitem->proname }}</td>
									<td><img src="{{URL::asset('images/products/')}}/{{$orderitem->productimg}}" alt="This is an image" width="50px" height="50px"/></td>
                                        
									<td class="order-payment" style="color:black">{{ $orderitem->quantity }}</td>
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

  
@endsection