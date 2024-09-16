<?php
//SESSION
session_name("web_template_phpc");
session_start();

// Database Connections
require 'DatabaseConnections.php';

if (isset($_POST['btn_update_account'])) {
	$id = $_POST['id_account_update'];
	$id_number = trim($_POST['employee_no_update']);
	$username = trim($_POST['username_update']);
	$full_name = trim($_POST['full_name_update']);
	$password = trim($_POST['password_update']);
	$section = trim($_POST['section_update']);
	$role = trim($_POST['user_type_update']);

	// Connection Object
    $conn = null;

    // Connection Open
    $connectionArr = $db->connect();

	if ($connectionArr['connected'] == 1) {
        $conn = $connectionArr['connection'];
		
		$query = "SELECT id FROM user_accounts 
				WHERE username = '$username' AND id_number = '$id_number' 
				AND full_name = '$full_name' AND section = '$section'";
		$stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			$_SESSION['message'] = 'Duplicate Data !!!';
		} else {
			$stmt = NULL;

			$query = "UPDATE user_accounts SET id_number = '$id_number', username = '$username', 
						full_name = '$full_name', section = '$section', role = '$role'";
			if (!empty($password)) {
				$query .= ", password = '$password'";
			}
			$query .= " WHERE id = '$id'";

			$stmt = $conn->prepare($query);
			if ($stmt->execute()) {
				$_SESSION['message'] = 'Succesfully Updated!!!';
			} else {
				$_SESSION['message'] = 'Error !!!';
			}
		}
	} else {
        $_SESSION['message'] = $connectionArr['title'] . " " . $connectionArr['message'];
    }

	// Connection Close
    $conn = null;

	$last_current_page = trim($_POST['update_account_current_page']);

	header('location: ' . $last_current_page);
}

if (isset($_POST['btn_delete_account'])) {
	$id = $_POST['id_account_update'];

	// Connection Object
    $conn = null;

    // Connection Open
    $connectionArr = $db->connect();

	if ($connectionArr['connected'] == 1) {
        $conn = $connectionArr['connection'];

		$query = "DELETE FROM user_accounts WHERE id = '$id'";
		$stmt = $conn->prepare($query);
		if ($stmt->execute()) {
			$_SESSION['message'] = 'Succesfully Deleted!!!';
		} else {
			$_SESSION['message'] = 'Error !!!';
		}
	} else {
        $_SESSION['message'] = $connectionArr['title'] . " " . $connectionArr['message'];
    }

	// Connection Close
    $conn = null;

	$last_current_page = trim($_POST['update_account_current_page']);

	header('location: ' . $last_current_page);
}
