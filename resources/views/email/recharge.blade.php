<!DOCTYPE html>
<html>

<!-- Mirrored from crypto-admin-templates.multipurposethemes.com/sass/bs5/main/email_verify_email.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Nov 2021 20:59:31 GMT -->
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<style type="text/css">
    /* FONTS */
    @import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');

    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; }

    /* RESET STYLES */
    img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width:600px){
        h1 {
            font-size: 32px !important;
            line-height: 32px !important;
        }
    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">

<!-- HIDDEN PREHEADER TEXT -->

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
        <td align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 10px 10px;">
                        <a href="#" target="_blank" style="text-decoration: none;">
							<span style="display: block; font-family: 'Poppins', sans-serif; color: #3e8ef7; font-size: 36px;" border="0"> <img src="{{ asset('assetsn/images/logo-full.png') }}" style="width: 24%"alt="img"></span>
                        </a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- HERO -->
    <tr>
        <td align="center" style="padding: 0px 10px 0px 10px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Poppins', sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 2px; line-height: 48px;">
                      <h1 style="font-size: 36px; font-weight: 600; margin: 0;">Hello {{ $details['name'] }},</h1>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- COPY BLOCK -->
    <tr>
        <td align="center" style="padding: 0px 10px 0px 10px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
              <!-- COPY -->
              <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 400; line-height: 25px; text-align:justify;">
                  <h5 style="margin: 0;">AboveMart electronic Notification Service
                  </h5>
                </td>
              </tr>
              <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 400; line-height: 25px; text-align:justify;">
                  <p style="margin: 0;">The details of this transaction are shown below:</p>
                </td>
              </tr>
              <!-- BULLETPROOF BUTTON -->
            
              <!-- COPY -->
              <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px; text-align:justify;">
                  <p>Description	:	Airtime Purchase</p><br>
                  <p>Amount	:	#{{ $details['amount'] }}</p><br>
                  <p>Network : {{ $details['network'] }}</p><br>
                  <p>Time of Transaction	:	{{ $details['date'] }}</p>

                </td>
              </tr>
              <!-- COPY -->
              
              <!-- COPY -->
             
              <!-- COPY -->
              <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 0px 0px; color: #666666; font-family: 'Poppins', sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                  <p style="margin: 0;">Cheers,<br>AboveMart</p>
                </td>
              </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- FOOTER -->
    <tr>
        <td align="center" style="padding: 10px 10px 50px 10px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
              <!-- NAVIGATION -->
             
              <!-- ADDRESS -->
              <tr>
                {{-- <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 30px 30px; color: #aaaaaa; font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                  <p style="margin: 0;">Admin - 1234 Lorem Ipsum - Dummy, FL - 987456</p>
                </td> --}}
              </tr>
		      <!-- COPYRIGHT -->
              <tr>
                <td align="center" style="padding: 30px 30px 30px 30px; color: #333333; font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                  <p style="margin: 0;">Copyright © <script>document.write(new Date().getFullYear())</script>
                    AboveMart. All rights reserved.</p>
                </td>
              </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>

</body>

<!-- Mirrored from crypto-admin-templates.multipurposethemes.com/sass/bs5/main/email_verify_email.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Nov 2021 20:59:31 GMT -->
</html>
