<?php
	foreach($thread["data"]["messages"] as $message) {
		$username = $thread["usermap"][$message["author"]]["user_name"];
		$time = round($message['created']);
		$time = new DateTime("@{$time}");
		$time = date_format($time, "Y/m/d H:i");
		echo "\t\t<div class='well' id='post{$message["post_id"]}'>".PHP_EOL;
		echo "\t\t\t<p>&gt;{$message['post_id']} {$username} @ {$time}</p>".PHP_EOL;
		echo "\t\t\t<pre>";
		echo $message["body"].PHP_EOL;
		echo "</pre>".PHP_EOL;
		echo "\t\t</div>".PHP_EOL;
	}
?>
