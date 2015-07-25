# server-status
A very simple server status web frontend. Inspired by various others found on the internet, but were complicated.

* This is my modified version, it allows showing swap and principal services. You could add general services editing `index.php`, and then edit each `statusupdate.php` on each client(if the ports aren't generic).

* Also I added bootstrap locally so no need for direct access to files, if you want to update, go to getbootstrap.com, download and extract on that folder.

## files

* `api.php` - json data with all server data
* `index.php` - web frontend
* `script/config.php` - config and server info
* `script/model.php` - php work for the frontend
* `statusupdate.txt` - client update script
* `statusupdate.php` - print the client update script (easier to wget)

## set-up

* Clone the repo on the server. (eg. http://status.ineal.me/)
* Update `script/config.php` with all your server info.
* On every client: `wget http://status.ineal.me/statusupdate.php` on the web root (or whatever matches your config). (eg. http://felix.ineal.me/statusupdate.php)
* Open the example http://status.ineal.me/ and see all your clients!
