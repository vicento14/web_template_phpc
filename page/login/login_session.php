<?php
if (isset($_SESSION['login_error'])) {
    echo '<script>alert("Sign In Failed. Maybe an incorrect credential or account not found")</script>';
    $_SESSION['login_error'] = NULL;
}

if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == 'admin') {
        header('location: admin/dashboard/');
    } elseif ($_SESSION['role'] == 'user') {
        header('location: user/pagination/');
    }
}