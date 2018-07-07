<?php
	foreach($thread["data"]["messages"] as $message) {
		$username = $thread["usermap"][$message["author"]]["user_name"];
		$time = new DateTime("@{$message['created']}");
		$time = date_format($time, "c");
		echo "\t\t<div class='well' id='post{$message["post_id"]}'>".PHP_EOL;
		echo "\t\t\t<p>&gt;{$message['post_id']} {$username} @ {$time}</p>".PHP_EOL;
		echo "\t\t\t<pre>".PHP_EOL;
		echo $message["body"].PHP_EOL;
		echo "\t\t\t</pre>".PHP_EOL;
		echo "\t\t</div>".PHP_EOL;
	}
?>
		<p>RIP</p>
