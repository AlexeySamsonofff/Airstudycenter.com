@php 

$template = App\Coursebooktemplate::where('id', 1)->first();

@endphp
<!DOCTYPE html>
<html>
<head>	
<title>Air Study</title>
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,800,900" rel="stylesheet">
<style>	
	table, tbody, tr, td{display:block;}
	.table_tr td{float:left;width:46%;padding: 4px 0px; font-size:14px; color:#000; line-height: 21px; font-family: 'Poppins', sans-serif;}
	.table_tr_border{padding:8px 0px;border-top:1px solid #717171;border-bottom:1px solid #717171;margin: 10px 0px;}
	.table_tr_border td{font-size:18px;color:#000;line-height: 24px;font-family: 'Poppins', sans-serif;}
	
	@media(min-width:992px){
		.main_table{width:800px;} 
		.inner_table{width:700px;} 
		.white_bg_color{padding:0px 50px;}
	}
	@media(min-width:768px) and (max-width:991px){
		.main_table{width:740px;}
		.inner_table{width:680px;}
		.white_bg_color{padding:0px 30px;}
	}
	@media(max-width:767px){
		.main_table{width:100%;}
		.inner_table{width:90%;margin:auto;} 
		.white_bg_color{padding:0px 20px;}
	}
</style> 
</head>
<body style="font-family: 'Poppins', sans-serif;margin:0px;">
<table class="main_table" style="margin:auto;background:#1e3574;" cellspacing="0" cellpadding="0" border="0" border-collapse="collapse">
	<tbody>
		<tr>
			<td>
				<table class="inner_table" style="margin:auto;padding-top:15px;" cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<td style="float:left;width:50%;"><a href="{{ url('/') }}"><img src="https://www.t-london.com/wp-content/themes/tlondon/as/logo.png" alt="Logo"/></a></td>
							<td style="text-align:right;font-size:16px;color:#fff;line-height: 35px;font-family: 'Poppins', sans-serif;float:right;width:50%;">CALL US<br/>{{$template->phone}}</td>
						</tr>
						<tr style="clear:both;">
							<td style="border-bottom:1px solid #a1afd8;"></td>
						</tr>
						<tr style="text-align:center;">
							<td style="font-size:42px;color:#fff;line-height: 48px;font-weight:700;font-family: 'Poppins', sans-serif;padding: 35px 0px 10px;">{{$template->title}}</td> 
						</tr>
						<tr style="text-align:center;">
							<td style="font-size:16px;color:rgba(255,255,255,0.7);line-height: 35px;font-family: 'Poppins', sans-serif;padding-bottom:35px;"></td>
						</tr>
					</tbody> 
				</table>
			</td>			
		</tr>
		<tr>
			<td><img src="https://www.t-london.com/wp-content/themes/tlondon/as/banner.jpg" style="display:block;width:100%;" alt="Air Study Banner"/></td>
		</tr>
		<tr class="white_bg_color" style="background:#fff;display: -webkit-box;">
			<td>
				<table style="margin:auto;" cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<td style="font-size:18px;color:#494949;line-height: 30px;font-family: 'Poppins', sans-serif;font-weight: 600;padding-top:20px; padding-bottom:10px;">Dear {{$name}},</td>
						</tr>
						<tr>
							<td style="font-size:18px;color:#494949;line-height: 30px;font-family: 'Poppins', sans-serif;font-weight: 600;">{!! $template->description !!}</td>
						</tr>
						<tr> 
							<td style="float:left;width:49%;margin-right: 2%;">
								<table style="margin:auto;" cellspacing="0" cellpadding="0" border="0">
									<tr> 
										<td style="margin:30px 0px 25px;background: #2e407c;display: block;color: #fff;padding: 10px 10px;font-size: 16px;line-height: 21px;font-family: 'Poppins', sans-serif;font-weight: 600;letter-spacing: 1px;">School Information</td>
									</tr> 
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">Order No</td>
										<td style="text-align:right;padding-right:3%;"><b>&#35;{{$order_no}}</b></td>
									</tr>
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">School Name</td>
										<td style="text-align:right;padding-right:3%;"><b>{{$schoolname}}</b></td>
									</tr>
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">Course Name</td>
										<td style="text-align:right;padding-right:3%;"><b>{{$coursename}}</b></td>
									</tr>
									
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">Hours/Week</td>
										<td style="text-align:right;padding-right:3%;"><b>{{$hpw}} Hours</b></td>
									</tr>
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">No. Of Week</td>
										<td style="text-align:right;padding-right:3%;"><b>{{$no_of_week}}</b></td>
									</tr>
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">Accommodation Type</td>
										<td style="text-align:right;padding-right:3%;"><b>@if(!empty($acctype_name)){{$acctype_name}}@else {{"No"}}@endif</b></td>
									</tr>
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">Airport Name</td>
										<td style="text-align:right;padding-right:3%;"><b>@if(!empty($airport_name)){{$airport_name}}@else {{"No"}}@endif</b></td>
									</tr>
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">Insurance Name</td>
										<td style="text-align:right;padding-right:3%;"><b>@if(!empty($insurance_name)){{$insurance_name}}@else {{"No"}}@endif</b></td>
									</tr>
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">Visa Name</td>
										<td style="text-align:right;padding-right:3%;"><b>@if(!empty($visa_name)){{$visa_name}}@else {{"No"}}@endif</b></td>
									</tr>
								</table>
							</td>  
							<td style="float:left;width:49%;">
								<table style="margin:auto;" cellspacing="0" cellpadding="0" border="0">
									<tr>  
										<td style="margin:30px 0px 25px;background: #2e407c;display: block;color: #fff;padding: 10px 10px;font-size: 16px;line-height: 21px;font-family: 'Poppins', sans-serif;font-weight: 600;letter-spacing: 1px;position:relative;">Fees Detail<span style="padding:0 12px;background: #7abf01;float:right;margin-top:-10px;margin-right:-10px;font-size:13px;">Course Discount <span style="font-size:16px;line-height: 21px;">{{$cdp}}&#37;</span></span></td> 
									</tr>
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">Registration Fee</td>
										<td style="text-align:right;padding-right:3%;"><b>&#163;{{$registration_fee}}</b></td>
									</tr>
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">Course Fee</td>
										<td style="text-align:right;padding-right:3%;"><b>&#163;{{$courseprice}}</b></td>
									</tr>
									@if($cdp !=0)
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">Course Discount {{$cdp}}%</td>
										<td style="text-align:right;padding-right:3%;"><b>&#163;{{$discountprice}}</b></td>
									</tr>
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">You Save</td>
										<td style="text-align:right;padding-right:3%;"><b>&#163;{{$saved}}</b></td>
									</tr>
									@endif						
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">Accommodation</td>
										<td style="text-align:right;padding-right:3%;"><b>&#163;{{$accommodation}}</b></td>
									</tr>
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">Airport {{$transport_way}} Price</td>
										<td style="text-align:right;padding-right:3%;"><b>&#163;{{$transport}}</b></td>
									</tr>
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">Insurance Price</td>
										<td style="text-align:right;padding-right:3%;"><b>&#163;{{$insurance_price}}</b></td>
									</tr>  
									<tr style="clear:both;" class="table_tr">
										<td style="padding-left:3%;">Visa Price</td>
										<td style="text-align:right;padding-right:3%;"><b>&#163;{{$visa_price}}</b></td>
									</tr> 
									<tr><td style="clear:both;"></td></tr>
									<tr style="clear:both;float: left;width: 100%;" class="table_tr table_tr_border">
										<td style="padding-left:3%;"><b>Total</b></td>
										<td style="padding-right:3%;text-align:right;"><b>&#163;{{$totalPrice}}</b></td>
									</tr>
								</table>
							</td>
						</tr>
						
						<tr><td style="clear:both;"></td></tr>

						<tr style="text-align:center;">
							<td><a href="{{$receipt_url}}" style="margin:30px auto 40px;background: #f59e24;display: inline-block;border-radius: 30px;text-align: center;color: #fff;text-decoration: none;padding: 18px 40px;font-size: 18px;line-height: 21px;font-family: 'Poppins', sans-serif;font-weight: 600;letter-spacing: 1px;">Receipt Url</a></td>
						</tr>
					</tbody>
				</table>  
			</td>			
		</tr>
		<tr style="text-align:center;">
			<td style="font-size:16px;color:rgba(255,255,255,0.7);line-height: 24px;font-family: 'Poppins', sans-serif;padding-bottom:10px;padding-top: 30px;">{{$template->address}}</td>
		</tr> 
		<tr style="text-align:center;"> 
			<td><a style="font-size:16px;color:rgba(255,255,255,0.7);line-height: 24px;font-family: 'Poppins', sans-serif;padding-bottom:10px;display:block; text-decoration:none;" href="mailto:info@airstudycenter.com">{{$template->email}}</a></td>
		</tr>
		<tr style="text-align:center;">
			<td><a style="font-size:16px;color:rgba(255,255,255,0.7);line-height: 24px;font-family: 'Poppins', sans-serif;padding-bottom:15px;display:block; text-decoration:none;" href="tel:+49-233-322-333">{{$template->phone}}</a></td>
		</tr>
		<tr>  
			<td style="border-bottom:1px solid #a1afd8;"></td>
		</tr>
		<tr> 
			<td style=""> 
				<div style="text-align:center;padding: 15px 0px 8px;">
					<a style="display: inline-block;margin-right: 40px;" href="#"><img src="img/fb_icon.jpg" style="display:block;" alt="Facebook"/></a>
					<a style="display: inline-block;" href="#"><img src="img/insta_icon.jpg" style="display:block;" alt="Instagram"/></a>
				</div>
			</td>  
		</tr> 
		<tr> 
			<td style="border-bottom:1px solid #a1afd8;"></td>
		</tr>
		<tr style="text-align:center;">
			<td style="font-size:16px;color:rgba(255,255,255,0.7);line-height: 24px;font-family: 'Poppins', sans-serif;padding: 20px 0px;">&copy; 2019 Air Study Center. All Rights Reserved</td>
		</tr>
	</tbody>
</table>
</body>
</html>