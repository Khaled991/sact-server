<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <div class="m_-2334558670232888997receipt-ctn-wrapper" style=" border-spacing: 0; border-collapse: collapse; color: #222; font: small/1.5 Arial, Helvetica, sans-serif; padding: 50px 0px 0px; margin: 0px; background-color: #f1f1f1; min-width: 600px; width: 100%; font-family: arial, helvetica, sans-serif; ">
    <div style=" border-spacing: 0; border-collapse: collapse; color: #222; font: small/1.5 Arial, Helvetica, sans-serif; font-family: arial, helvetica, sans-serif; width: 600px; margin: 0px auto 0px; padding: 0px 0px 20px; ">
      <div style=" border-spacing: 0; border-collapse: collapse; color: #222; font: small/1.5 Arial, Helvetica, sans-serif; font-family: arial, helvetica, sans-serif; text-align: center; "> <a href="{{env('SACT_URL')}}" target="_blank" style=" border-spacing: 0; font-family: arial, helvetica, sans-serif; margin: 0; padding: 15px 0px 0px; text-align: center; display: inline-block; padding-bottom:20px; "><img align="none" alt="Sact" border="0" hspace="0" src="https://www.sact.co/static/media/logo.ea7dd6f22833dfe3422f.webp" style="max-width: 180px; height: auto; display: block; margin: 0px" vspace="0" width="180px" class="CToWUd" /> </a> </div>
      <div class="m_-2334558670232888997receipt-body" style=" border-radius: 0.5rem; border-spacing: 0; border-collapse: collapse; color: #222; font: small/1.5 Arial, Helvetica, sans-serif; font-family: arial, helvetica, sans-serif; width: 600px; background-color: #ffffff; padding: 10px; ">
        <div style="text-align: center; line-height: 14px">&nbsp;</div>
        <div style="text-align: center; line-height: 24px" dir="rtl"> <span style="font-size: 20px; line-height: 40px"> <strong>Customer feedback</strong> </span> </div>
        <table class="m_-2334558670232888997order-info" style=" width: 540px; margin: 0px auto 15px; padding: 5px 0px; ">
          <tbody>
            <tr>
              <th style=" border-top: 1px solid #e2e3e4; height: 1px; width: 50%; "></th>
              <th style=" border-top: 1px solid #e2e3e4; height: 1px; width: 50%; "></th>
            <tr>
            <tr>
              <td dir="rtl" style=" padding: 15px 0px 0px; margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; font-size: 16px; color: #313131; text-align: left; line-height: 24px; vertical-align: top;"> <strong> Name</strong> </td>
              <td dir="rtl" style=" padding: 15px 0px 0px; margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; font-size: 16px; color: #313131; text-align: left; line-height: 24px; vertical-align: top; " " > <strong> Email</strong> </td></tr><tr> <td dir=" rtl" style=" margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; padding: 0; font-size: 16px; color: #313131; text-align: left; line-height: 24px; ">{{$replacements['name']}}</td>
              <td dir="rtl" style=" margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; padding: 0; font-size: 16px; color: #313131; text-align: left; line-height: 24px;">{{$replacements['email']}}</td>
            </tr>
          </tbody>
        </table>
        <table style=" width: 540px; margin: 0px auto 15px; padding: 5px 0px; ">
          <tbody>
            <tr>
              <th style="border-top: 1px solid #e2e3e4;"></th>
              <th style="width: 1%;border-top: 1px solid #e2e3e4;"></th>
            </tr>
            <tr>
              <td dir="rtl" style=" padding: 15px 0px 0px; margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; font-size: 16px; color: #313131; text-align: left; line-height: 24px; vertical-align: top;"> <strong> Your Enquiry</strong> </td>
            </tr>
            <tr>
              <td dir="rtl" style=" padding: 15px 0px 0px; margin: 0; border-collapse: collapse; font-family: Ariel, Helvetica, sans-serif; font-size: 14px; color: #313131; text-align: left; line-height: 26px; ">{{$replacements['your_enquiry']}}</td>
            </tr>
          </tbody>
        </table>
        <table style="width: 540px; margin: 0px auto 15px; padding: 5px 0px">
          <tbody>
            <tr>
              <th></th>
            </tr>
            <tr>
              <td>
                <div style=" font-size: 14px; color: #313131; text-align: center; line-height: 26px; "> <a href="{{$replacements['url']}}/feedback-accept/{{$replacements['id']}}" style=" text-decoration: none; padding: 15px 20px; font-weight: bold; border-radius: 5px; background-color: #2ecc71; color: #fff; ">Accept</a> </div>
              </td>
              <td>
                <div style=" font-size: 14px; color: #313131; text-align: center; line-height: 26px; "> <a href="{{$replacements['url']}}/feedback-refuse/{{$replacements['id']}}" style=" text-decoration: none; padding: 15px 20px; font-weight: bold; border-radius: 5px; background-color: #e74c3c; color: #fff; " onclick="refuse">Refuse</a> </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>