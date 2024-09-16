<?php
// Message after execution using Message Session Variable
if (isset($_SESSION['message'])) {
    echo '<script>alert("' . $_SESSION['message'] . '")</script>';
    unset($_SESSION['message']);
}