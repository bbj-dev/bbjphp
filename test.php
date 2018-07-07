<?php
	// This file is part of BBJ.PHP by khuxkm fbexl
	// Licensed under MIT.
	// A test. Specific to ~team BBJ
	include 'bbj.php';
	$bbj = new BBJ("127.0.0.1",7099);
	$data = $bbj->thread_load("6a7232ee753e11e8a0d400163c2857c7");
	$threadd = $data["data"];
	$umap = $data["usermap"];
	$authorid = $threadd["author"];
	$authoru = $umap[$authorid];
	echo $authoru["user_name"].PHP_EOL;
?>
