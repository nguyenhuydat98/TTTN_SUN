<?php
	echo "<ul>";
	foreach ($posts as $value) {
		echo "<li>";
		echo "<a href='#'>" . $value->getId() . " - " . $value->getTitle() . "</a>";
		echo "</li>";
	}
	echo "</ul>";
?>