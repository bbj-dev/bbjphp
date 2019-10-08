<?php
	// Float pinned posts to the top.
	// If they share a pinned/unpinned status, later post comes to the top.
	// Otherwise, force pinned post to the top.
	function pinned_sort($thread_a,$thread_b) {
		if ($thread_a["pinned"] == $thread_b["pinned"]) {
			return (($thread_a["last_mod"]>$thread_b["last_mod"])? -1 : 1);
		}
		if ($thread_a["pinned"]) {
			return -1;
		}
		return 1;
	}

	$threads = $bbj->thread_index();
	usort($threads["data"],"pinned_sort");
	foreach($threads["data"] as $thread) {
		$username = $threads["usermap"][$thread["author"]]["user_name"];
		$last_author = $threads["usermap"][$thread["last_author"]]["user_name"];
		$time = round($thread['created']);
		$time = new DateTime("@{$time}");
		$time = date_format($time, "Y/m/d H:i");
		$mod = round($thread['last_mod']);
		$mod = new DateTime("@{$mod}");
		$mod = date_format($mod, "Y/m/d H:i");
		$tt = $thread["title"];
		$plural = $thread['reply_count']==1 ? "y" : "ies";
		$tid = $thread["thread_id"];
		echo "\t\t<div class='well'>".PHP_EOL;
		echo "\t\t\t<p><a href='?thread_id={$tid}'>{$tt}</a> by {$username} @ {$time}</p>".PHP_EOL;
		echo "\t\t\t<p>{$thread['reply_count']} repl{$plural}, last post by {$last_author} @ {$mod}</p>";
		echo "\t\t</div>".PHP_EOL;
	}
?>
