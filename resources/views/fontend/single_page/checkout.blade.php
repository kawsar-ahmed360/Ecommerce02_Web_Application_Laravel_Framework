@extends('fontend/master')

@section('content')

<style type="text/css">
	ul li{
		line-height: 35px;
	}

	/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 100%;

  padding: 10px 12px;
  width: 100%;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}




button {
    border: none;
    border-radius: 4px;
    outline: none;
    text-decoration: none;
    color: #fff;
    background: #32325d;
    white-space: nowrap;
    display: inline-block;
    height: 40px;
    line-height: 40px;
    padding: 0 14px;
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
    border-radius: 4px;
    font-size: 15px;
    font-weight: 600;
    letter-spacing: 0.025em;
    text-decoration: none;
    -webkit-transition: all 150ms ease;
    transition: all 150ms ease;
    float: left;
    margin-left: 12px;
    margin-top: 28px;
}
</style>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/fontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Checkout Page
		</h2>
	</section>

  	<div class="bg0 p-t-40 p-b-40">
		<div class="container">

			@if(Session::has('success'))
                 <div class="alert alert-success">
                 	{{ Session::get('success') }}
                 </div>
			@endif

<form action="{{ route('CheckOutSave') }}" method="post" id="payment-form">

	@csrf


                 <h3 class="p-b-20" style="text-decoration: underline;"><b>Checkout Page</b></h3>

	    <div class="row">

{{-- ..........Shipping Info............ --}}

	
	

	      <div class="col-6">
	      	<h4 class="m-b-10" style="text-decoration: underline;">Shipping info:</h4>
	      		 <div class="col-md-6">
	    	 	 <label class=""><b><i>First Name:</i></b></label>
	    	 	  <div>
	    	 	  	 <input type="text" class="form-control" name="fname" placeholder="Enter your First Name...">
	    	 	  	 <font style="color:red">{{ ($errors->has('fname'))?($errors->first('fname')):"" }}</font>
	    	 	  </div>
	    	 </div>



	    	  <div class="col-md-6">
	    	 	 <label class="m-t-17"><b><i>Last Name:</i></b></label>
	    	 	  <div>
	    	 	  	 <input type="text" class="form-control" name="lname" placeholder="Enter your Last Name...">
	    	 	  	  <font style="color:red">{{ ($errors->has('lname'))?($errors->first('lname')):"" }}</font>
	    	 	  </div>
	    	 </div>


	    	  <div class="col-md-6">
	    	 	 <label class="m-t-17"><b><i>Email Adderss:</i></b></label>
	    	 	  <div>
	    	 	  	 <input type="text" class="form-control" name="email" placeholder="Enter your Email address...">
	    	 	  	  <font style="color:red">{{ ($errors->has('email'))?($errors->first('email')):"" }}</font>
	    	 	  </div>
	    	 </div> 

	    	 <div class="col-md-6">
	    	 	 <label class="m-t-17"><b><i>Mobile Number:</i></b></label>
	    	 	  <div>
	    	 	  	 <input type="text" class="form-control" name="mobile" placeholder="+880...">
	    	 	  	  <font style="color:red">{{ ($errors->has('mobile'))?($errors->first('mobile')):"" }}</font>
	    	 	  </div>
	    	 </div>

	    	  <div class="col-md-6">
	    	 	 <label class="m-t-17"><b><i>Your City:</i></b></label>
	    	 	  <div>
	    	 	  	 <input type="text" class="form-control" name="city" placeholder="City name...">
	    	 	  	  <font style="color:red">{{ ($errors->has('city'))?($errors->first('city')):"" }}</font>
	    	 	  </div>
	    	 </div> 

	    	 <div class="col-md-6">
	    	 	 <label class="m-t-17"><b><i>Address:</i></b></label>
	    	 	  <div>
	    	 	  	 <input type="text" class="form-control" name="address" placeholder="Address...">
	    	 	  	  <font style="color:red">{{ ($errors->has('address'))?($errors->first('address')):"" }}</font>
	    	 	  </div>
	    	 </div>
	    	 
	      </div>   


	       
	      		 

	   


