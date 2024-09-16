<?php
function svr_host() {
    // Get the server address
    $server_addr = $_SERVER['SERVER_ADDR'];

    // Check if the server address is an IPv6 loopback address
    if ($server_addr === '::1') {
        $server_addr = '127.0.0.1'; // Convert to IPv4 loopback
    }

    // Build the root URL
    $root = "http://" . $server_addr;

    // Check if the server port is not the default HTTP port (80)
    if ($_SERVER['SERVER_PORT'] != 80) {
    $root .= ":" . $_SERVER['SERVER_PORT'];
    }

    $root .= "/web_template_phpc/";

    return htmlspecialchars($root);
}

function svr_host_header() {
    return $_SERVER['DOCUMENT_ROOT'] . '/web_template_phpc/';
}
