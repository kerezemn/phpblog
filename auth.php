<?php
session_start();

$valid_username = "b241210057@sakarya.edu.tr";
$valid_password = "b241210057";

function is_user_logged() {
    global $valid_username, $valid_password;

    if (isset($_SESSION['username'], $_SESSION['password'])) {
        return ($_SESSION['username'] == $valid_username && $_SESSION['password'] == $valid_password);
    };

    return FALSE;
}

function logout() {
    session_unset();
    session_destroy();
}