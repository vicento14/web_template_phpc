<?php
//SESSION
session_name("web_template_phpc");
session_start();

// Database Connections
require 'DatabaseConnections.php';

// error_reporting(0);

if (isset($_POST['upload2'])) {
    $csvMimes = array(
        'text/x-comma-separated-values', 
        'text/comma-separated-values', 
        'application/octet-stream', 
        'application/vnd.ms-excel', 
        'application/x-csv', 
        'text/x-csv', 
        'text/csv', 
        'application/csv', 
        'application/excel', 
        'application/vnd.msexcel', 
        'text/plain'
    );

    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {

        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            //READ FILE
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            // SKIP FIRST LINE
            fgetcsv($csvFile);
            // PARSE
            $error = 0;
            while (($line = fgetcsv($csvFile)) !== false) {
                // Check if the row is blank or consists only of whitespace
                if (empty(implode('', $line))) {
                    continue; // Skip blank lines
                }
                $id_number = $line[0];
                $full_name = $line[1];
                $username = $line[2];
                $password = $line[3];
                $section = $line[4];
                $role = $line[5];
                // CHECK IF BLANK DATA
                if ($line[0] == '' || $line[1] == '' || 
                    $line[2] == '' || $line[3] == '' || 
                    $line[4] == '' || $line[5] == '') {
                    // IF BLANK DETECTED ERROR += 1
                    $error++;
                } else {
                    // Connection Object
                    $conn = null;

                    // Connection Open
                    $connectionArr = $db->connect();

                    if ($connectionArr['connected'] == 1) {
                        $conn = $connectionArr['connection'];

                        // CHECK DATA
                        $sql = "SELECT id FROM user_accounts 
                                WHERE id_number = '$line[0]' AND full_name = '$line[1]' 
                                AND username = '$line[2]' AND password = '$line[3]' 
                                AND section = '$line[4]' AND role = '$line[5]'";
                        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                        $stmt->execute();
                        if ($stmt->rowCount() > 0) {
                            foreach ($stmt->fetchALL() as $row) {
                                $id = $row['id'];
                            }

                            $sql = "UPDATE user_accounts 
                                    SET id_number = '$id_number', full_name = '$full_name', 
                                    username ='$username', password = '$password', 
                                    section = '$section', role = '$role' WHERE id ='$id'";
                            $stmt = $conn->prepare($sql);
                            if ($stmt->execute()) {
                                $error = 0;
                            } else {
                                $error++;
                            }
                        } else {
                            $sql = "INSERT INTO user_accounts 
                                    (id_number, full_name, username, password, section, role) 
                                    VALUES ('$id_number','$full_name','$username','$password','$section','$role')";
                            $stmt = $conn->prepare($sql);
                            if ($stmt->execute()) {
                                $error = 0;
                            } else {
                                $error++;
                            }
                        }
                    } else {
                        echo $connectionArr['title'] . " " . $connectionArr['message'];
                    }
                
                    // Connection Close
                    $conn = null;
                }
            }

            fclose($csvFile);

            if ($error == 0) {
                $_SESSION['message'] = 'SUCCESS!';
            } else {
                $_SESSION['message'] = 'WITH ERROR! NO. OF ERRORS ' . $error;
            }
        } else {
            $_SESSION['message'] = 'CSV FILE NOT UPLOADED!';
        }
    } else {
        $_SESSION['message'] = 'INVALID FILE FORMAT!';
    }

    $last_current_page = trim($_POST['import_accounts_current_page']);

	header('location: ' . $last_current_page);
}
