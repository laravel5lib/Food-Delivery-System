<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Software Engineer</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->		

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- bootstrap <link href="{{ asset('') }}" rel="stylesheet"/> -->
		<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet"/> 
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/> 
		<link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet"/> 
		<link href="{{ asset('css/bootstrappage.css') }}" rel="stylesheet"/> 


			
	    <!-- Loading Flat UI -->
	    <!--<link href="css/flat-ui.css" rel="stylesheet">-->
		

		<!-- global styles -->
		<link href="{{ asset('css/flexslider.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/nav.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/browse.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/payment.css') }}" rel="stylesheet"/>

		<!-- scripts -->
		<script src="{{ asset('js/jquery-1.7.2.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/superfish.js') }}"></script>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>


		<!-- scorll magic -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>
	</head>
    <body>		
    	<!-- class top contain picture-->
		<div class="container">
			<div id="trigger"></div>
			<div class="navbar navbar-fixed-top">
				<div class="navbar-inner main-menu span12">
					<img src="{{ asset('images/logo.png') }}" class="logo pull-left">
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="{{ url('browse') }}">Browse</a></li>
							<li><a href="#">Meal</a>
								<ul>
									<li><a href="{{ url('/browse/vegan') }}">Vegan</a></li>
									<li><a href="{{ url('/browse/islamic') }}">Isalmic</a></li>
									<li><a href="{{ url('/browse/meal') }}">All Meal</a></li>
								</ul>
							</li>
							<li><a href="{{ url('/browse/dessert') }}">Dessert</a></li>
							<li><a href="{{ url('/browse/drink') }}">Drink</a></li>
							<li><a href="#">Search</a>
								<ul>
									<li id="search">
									<form method="get" action="{{ url('/browse/search/') }}">
										<input type="search" name="search" placeholder="search">
										<input type="submit" style="display:none;"/>
									</form>
									</li>

								</ul>
							</li>
							<li>
							@if (Auth::check())
							 	<a href="#">{{Auth::user()->username}}</a>
							 	<ul>
							 		<li>
							 			<a href="{{ url('logout') }}"
		                                    onclick="event.preventDefault();
		                                             document.getElementById('logout-form').submit();">
		                                    Logout
		                                </a>

		                                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
		                                    {{ csrf_field() }}
		                                </form>
							 		</li>
							 	</ul>
							 </li>
							@else
							 	<a href="{{ url('login') }}">Login</a></li>
							@endif
						</ul>
					</nav>
				</div>
			</div>

		</div>

		<!-- content of payment page-->
		<div class="container content payment" > <!--class payment-->
			<div>
				<div class="payment-option">
					<div class="payment-header">
						<h2>Pay</h2>
					</div>
					<div>
							<h4 >username :</h4>
							<h5  style="margin-left: 50px;" id="username">{{Auth::user()->username}}</h5>
						
							<h4 >Amount :</h4>
							<h5 style="margin-left: 50px;" id="amount">{{$cost}}</h5>
						
							<h4>Bank :</h4>
							<select style="margin-left: 50px;" name="bank_name" id="bank">
								<option value="null">select Bank</option>
								<option value="bank">CESE BANK</option>
							</select>

							<h4 >Account number :</h4>
							<input style="height: 27px;margin-left:50px;" type="text" id="account" maxlength="10" size="10" placeholder="Account number" name="bank_account"></input>
							
							<h4>Enter OTP :</h4>
							<input  id="otp" maxlength="6" size="6" placeholder=" OTP"  style="width:60px; margin-left: 50px;" name="bank_otp"></input>
					</div>
				</div>
			</div>

			<!-- Place Order btn-->
			<div class="span4 btn-accept">
	  			<button class="btn btn-block btn-lg btn-danger" id="placeOrder" onclick="callBank()">Pay now</button> 
			</div>
		</div>			

		<div class="footer container"></div>
		<script src="{{ asset('js/common.js') }}"></script>
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/flat-ui.min.js') }}"></script>
		<script src="{{ asset('js/application.js') }}"></script>

	    <script type="text/javascript">

			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

	    	/*
	    		$data = array(
					"shop_Account": "1327000003",
				  	"cus_Account": "1327100002",
				  	"Amount": cost,
				  	"otp": "1072649"
		    	);

		    	$url_sent = "";
		    	$str_data = json_encode($data);

		    	function sendPostData($url,$post){
		    		$ch = curl_init($url);
		    	}
			*/
		    function callBank(){
		    	//window.location.replace('../../bank/bankSend');
		    	var cost = 450.00;
		    	var otp = "";
			   	var account = document.getElementById("account").value;
			   	var amount = document.getElementById("amount").innerHTML;
			   	amount = parseInt(amount);
			   	var otp = document.getElementById("otp").value;
			   	otp = parseInt(otp);
			   	var bank = document.getElementById("bank").value;
			   	if(bank == 'null'){
			   		alert("select bank");
			   		return;
			   	}

			   	console.log(bank);
			   	console.log(otp);
			   	console.log(amount);
			   	console.log(account);

		    	window.location.href = ('../bank/bankSend/test/'+account+'/'+amount+'/'+otp);

			   /*	$.get('../bank/bankSend',{

    			},
    			function(){
    				console.log('response');
    			});*/
			}
			


	    </script>
	    <!--
	    http://161.246.70.75:8080/cesebank/api/service.php
			"shop_Account"=> "1327000003",
		  	"cus_Account"=> "1327100002",
		  	"Amount"=> 450.00,
		  	"otp"=> "1072649"
	    -->
    </body>
</html>