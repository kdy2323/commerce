<?php

if(!isset($_SESSION['admin'])) {
    header("Location: index_.php?page=login_admin.php");
}