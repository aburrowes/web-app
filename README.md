# web-app
This web app utilitzes php, html and JavaScript to provide a structure for the Wherehouse system.

QR code scanner was developed with help from this library and developer: https://github.com/schmich/instascan
The php scripts were developed by Rui Santos: https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/

The web applicationn starts off with the user signing into the Wherehouse system and once they are logged in, they are brought to the main home page where the user has the options to send a configuration to a device, view current inventroy, or logout.

If the user clicks the send configuration button, they will be brought to a page where they can scan the devices qr code to be brought to that devices configuration page. If the user is on a mobile device, they do not have to click the send configuration button. All they have to do is pull up their native camera app and scan the devices QR code.

Once the user has scanned the devices QR code, they will be brought to that devices page where the user will then have the option of scanning the item QR code on the package to send that configuration to said device. If on mobile the QR scanner will not pull up so I have implemented a text form where the user can enter the three or four letter item id that will be sent to the devices configuration table. Once the user scans a QR code or enters the item id manually, the configuration will be updated for whatever device is scanned.

If the user decides to view the current inventory, the inventory page will show a list of the most up to date values for each Wherehouse device. If the user would like to view past inventory, they will have the option to do so by clicking the past inventory button in the top of the web app. Once in the past inventory page, the user will be able to see the past stock on every device organized by date & time (most up to date values on top and past values descending with time).

Note: I was having a problem with the QR code scanners working on iOS devices regardless of the iOS version as it seems like there is a problem accessing the back facing camera so users will have to use the front facing camera even after selecting the back facing camera to scan the devices and items. It is also worth mentioning that the QR code scanner works best for the front facing camera if the Apple device is used in a horizontal fashion compared to scanning the QR codes vertically (makes it a lot faster horizontally).
