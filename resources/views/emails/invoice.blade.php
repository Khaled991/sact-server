<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <title>Invoice</title>
</head>

<body>
  <div class="m_-2334558670232888997receipt-ctn-wrapper" style=" border-spacing: 0; border-collapse: collapse; color: #222; font: small/1.5 Arial, Helvetica, sans-serif; padding: 50px 0px 0px; margin: 0px; background-color: #f1f1f1; min-width: 600px; width: 100%; font-family: arial, helvetica, sans-serif; ">
    <div style=" border-spacing: 0; border-collapse: collapse; color: #222; font: small/1.5 Arial, Helvetica, sans-serif; font-family: arial, helvetica, sans-serif; width: 600px; margin: 0px auto 0px; padding: 0px 0px 20px; ">
      <div style=" border-spacing: 0; border-collapse: collapse; color: #222; font: small/1.5 Arial, Helvetica, sans-serif; font-family: arial, helvetica, sans-serif; text-align: center; "> <a href="{{$replacements['url']}}" target="_blank" style=" border-spacing: 0; margin: 0; padding: 15px 0px 0px; text-align: center; display: inline-block; "><img align="none" alt="Sact" border="0" hspace="0" src="https://www.sact.co/static/media/logo.ea7dd6f22833dfe3422f.webp" style="max-width: 180px; height: auto; display: block; margin: 0px" vspace="0" width="180px" class="CToWUd" /> </a>
        <div dir="rtl" style=" border-spacing: 0; font-weight: bold; font-size: 40px; color: #313131; text-align: center; line-height: 120px; "> Electronic Invoice </div>
      </div>
      <div class="m_-2334558670232888997receipt-body" style=" border-radius: 0.5rem; border-spacing: 0; border-collapse: collapse; color: #222; font: small/1.5 Arial, Helvetica, sans-serif; font-family: arial, helvetica, sans-serif; width: 600px; background-color: #ffffff; padding: 10px; ">
        <div style="text-align: center; line-height: 14px">&nbsp;</div>
        <div style="text-align: center; line-height: 24px" dir="rtl"> <span style="font-size: 18px; font-weight: bold;color: #313131;"> Hello,{{$replacements['name']}}</span> <br />
          <p style="color: #313131;text-align: center;margin:10px 0;"> Thank you for choosing us </p>
          <span style="font-size: 20px; line-height: 40px"><strong> Invoice Number <br />{{$replacements['id']}}#</strong></span><br /> <span style="font-size: 14px; color: #b2b2b2; line-height: 40px">Tax Number : 300782075600</span>
        </div>
        <div dir="rtl" style=" border-spacing: 0; width: 540px; margin: 0px auto; padding: 5px 0px; font-family: arial, helvetica, sans-serif; font-size: 14px; color: #b2b2b2; text-align: left; "> <strong> Your order information</strong> </div>
        <table class="m_-2334558670232888997order-info" style=" width: 540px; margin: 0px auto 15px; padding: 5px 0px; ">
          <tbody>
            <tr>
              <th style=" border-top: 1px solid #e2e3e4; height: 1px; width: 50%; "></th>
              <th style=" border-top: 1px solid #e2e3e4; height: 1px; width: 50%; "></th>
            <tr>
              <td dir="rtl" style=" padding: 15px 0px 0px; margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; font-size: 16px; color: #313131; text-align: left; line-height: 24px; vertical-align: top;"> <strong> Date</strong> </td>
              <td dir="rtl" style=" padding: 15px 0px 0px; margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; font-size: 16px; color: #313131; text-align: left; line-height: 24px; vertical-align: top; "> <strong> Required Translation</strong> </td>
            </tr>
            <tr>
              <td dir="rtl" style=" margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; padding: 0; font-size: 16px; color: #313131; text-align: left; line-height: 24px;">{{$replacements['invoice_date']}}</td>
              <td style=" margin: 0; word-wrap: break-word; word-break: break-all; padding: 0; font-size: 16px; color: #313131; text-align: left; line-height: 24px; ">{{$replacements['languages']}}</td>
            </tr>
            <tr>
              <td dir="rtl" style=" padding: 15px 0px 0px; margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; font-size: 16px; color: #313131; text-align: left; line-height: 24px; vertical-align: top;"> <strong> Pages</strong> </td>
              <td dir="rtl" style=" padding: 15px 0px 0px; margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; font-size: 16px; color: #313131; text-align: left; line-height: 24px; vertical-align: top; " " > <strong> Notes</strong> </td></tr><tr> <td dir=" rtl" style=" margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; padding: 0; font-size: 16px; color: #313131; text-align: left; line-height: 24px; ">{{$replacements['number_of_page']}}</td>
              <td dir="rtl" style=" margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; padding: 0; font-size: 16px; color: #313131; text-align: left; line-height: 24px;">{{$replacements['message']}}</td>
            </tr>
            <tr>
              <td dir="rtl" style=" padding: 15px 0px 0px; margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; font-size: 16px; color: #313131; text-align: left; line-height: 24px; vertical-align: top;"> <strong> Page Price</strong> </td>
              <td dir="rtl" style=" padding: 15px 0px 0px; margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; font-size: 16px; color: #313131; text-align: left; line-height: 24px; vertical-align: top; " " > <strong> Vat</strong> </td></tr>
              <tr> <td dir=" rtl" style=" margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; padding: 0; font-size: 16px; color: #313131; text-align: left; line-height: 24px; ">{{$replacements['page_price']}} SAR</td>
              <td dir="rtl" style=" margin: 0; border-collapse: collapse; word-wrap: break-word; word-break: break-all; padding: 0; font-size: 16px; color: #313131; text-align: left; line-height: 24px;">{{$replacements['vat']}} SAR</td>
            </tr>
          </tbody>
        </table>
        <table style=" width: 540px; margin: 0px auto 15px; padding: 5px 0px;" class="m_-2334558670232888997payment-info">
          <tbody>
            <tr>
              <th style="border-top: 1px solid #e2e3e4;"></th>
              <th style="width: 1%;border-top: 1px solid #e2e3e4;"></th>
            </tr>
            <tr style=" display: table-row; vertical-align: inherit; border-color: inherit; ">
              <td class="m_-2334558670232888997amount-field m_-2334558670232888997last-column"> <span style=" font-size: 14px; color: #313131; line-height: 26px; ">SAR {{$replacements['total_price']}}</span> </td>
              <td> <span style=" width: 540px; white-space: nowrap; margin: 0px auto 15px; padding: 5px 0px; color:#313131; font-weight: bold;">: TOTAL</span> </td>
            </tr>
            <tr>
              <td dir="rtl" style=" font-size: 14px; color: #313131; text-align: center; line-height: 26px; " colspan="2"></td>
            </tr>
          </tbody>
        </table>
        <table style=" width: 540px; margin: 0px auto 15px; padding: 5px 0px; ">
          <tbody>
            <tr>
              <th></th>
            </tr>
            <tr>
              <td dir="rtl" style=" padding: 15px 0px 0px; margin: 0; border-collapse: collapse; font-family: Ariel, Helvetica, sans-serif; font-size: 14px; color: #313131; text-align: center; line-height: 26px; "> 8592 King Fahd Rd, Tulip Tower, AlOlaya, Riyadh 12333 -3802,Kingdom of Saudi Arabia </td>
            </tr>
          </tbody>
        </table>
        <table style=" width: 540px; margin: 0px auto 15px; padding: 5px 0px;">
          <tbody>
            <tr>
              <th></th>
            </tr>
            <tr>
              <td>
                <div style=" font-family: Ariel, Helvetica, sans-serif; font-size: 14px; color: #313131; text-align: center; line-height: 26px; ">
                  <a href="{{$replacements['button_url']}}" target="_blank" style="text-decoration: none;padding:15px 20px; font-weight:bold;border-radius: 5px;background-color: #f1923d; color: #fff;cursor:pointer">Pay now</a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>