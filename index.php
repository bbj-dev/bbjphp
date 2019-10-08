<?php
	include 'client/config.php';
	include 'bbj.php';
	$bbj = new BBJ(BBJ_HOST,BBJ_PORT);

	if (isset($_GET["thread_id"])) {
		$thread = $bbj->thread_load($_GET["thread_id"]);
		if ($thread["error"]!=null) {
			$title = "Unknown Thread | ".BBJ_NAME;
			include 'client/header.php';
			echo "\t\t<p>No such thread exists. <a href='/'>Go home.</a></p>";
			include 'client/footer.php';
			die();
		} else {
			$title = $thread["data"]["title"]." by ".$thread["usermap"][$thread["data"]["author"]]["user_name"]." | ".BBJ_NAME;
		}
	} else {
		$title = BBJ_NAME;
	}

	include 'client/header.php';

	if (isset($thread)) {
		include 'client/thread.php';
	} else {
		include 'client/main.php';
	}

	include 'client/footer.php';
?>

