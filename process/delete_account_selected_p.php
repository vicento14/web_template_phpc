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
			
			$isTransactionActive = false;
			$chunkSize = 100; // Define the size of each chunk

			try {
				if (!$isTransactionActive) {
					$conn->beginTransaction();
					$isTransactionActive = true;
				}

				// Process the IDs in chunks
				foreach (array_chunk($id_arr, $chunkSize) as $chunk) {
					// Create a placeholder string for the IDs
					$placeholders = implode(',', array_fill(0, count($chunk), '?'));

					// Prepare the DELETE statement
					$stmt = $conn->prepare("DELETE FROM user_accounts WHERE id IN ($placeholders)");

					// Execute the statement with the chunk of IDs
					$stmt->execute($chunk);

					// echo "Deleted " . count($chunk) . " records.\n";
				}

				$conn->commit();
				$isTransactionActive = false;
				$_SESSION['message'] = 'Succesfully Deleted!!!';
			} catch (Exception $e) {
				if ($isTransactionActive) {
					$conn->rollBack();
					$isTransactionActive = false;
				}
				$_SESSION['message'] = 'Failed. Please Try Again or Call IT Personnel Immediately!: ' . $e->getMessage();
				// Connection Close
				$conn = null;
				exit();
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
