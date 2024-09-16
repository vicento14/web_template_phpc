<?php
$page_title = 'Web Template';
$homepage = '';
$role_label = '';
if ($_SESSION['role'] == 'admin') {
    $homepage = '/web_template_phpc/admin/dashboard/';
    $role_label = 'Admin';
} else if ($_SESSION['role'] == 'user') {
    $homepage = '/web_template_phpc/user/pagination/';
    $role_label = 'User';
}