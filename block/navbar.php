<?php 
   // navbar is present just in admin page, so in the navbar i check if people are logged in
    if(!isset($_SESSION["username"])){
        header("Location: http://localhost/examphp/index.php");
    }
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between align-items-center">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link ms-3" href="http://localhost/examphp/admin/index.php">Home</a>
        </li>
    </ul>
    <ul class="navbar-nav mb-2 mb-lg-0 text-end">
        <li class="nav-item">
            <a class="nav-link me-3" href="http://localhost/examphp/logout.php">Logout</a>
        </li>
    </ul>
</nav>