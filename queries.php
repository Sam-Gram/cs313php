<?php
	$q_getAll = 'SELECT u.user_name, l.list_name, i.item_text FROM user u JOIN list l ON u.user_id = l.user_id JOIN item i ON i.list_id = l.list_id;';
?>