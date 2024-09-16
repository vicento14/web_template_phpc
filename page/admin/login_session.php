<?php
// Note: Make sure it has $url_components = parse_url($_SERVER['REQUEST_URI']); on top
if (!isset($_SESSION['username'])) {
    header('location:../../');
    exit();
} else if ($_SESSION['role'] == 'admin') {
    if (strpos($url_components['path'], '/user/') !== false) {
        header('location: ../../admin/dashboard/');
        exit();
    }
} else if ($_SESSION['role'] == 'user') {
    if (strpos($url_components['path'], '/admin/') !== false) {
        header('location: ../../user/pagination/');
        exit();
    }
} else {
    header('location:../../');
    exit();
}