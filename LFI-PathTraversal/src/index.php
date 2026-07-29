<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'pages/home.php';

include 'includes/header.php';
include $page;
include 'includes/footer.php';
