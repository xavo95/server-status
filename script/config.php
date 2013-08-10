<?php

$config = (object) array(
	'name' => 'Just a Penguin',
	'github_url' => 'http://github.com/cj123/server-status'
);

$servers = (object) array(
	'trifid' => (object) array(
		'type' => 'Virtual Private Server',
		'host' => 'Linode',
		'location' => 'Dallas, TX',
		'ram' => '1024 MB',
		'storage' => '48 GB',
		'bandwidth' => '2 TB',
		'url' => 'http://status.icj.me/statusupdate.php'
	)
);
