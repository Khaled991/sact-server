<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="icon" href='{{env("APP_URL")}}/storage/sact.ico' />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Payment success</title>
</head>

<body style="
      background-color: #f1f1f1;
      width: 100%;
      text-align: center;
      display: flex;
      align-items: center;
      min-height: 95vh;
      margin: 0px;
      color: #3d3d3d;
    ">
  <div style="
        border-spacing: 0;
        border-collapse: collapse;
        font: small/1.5 Arial, Helvetica, sans-serif;
        padding: 50px 0px 0px;
        min-width: 600px;
        width: 100%;
      ">
    <div style="
          border-spacing: 0;
          border-collapse: collapse;
          color: #222;
          font: small/1.5 Arial, Helvetica, sans-serif;
          font-family: arial, helvetica, sans-serif;
          width: 600px;
          margin: 0px auto 0px;
          padding: 0px 0px 20px;
        ">
      <div style="
            border-spacing: 0;
            border-collapse: collapse;
            color: #222;
            font: small/1.5 Arial, Helvetica, sans-serif;
            font-family: arial, helvetica, sans-serif;
            text-align: center;
          ">
        <a href="{{$url}}" target="_blank" style="
              border-spacing: 0;
              font-family: arial, helvetica, sans-serif;
              margin: 0;
              padding: 15px 0px 0px;
              text-align: center;
              display: inline-block;
              padding-bottom: 20px;
            "><img align="none" alt="Sact" border="0" hspace="0" src="https://www.sact.co/static/media/logo.ea7dd6f22833dfe3422f.webp" style="
                max-width: 180px;
                height: auto;
                display: block;
                margin: 0px;
              " vspace="0" width="180px" />
        </a>
      </div>
      <div style="
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            border-radius: 0.5rem;
            background-color: #ffffff;
          ">
        <h1 style="margin: 17px 0 0 0">Payment completed successfully</h1>
        <div style="
              height: 0.5px;
              background-color: #c0c0c0;
              width: 90%;
              margin: 17px 0;
            "></div>
        <p style="font-size: 16px">🎉Thanks for choosing us.🎉</p>
        <span style="font-size: 20px">
          Please keep this code for its importance to ensure successful
          payment
        </span>
        <h2 style="color: #e74c3c; font-size: 18px">
          Code : {{$checkout_id}}
        </h2>
        <div style="
              height: 0.5px;
              background-color: #c0c0c0;
              width: 90%;
              margin: 17px 0;
            "></div>
        <a href="{{$url}}" style="
              margin: 0 0 17px 0;
              text-decoration: none;
              padding: 15px 20px;
              font-weight: bold;
              border-radius: 5px;
              background-color: #f1923d;
              color: #fff;
              font-size: 14px;
              text-align: center;
              text-transform: uppercase;
            ">
          Go back home</a>
      </div>
    </div>
  </div>
</body>

</html>