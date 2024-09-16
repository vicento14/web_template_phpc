<?php
//SESSION
session_name("web_template_phpc");
session_start();

// Database Connections
require 'DatabaseConnections.php';

if (isset($_POST['btn_delete_account_selected'])) {
	$id_arr = [];
	$id_arr = json_decode(stripslashes(html_entity_decode($_POST['id_account_delete_arr'])), true);

	if (json_last_error() === JSON_ERROR_NONE) {

		// Connection Object
		$conn = null;

		// Connection Open
		$connectionArr = $db->connect();
	
		if ($connectionArr['connected'] == 1) {
			$conn = $connectionArr['connection'];

			$count = count($id_arr);
			foreach ($id_arr as $id) {
				$sql = "DELETE FROM user_accounts WHERE id = ?";
				$stmt = $conn->prepare($sql);
				$params = array($id);
				$stmt->execute($params);
				$count--;
			}

			if ($count == 0) {
				$_SESSION['message'] = 'Succesfully Deleted!!!';
			} else {
				$_SESSION['message'] = 'Error !!!';
			}
		} else {
			$_SESSION['message'] = $connectionArr['title'] . " " . $connectionArr['message'];
		}
	
		// Connection Close
		$conn = null;

	} else {
		$_SESSION['message'] = 'Error !!! JSON Decode Error: ' . json_last_error();
	}

	$last_current_page = trim($_POST['confirm_delete_account_selected_current_page']);

	header('location: ' . $last_current_page);
}
