<?php
	$q_getUserStuff  = 'SELECT u.user_name, l.list_name, i.item_text, i.item_due_date FROM user u JOIN list l ON u.user_id = l.user_id LEFT JOIN item i ON i.list_id = l.list_id WHERE u.user_name = :username;';
    $q_getUser = 'SELECT user_name, user_password FROM user WHERE user_name = :username AND user_password = :password';

    $q_addList = 'INSERT INTO list VALUES (NULL, :listname ,(SELECT user_id FROM user WHERE user_name = :username AND user_password = :password))';
    $q_addItem = 'INSERT INTO item VALUES (NULL, (SELECT l.list_id FROM list l JOIN user u ON u.user_id = l.user_id WHERE :listname = l.list_name AND :username = u.user_name AND :password = u.user_password), :itemname, :itemduedate)';

    $q_deleteItem = 'DELETE i FROM item i INNER JOIN list l ON i.list_id = l.list_id INNER JOIN user u ON u.user_id = l.user_id WHERE :listname = l.list_name AND :username = u.user_name AND :password = u.user_password AND :itemname = i.item_text';
    $q_deleteList = 'DELETE i, l FROM item i RIGHT JOIN list l ON i.list_id = l.list_id INNER JOIN user u ON u.user_id = l.user_id WHERE :listname = l.list_name AND :username = u.user_name AND :password = u.user_password';
?>