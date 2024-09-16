<?php
session_name("web_template_phpc");
session_start();

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('location: /web_template_phpc/');
}