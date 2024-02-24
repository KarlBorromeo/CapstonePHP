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
        <style>
            header > div{
                position: relative;
            }
            header ul{
                list-style: none;
                padding: 0;
                background-color: rgb(65,63,101);
                position: absolute;
                right: -25%;
                top: 60%;
                display: none;
            }
            header ul li{
                padding: .2rem 1rem;
                color: rgb(128,115,197);
            }
            header ul li:hover{
                background-color: white;
                cursor: pointer;
            }
            header ul li a{
                text-decoration: none;
                color: rgb(128,115,197);
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#caret').click(function(){
                    $('#dropdown').toggle();
                })
            })
        </script>
    </head>
    <header class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <img src="../../../../assets/images/leaf.svg">
            <p>Let's provide fresh items for everyone</p>
        </div>
        <div class="d-flex align-items-center gap-3">
            <!-- <a href="#" class="btn btn-outline-primary" id="switch">Switch to Shop View</a> -->
            <img id="caret" src="../../../../assets/images/carret.svg">
            <ul id="dropdown">
                <li>Profile</li>
                <li><a href="/auth/logout">Logout</a></li>
            </ul>
        </div>
    </header>
</html>