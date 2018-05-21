<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/assets/img/favicon.ico">
        
        <title>Bir Admin Login</title>

        <?php 
        if (isset($css) && count($css)) {
            assets('css', $css);
        }
        ?>
    </head>
    
    <body class="text-center">