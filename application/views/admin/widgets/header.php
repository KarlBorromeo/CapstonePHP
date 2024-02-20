<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Organic Shop</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../../../stylesheets/admin/header.css">
    </head>
    <header class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <img src="../../../../assets/images/leaf.svg">
            <p>Let's provide fresh items for everyone</p>
        </div>
        <div class="d-flex align-items-center gap-3">
            <a href="#" class="btn btn-outline-primary" id="switch">Switch to Shop View</a>
            <a href="/auth/logout"><img id="profile" src="../../../../assets/images/profile.png"><img id="caret" src="../../../../assets/images/carret.svg"></a>
        </div>
    </header>
</html>