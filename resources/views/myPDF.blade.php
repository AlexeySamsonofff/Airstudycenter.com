<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Airstudy Paid Course</title>
   <style>
   @font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #1e3574;
  text-decoration: none;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 16px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#leftcontent{
  float: right;
   margin-top: 8px;

}

#logo img {
  height: 70px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #1e3574;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #0087C3;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border: 1px solid #fff;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: center;
}

table td h3{
  color: #1e3574;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.6em;
  background: #1e3574;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .qty {
}

table .total {
  background: #1e3574;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  color: #1e3574;
  font-size: 1.4em;
  border-top: 1px solid #1e3574; 

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #1e3574;  
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}


   </style>
  </head>
  <body>
    <header class="clearfix">
       <div id="logo">
              <div style="float:left;"><a href="{{ url('/') }}"><img src="https://www.t-london.com/wp-content/themes/tlondon/as/logo.png" alt="Logo"/></a></div>
              <br><br><br>
          <h1>Air Study</h1>
        </div>
        <div id="leftcontent">
         <h2>Order No:#{{ $bookedcourse->Orderid }}</h2>
          <div class="date">Date of Invoice:{{ $bookedcourse->created_at }}</div>
        </div>
     
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">School Name:</div>
          <h2 class="name">{{ $bookedcourse->schoolname}}</h2>
          <div class="address">{{ $bookedcourse->country}}, {{ $bookedcourse->city }}, {{ $bookedcourse->zipcode}}</div>
          <div class="email"><a href="mailto:{{ $bookedcourse->email }}">{{ $bookedcourse->email }}</a></div>
        </div>
        
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">Type</th>
            <th class="unit">Name</th>
            <th class="qty">Hours per Week</th>
            <th class="total">Price</th>
          </tr>
        </thead>
        <tbody>
         
          <tr>
            <td class="no">01</td>
            <td class="desc"><h3>Course Name</h3></td>
            <td class="unit">{{ $bookedcourse->course_name}}</td>
            <td class="qty">{{ $bookedcourse->hours_per_week}}</td>
            <td class="total">{{ $bookedcourse->all_price }}</td>
          </tr>
          @if($bookedcourse->accommodation_price)
          <tr>
            <td class="no">02</td>
            <td class="desc"><h3>Accommodation Type</h3></td>
            <td class="unit">{{ $bookedcourse->accommodation }}</td>
            <td class="qty"></td>
            <td class="total">£{{ $bookedcourse->accommodation_price }}</td>
          </tr>
          @endif
          @if($bookedcourse->airport)
          <tr>
            <td class="no">03</td>
            <td class="desc"><h3>Transport</h3></td>
            <td class="unit">{{$bookedcourse->airport }}</td>
            <td class="qty"></td>
            <td class="total">@if($bookedcourse->airport)£{{$bookedcourse->transport_price }}@else £0 @endif
            </td>
          </tr>
          @endif
          @if($bookedcourse->insurance_name)
          <tr>
            <td class="no">04</td>
            <td class="desc"><h3>Insurence</h3></td>
            <td class="unit">{{$bookedcourse->insurance_name }}</td>
            <td class="qty"></td>
            <td class="total">@if($bookedcourse->insurance_name)£{{$bookedcourse->insprice }}@else £0 @endif
            </td>
          </tr>
          @endif
          @if($bookedcourse->insurance_name)
          <tr>
            <td class="no">05</td>
            <td class="desc"><h3>Visa</h3></td>
            <td class="unit">{{$bookedcourse->visa_name }}</td>
            <td class="qty"></td>
            <td class="total">@if($bookedcourse->visa_name)£{{$bookedcourse->visaprice }}@else £0 @endif
            </td>
          </tr>
          @endif
        </tbody>
        <tfoot>

          <tr>
            <td colspan="2"></td>
            <td colspan="2">REGISTRATION FEE</td>
            <td>£{{$bookedcourse->registration_fee}}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TOTAL PRICE</td>
            <td>£{{$bookedcourse->total_course_price}}</td>
          </tr>
           <tr>
            <td colspan="2"></td>
            <td colspan="2">card_lastdigit</td>
            <td>{{$bookedcourse->card_lastdigit}}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">PAYMENT STATUS</td>
            <td>{{$bookedcourse->payment_status}}</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
     
    </main>
    <footer>
     Airstudy
    </footer>
  </body>
</html>