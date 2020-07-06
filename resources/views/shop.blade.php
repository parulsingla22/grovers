@extends('layouts.app')
@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url({{URL::asset('assets/images/bg_1.jpg')}})">
	
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					
    					<button class="filter-button" data-filter="*">All</button>
							@foreach($category as $cat)
    					<button class="filter-button" data-filter="{{$cat->name}}" >{{$cat->name}}</button>
						@endforeach
    				</ul>
    			</div>
    		</div>
    		<div class="row">
				@foreach($products as $product)
    			<div class="col-md-6 col-lg-3 ftco-animate filter {{$product->category}}">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="{{URL::asset('images/products/')}}/{{$product->productimg}}" alt="Colorlib Template">
    						<!--span class="status">30%</span-->
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">{{$product->name}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
									@if($product->saleprice=="no")
									<p class="price"><span class="price-sale">Rs.{{ $product->price }}</span></p>
									@else
		    						<p class="price"><span class="mr-2 price-dc">Rs.{{ $product->price }}</span><span class="price-sale">${{$product->saleprice}}</span></p>
									@endif
								</div>
	    					</div>
							<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
									<form method="POST" id="form1{{$product->id}}" action="{{route('products.single')}}" >
										@csrf
										<input name="pid" type="hidden" value="{{$product->id}}">
										<a href="#" onclick="document.getElementById('form1{{$product->id}}').submit();" class="add-to-cart d-flex justify-content-center align-items-center text-center">
											<span>
												<i class="ion-ios-menu"></i>
											</span>
										</a>
									</form>
									<form method="POST" id="form3{{$product->id}}" action="{{route('cart.add')}}" >
										@csrf
										<input name="id" type="hidden" value="{{$product->id}}">
										<a href="#" onclick="document.getElementById('form3{{$product->id}}').submit();" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span>
												<i class="ion-ios-cart"></i>
											</span>
										</a>
									</form>
									<form method="POST" id="form2{{$product->id}}" action="{{route('wishlist.store')}}" >
										@csrf
										<input name="pid" type="hidden" value="{{$product->id}}">
										<a href="#" onclick="document.getElementById('form2{{$product->id}}').submit();" class="heart d-flex justify-content-center align-items-center ">
										<span><i class="ion-ios-heart"></i></span></a>
									</form>
    							</div>
								
    						</div>
   
    					</div>
    				</div>
    			</div>
				@endforeach
			</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>
	<script>
	$(document).ready(function(){
	
    $(".filter-button").click(function(){
		
		$(".filter-button").css('background-color', 'white');
		$(this).css('background-color', '#82ae46');
		
        var value = $(this).attr('data-filter');
		
        
        if(value == "*")
        {
            $('.filter').addClass('fadeInUp');
            //$('.filter').show('1000');
        }
        else
        {   
			//$('.filter[filter-item="'+value+'"]').addClass('fadeInUp');
				//$(".filter").not('.filter[filter-item="'+value+'"]').removeClass('fadeInUp');
            $(".filter").not('.'+value).removeClass('fadeInUp');
            $('.filter').filter('.'+value).addClass('fadeInUp');
            
        }
    });

});
</script>
@endsection