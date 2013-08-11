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

function get_level($progress) {
	if($progress < '70') { 
		return "success"; 
	} elseif ($progress < '90') { 
		return "warning"; 
	} else { 
		return "danger";
	}
}

include "config.php";

foreach($servers as $name => $info) {

	$status = json_decode(file_get_contents($info->url));

	if(empty($status->uptime)) $status->uptime = '<span class="label label-important">DOWN</span>';

	$status->memory->used = ($status->memory->used * 1024) - ($status->memory->bufcac * 1024);
	$status->memory->total = $status->memory->total * 1024;
	$status->memory->progress = $status->memory->used / $status->memory->total * 100;

	$status->memory->level = get_level($status->memory->progress);
	
	// disks
	foreach($status->disks as $disk => $info) {
		$status->disks->$disk->used = size_readable($info->used);
		$status->disks->$disk->total = size_readable($info->total);
		$status->disks->$disk->progress = $info->used / $info->total * 100;
		$status->disks->$disk->level = get_level($status->disks->$disk->progress);
	}

	$servers->$name->status = $status;
}
?>