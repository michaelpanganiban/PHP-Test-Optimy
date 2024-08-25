<?php
	// Group the comments by news id
	$groupedComments = [];
	foreach ($comments as $comment) {
		$groupedComments[$comment['news_id']][] = $comment;
	}
	
	// loop the news list
	// show the news details
	// then show the comments connected to the news
	foreach ($news as $newsItem) {
		echo "############ NEWS " . $newsItem['title'] . " ############\n";
		echo $newsItem['body'] . "\n";
		
		if (isset($groupedComments[$newsItem['id']])) {
			foreach ($groupedComments[$newsItem['id']] as $comment) {
				echo "Comment " . $comment['id'] . " : " . $comment['body'] . "\n";
			}
		}
	}