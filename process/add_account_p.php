<?php
//SESSION
session_name("web_template_phpc");
session_start();

// Database Connections
require 'DatabaseConnections.php';

if (isset($_POST['btn_add_account'])) {
	$employee_no = trim($_POST['employee_no']);
	$full_name = trim($_POST['full_name']);
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$section = trim($_POST['section']);
	$user_type = trim($_POST['user_type']);

	// Connection Object
    $conn = null;

    // Connection Open
    $connectionArr = $db->connect();

	if ($connectionArr['connected'] == 1) {
        $conn = $connectionArr['connection'];
		
		$check = "SELECT id FROM user_accounts WHERE username = ?";
		$stmt = $conn->prepare($check, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
		$params = array($username);
		$stmt->execute($params);
		if ($stmt->rowCount() > 0) {
			$_SESSION['message'] = 'Already Exist';
		} else {
			$stmt = NULL;
			$query = "INSERT INTO user_accounts (id_number, full_name, username, password, section, role)
						VALUES (?, ?, ?, ?, ?, ?)";
			$stmt = $conn->prepare($query);
			$params = array($employee_no, $full_name, $username, $password, $section, $user_type);
			if ($stmt->execute($params)) {
				$_SESSION['message'] = 'Succesfully Recorded!!!';
			} else {
				$_SESSION['message'] = 'Error !!!';
			}
		}
	} else {
        $_SESSION['message'] = $connectionArr['title'] . " " . $connectionArr['message'];
    }

	// Connection Close
    $conn = null;

	$last_current_page = trim($_POST['new_account_current_page']);

	header('location: ' . $last_current_page);
}
