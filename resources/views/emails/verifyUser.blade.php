@php set_time_limit(0); @endphp
<!DOCTYPE html>
<html>
<head>  
<title>Air Study</title>
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,800,900" rel="stylesheet">
<style> 
  table, tbody, tr, td{display:block;}
  @media(min-width:992px){
    .main_table{width:800px;}
    .inner_table{width:700px;} 
  }
  @media(min-width:768px) and (max-width:991px){
    .main_table{width:740px;}
    .inner_table{width:680px;}
  }
  @media(max-width:767px){
    .main_table{width:100%;}
    .inner_table{width:90%;margin:auto;} 
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
              <td style="text-align:right;font-size:16px;color:#fff;line-height: 35px;font-family: 'Poppins', sans-serif;float:right;width:50%;">CALL US<br/>+49-233-322-333</td>
            </tr>
            <tr style="clear:both;">
              <td style="border-bottom:1px solid #a1afd8;"></td>
            </tr>
            <tr style="text-align:center;">
              <td style="font-size:42px;color:#fff;line-height: 48px;font-weight:700;font-family: 'Poppins', sans-serif;padding: 35px 0px 10px;">Welcome to Air Study</td> 
            </tr>
            <tr style="text-align:center;">
              <td style="font-size:16px;color:rgba(255,255,255,0.7);line-height: 35px;font-family: 'Poppins', sans-serif;padding-bottom:35px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</td>
            </tr>
          </tbody> 
        </table>
      </td>     
    </tr>
    <tr>
      <td><img src="https://www.t-london.com/wp-content/themes/tlondon/as/banner.jpg" style="display:block;width:100%;" alt="Air Study Banner"/></td>
    </tr>
    <tr style="background:#fff;padding:0px 15px">
      <td>
        <table style="margin:auto;" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr style="text-align:center;">
              <td style="font-size:35px;color:#494949;line-height: 42px;font-family: 'Poppins', sans-serif;padding:50px 0px 20px;">Welcome <span style="font-family: 'Poppins', sans-serif;font-weight: 700;">{{$user['name']}}</span></td>
            </tr>
            <tr>
              <td style="font-size:16px;color:#494949;line-height: 30px;font-family: 'Poppins', sans-serif;font-weight: 500;">Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account.</td>
            </tr>
            <tr style="text-align:center;">
              <td><a href="{{url('user/verify', $user->verifyUser->token)}}" style="margin:30px auto 40px;background: #f59e24;display: inline-block;border-radius: 30px;text-align: center;color: #fff;text-decoration: none;padding: 18px 40px;font-size: 18px;line-height: 21px;font-family: 'Poppins', sans-serif;font-weight: 600;letter-spacing: 1px;">CONFIRMATION</a></td>
            </tr>
          </tbody>
        </table> 
      </td>       
    </tr>
    <tr style="text-align:center;">
      <td style="font-size:16px;color:rgba(255,255,255,0.7);line-height: 24px;font-family: 'Poppins', sans-serif;padding-bottom:10px;padding-top: 30px;">47 Destiny Common, South London, London Se21</td>
    </tr> 
    <tr style="text-align:center;"> 
      <td><a style="font-size:16px;color:rgba(255,255,255,0.7);line-height: 24px;font-family: 'Poppins', sans-serif;padding-bottom:10px;display:block; text-decoration:none;" href="mailto:info@airstudycenter.com">info@airstudycenter.com</a></td>
    </tr>
    <tr style="text-align:center;">
      <td><a style="font-size:16px;color:rgba(255,255,255,0.7);line-height: 24px;font-family: 'Poppins', sans-serif;padding-bottom:15px;display:block; text-decoration:none;" href="tel:+49-233-322-333">+49-233-322-333</a></td>
    </tr>
    <tr>  
      <td style="border-bottom:1px solid #a1afd8;"></td>
    </tr>
    <tr> 
      <td style=""> 
        <div style="text-align:center;padding: 15px 0px 8px;">
          <a style="display: inline-block;margin-right: 40px;" href="#"><img src="https://www.t-london.com/wp-content/themes/tlondon/as/fb_icon.jpg" style="display:block;" alt="Facebook"/></a>
          <a style="display: inline-block;" href="#"><img src="https://www.t-london.com/wp-content/themes/tlondon/as/insta_icon.jpg" style="display:block;" alt="Instagram"/></a>
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