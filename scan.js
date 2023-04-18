// Check if the device is a mobile device
function isMobile() {
  return /Mobi|Android/i.test(navigator.userAgent);
}

// Initialize the Instascan library
let scanner = new Instascan.Scanner({
  video: document.getElementById('preview'),
  mirror: isMobile(), // Flip the camera preview if on a mobile device
});

// Add a listener for the "scan" event
scanner.addListener('scan', function(result) {
  onScan(result);
});

// Start the camera and video preview
Instascan.Camera.getCameras().then(function(cameras) {
  if (cameras.length > 0) {
    scanner.start(cameras[0]);
  } 
  else {
    console.error('No cameras found.');
  }
}).catch(function(e) {
  console.error(e);
});

// Function that is called when a QR code is scanned
function onScan(result) {
  var url = result.text;
  if (url.match(/^http?:\/\//i) || url.match(/^https?:\/\//i)) {
    // Redirect to a website URL
    window.location = url;
  } else if (url.match(/^(\d{1,3}\.){3}\d{1,3}$/)) {
    // Redirect to a local IPv4 address
    window.location = url;
  } else {
    alert("Invalid QR code content: " + url);
  }
}