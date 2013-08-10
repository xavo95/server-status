<?php

function size_readable($size, $retstring = '%01.2f %s') {
	$prefix = array('B', 'K', 'MB', 'GB', 'TB', 'PB');

	$i = 0;
	while ($size >= 1024 && $i < count($prefix)-1) {
		$size /= 1024;
		$i++;
	}

	return sprintf($retstring, $size, $prefix[$i]);
}

include "config.php";

foreach($servers as $name => $info) {

	$status = json_decode(file_get_contents($info->url));

	if(empty($status->uptime)) $status->uptime = '<span class="label label-important">DOWN</span>';

	$status->memory->used = ($status->memory->used * 1024) - ($status->memory->bufcac * 1024);
	$status->memory->total = $status->memory->total * 1024;
	$status->memory->progress = $status->memory->used / $status->memory->total * 100;

	if ($status->memory->progress < '70') { $status->memory->level = "success"; }
	elseif ($status->memory->progress < '90') { $status->memory->level = "warning"; }
	else { $status->memory->level = "danger"; }

	$status->disk->used = size_readable($status->disk->used);
	$status->disk->total = size_readable($status->disk->total);
	$status->disk->progress = $status->disk->used / $status->disk->total * 100;

	if ($status->disk->progress < '70') { $status->disk->level = "success"; }
	elseif ($status->disk->progress < '90') { $status->disk->level = "warning"; }
	else { $status->disk->level = "danger"; }

	$servers->$name->status = $status;
}

?>