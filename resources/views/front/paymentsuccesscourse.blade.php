@extends('front.index1')
@section('title', 'All School')
@section('content')
<!--Accommodation Head  Start-->
<section class="courses_sec city_school">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="cus_title acc_head ">
          <h1 class="distance">Payment Success</h1>
          <ul>
            <li>Home</li>
            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
            <li>Payment Success</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Accommodation Head End--> 
<!-- payment success section starts -->
  <div class="col-md-12 payment-success p-5">
    <div class="container">
      <div class="payment-container col-md-8 offset-md-2 p-5">
        <p class="text-center"><img src="images/payment-suucessful.png" alt=""></p>
        <h5 class="text-center">Payment Succesfully Placed</h5>
        <h6 class="text-center pt-3 pb-3 mt-4"> Your order number is <span class="font-weight-bold text-danger"> # {{$coursebooking->Orderid}} </span></h6>
        <p class="mt-3 text-center"> you will receieve confirmation shortly on your registered email.</p>
        <div class="text-center mt-5" align="center">
          <table width="60%" class="m-auto" border="0">
          <tbody>
          <tr>
            <th scope="col">Order-total</th>
            <th scope="col">£{{$coursebooking->total_course_price}}</th>
          </tr>
          <tr>
            <td>Receipt url</td>
            <td><a href="{{$coursebooking->receipt_url}}">Check</a></td>
          </tr>
          </tbody>
        </table>

        </div>
    
    <p class="text-center mt-5"> <a href="#" class="btn search-btn h-auto"> Home page </a></p>

  
      </div>
    </div>
  </div>
<!-- payment success section finsih -->

@endsection
			