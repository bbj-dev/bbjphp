<?php
	$threads = $bbj->thread_index();
	foreach($threads["data"] as $thread) {
		$username = $threads["usermap"][$thread["author"]]["user_name"];
		$last_author = $threads["usermap"][$thread["last_author"]]["user_name"];
		$time = round($thread['created']);
		$time = new DateTime("@{$time}");
		$time = date_format($time, "c");
		$tt = $thread["title"];
		$plural = $thread['reply_count']==1 ? "y" : "ies";
		$tid = $thread["thread_id"];
		echo "\t\t<div class='well'>".PHP_EOL;
		echo "\t\t\t<p><a href='index.php?thread_id={$tid}'>{$tt}</a> by {$username} @ {$time}</p>".PHP_EOL;
		echo "\t\t\t<p>{$thread['reply_count']} repl{$plural}, last post by {$last_author}";
		echo "\t\t</div>".PHP_EOL;
	}
?>
