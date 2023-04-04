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
    <h1>Scan Item QR Code to Device 1! </h1>
  </head>
  <head>
    <meta charset="utf-8">
    <title>QR Code Scanner</title>
  </head>
  <body>
    <video playsinline controls="true" id="preview"></video>
    <select id="camera-select"></select>
    <button id="start-button">Start Scanning</button>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
      var scanner = null;
      var selectedCameraId = null;
      var cameras = [];
    
      Instascan.Camera.getCameras().then(function (availableCameras) {
        cameras = availableCameras;
        if (cameras.length > 0) {
          cameras.forEach(function (camera) {
            var option = document.createElement('option');
            option.value = camera.id;
            option.text = camera.name;
            document.querySelector('#camera-select').appendChild(option);
          });
          selectedCameraId = cameras[0].id;
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    
      document.querySelector('#camera-select').addEventListener('change', function (event) {
        selectedCameraId = event.target.value;
      });
    
      document.querySelector('#start-button').addEventListener('click', function () {
        if (selectedCameraId) {
          scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false, facingMode: 'environment' });
          scanner.addListener('scan', function(content) {
            var url = content.toLowerCase();
            if (url !== '') {
              window.location.href = 'http://192.168.1.102/demo/qr-data.php?&api_key=tpmat5ab3j7f9&device=1&item=' + encodeURIComponent(url); //192.168.1.102
            } 
            else {
              alert('Invalid QR code content: ' + content);
            }
          });
          scanner.start(cameras.find(function (camera) { return camera.id === selectedCameraId; }));
        }
      });
    </script>
    <strong><center>Allow access to use the camera and use the scanner horizontally on mobile for faster results!</center></strong> 
  </body>
</html>