{{-- .....................Porduct Details............. --}}

	      <div class="col-6">

	      	 <h4 class="m-b-10" style="text-decoration: underline;">Your Order Info:</h4>

	      	 @php
                  
                  $cart = Cart::content();
	      	 @endphp

	      	 <input type="hidden" value="{{ Cart::priceTotal() }}" name="total">

	      	  <ul>
	      	      <li><span><b>Total Product Bye &nbsp;&nbsp;&nbsp;&nbsp;: </b></span>{{ count($cart) }} PEC</li>
	      	      <li><span><b>SubTotal Ammount&nbsp;&nbsp;&nbsp;: </b> ${{ Cart::priceTotal() }}</span></li>
	      	      @if(Cart::discount())
                    <li><span><b>Discount Ammount&nbsp;&nbsp;&nbsp;:</b>$0</span></li>

	      	      @else
                    <li><span><b>Discount Ammount&nbsp;&nbsp;&nbsp;:</b>$0</span></li>
	      	      @endif
	      	      <li><span><b>Taxt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>$0</span></li>
	      	      <li><span><b>Total Subtotal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>{{ Cart::priceTotal() }}</span></li>
	      	      <li></li>
	      	      <li></li>
	      	  </ul>


	      	  <h4 style="text-decoration: underline;" class="m-t-20">Payment System</h4>
	      	     
	      	     <div class="col-md-6 m-t-20">
	      	     	<label><strong>Pyament System</strong></label>
	      	     	 <font style="color:red">{{ ($errors->has('payment'))?($errors->first('payment')):"" }}</font>
	      	     	<select name="payment" id="payment" class="form-control" >
	      	     		<option value="" disabled="" selected="">---Select Paymetn system--</option>
	      	     		<option value="Paypal">Paypal</option>
	      	     		<option value="Delivary">Cash-On-Delivary</option>
	      	     		<option value="Stripe">Stripe</option>
	      	     		<option value="Bikash">Bikash</option>
	      	     	</select>

	      	     {{-- ...................bikash transction number................ --}}

	      	      <div class="" id="bikashnumber" style="display: none">
	      	      	  <input type="text" class="form-control" name="transaction" placeholder="Enter your bikash Transction number...">
	      	      </div>

	      	     {{-- ........................end transaction number..................... --}}
	      	     
	      	     	<div class="" id="ammount" style="display: none">
	      	     		  <div class="form-row">
						    <label for="card-element">
						      Credit or debit card
						    </label>
						    <div id="card-element">
						      <!-- A Stripe Element will be inserted here. -->
						    </div>

						    <!-- Used to display form errors. -->
						    <div id="card-errors" role="alert"></div>
						  </div>
	      	     	</div>
	      	     </div>
                      <button type="submit">Submit Payment</button>

	      </div>

	      	     </form>
     </div>



      </div>			
	</div>			




@endsection

@section('footer')


<script type="text/javascript">
	$('#payment').on('change',function(){
		var paymetn = $(this).val();
		if (paymetn=='Stripe') {
			$('#ammount').show();
		}else{
			$('#ammount').hide();

		}
	});


	$('#payment').on('change',function(){
		var paymetn = $(this).val();
		if (paymetn=='Bikash') {
			$('#bikashnumber').show();
		}else{
			$('#bikashnumber').hide();

		}
	});
</script>

<script type="text/javascript">
	// Create a Stripe client.
var stripe = Stripe('pk_test_51HDTxYKJDCubtdTW1qsbVBWdIMGxDl9tE6c0JmqOIaD4hu78YSbRAW5mvbfi9Q5uq5Gy2pNUJI0Za4Zd99n5hHLU00HXdIITE4');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>

@endsection
