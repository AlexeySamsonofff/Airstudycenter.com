@php set_time_limit(0); @endphp
<!DOCTYPE html>
<html>
<head>  
<title>Air Study</title>
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,800,900" rel="stylesheet">
</head>
<body style="font-family: 'Poppins', sans-serif;margin:0px;">
<table class="main_table" style="margin:auto;background:#1e3574;" cellspacing="0" cellpadding="0" border="0" border-collapse="collapse">
  <tbody>
    <tr>
       <td>
            <p>Hi,</p>

            <p>Someone has invited you to access their account.</p>

            <a href="{{ route('accept', $invite->token) }}">Click here</a> to activate!
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