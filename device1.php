<!DOCTYPE html>
<html>
  <body style="background-color:white;">
  <head>
    <title>Stock Page</title>
    <link rel="stylesheet" type="text/css" href="background.css">
    <div id="container">
      <a href="logout.php">Logout</a>
      <a href="home.php">Home</a>
    </div>
    <h1>Scan Item QR Code to Device 1 or Enter Manually Below! </h1>
  </head>
  <head>
    <meta charset="utf-8">
    <title>QR Code Scanner</title>
  </head>
  <body>
    <video playsinline controls="true" id="preview"></video>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
      var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror:false });
      scanner.addListener('scan', function(content) {
        var url = content.toLowerCase();
        if (url !== '') {
          window.location.href = 'http://192.168.1.102/demo/qr-data.php?&api_key=tpmat5ab3j7f9&device=1&item=' + encodeURIComponent(url); //192.168.1.102
        } 
        else {
          alert('Invalid QR code content: ' + content);
        }
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 1) {
          scanner.start(cameras[1]);
        } else if(cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
    <strong><center>If the QR scanner does not open please refresh the page if on PC or allow access to use camera!</center></strong> 
    <br>
    <strong><center>If on mobile device, please enter the item id in the form below!</center></strong>
    <form method="GET" action="" onsubmit="return handleFormSubmit(this);">
        <label for="input-text">Enter device id:</label>
        <input type="text" id="input-text" name="text">
        <br>
        <button type="submit">Submit</button>
    </form>

    <script>
      function handleFormSubmit(form) {
        const text = form.elements.text.value.trim();
        if (text !== '') {
          const input = 'http://192.168.1.102/demo/qr-data.php?&api_key=tpmat5ab3j7f9&device=1&item=' + encodeURIComponent(text);
          window.location.href = input;
          return false;
        }
      }
    </script>
  </body>
</html>
