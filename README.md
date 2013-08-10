# server-status
A very simple server status web frontend. Inspired by various others found on the internet, but were complicated.

## files

* `index.php` - web frontend
* `script/model.php` - retrieves and compiles data for the frontend
* `script/config.php` - array of server info
* `statusupdate.txt` - client update script (easier to wget)
* `statusupdate.php` - print the client update script 

## set-up

* Clone the repo on the server. (eg. http://status.ineal.me/)
* Update `script/config.php` with all your server info.
* On every client: `wget http://status.ineal.me/statusupdate.txt` and rename extension to `.php` on the web root (or whatever matches your config). (eg. http://felix.ineal.me/statusupdate.php)
* Open the example http://status.ineal.me/ and see all your clients!
