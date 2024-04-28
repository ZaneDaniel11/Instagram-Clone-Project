<?php

    if (!isset($title)) {
        $title = "Instagram";
        $keywords = "Instagram,Share and capture world's moments,share,capture,share,home";
    }
    $desc = "Instagram lets you capture,follow,Like and share world's moments in a better way and tell your story with photos,messages,post and everything in between";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title; ?></title>
    <meta name="kewords" content="<?= $keywords; ?>">
    <meta name="description" content="<?= $desc; ?>">
    <link rel="shortcut icon" href="../public/favicon/instagram.ico" type="image/x-icon">
    <link rel="stylesheet" href="../public/css/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>