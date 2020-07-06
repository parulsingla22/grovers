@extends('layouts.app')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{URL::asset('assets/images/bg_1.jpg')}}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Wishlist</span></p>
            <h1 class="mb-0 bread">My Wishlist</h1>
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
								<th>Product Image</th>
								<th>Product Name</th>
								<th>Product Price</th>
						      </tr>
						    </thead>
						    <tbody>
								
								@foreach ($users as $wish)
								@if($wish->user_id==auth()->user()->id)
								<tr class="text-center">
									<td class="product-remove">
										<a href="{{route('wishlist.destroy', ['id' => $wish->product_id])}}">
											<span class="ion-ios-close"></span>
										</a>
									</td>
									
									<td class="image-prod">
										<img src="{{URL::asset('images/products/')}}/{{$wish->productimg}}" alt="This is an image" width="50px" height="50px"/>
									</td>
									
									<td class="product-name">
										<h3>{{ $wish->name }}</h3>
									</td>
									<td class="productprice">
									@if($wish->saleprice=="no")
									{{$wish->price}}
									@else
									{{$wish->saleprice}}
									@endif
									</td>
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