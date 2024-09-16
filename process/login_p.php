<?php
session_name("web_template_phpc");
session_start();

// Database Connections
require 'DatabaseConnections.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connection Object
    $conn = null;

    // Connection Open
    $connectionArr = $db->connect();

    if ($connectionArr['connected'] == 1) {
        $conn = $connectionArr['connection'];

        // MySQL
        $sql = "SELECT full_name, section, role FROM user_accounts WHERE BINARY username = ? AND BINARY password = ?";
        // MS SQL Server
        // $sql = "SELECT full_name, section, role FROM user_accounts 
        //         WHERE username = ? COLLATE SQL_Latin1_General_CP1_CS_AS AND password = ? COLLATE SQL_Latin1_General_CP1_CS_AS";
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $params = array($username, $password);
        $stmt->execute($params);
        if ($stmt->rowCount() > 0) {
            foreach($stmt->fetchALL() as $row){
                $name = $row['full_name'];
                $section = $row['section'];
                $role = $row['role'];
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $name;
                $_SESSION['section'] = $section;
                $_SESSION['role'] = $role;
                if ($role == 'admin') {
                    header('location: ../admin/dashboard/');
                } elseif ($role == 'user') {
                    header('location: ../user/pagination/');
                }
            }
        } else {
            $_SESSION['login_error'] = 1;
            header('location: ../index.php');
        }
    } else {
        echo $connectionArr['title'] . " " . $connectionArr['message'];
    }

    // Connection Close
    $conn = null;
}
