<?php 
    //display PHP errors to make debugging easier
// Comment this out when you are finished with the website.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // for use on laptop
    define('ROOT_DIR', 'http://localhost//theatreComplete/Theatre_Karen/');
    define('AUTH_DIR', 'http://localhost//theatreComplete/Theatre_Karen//account/dashboard/');
// for use on college pc in room 13
    // define('ROOT_DIR', 'http://localhost/theatreV1/');
    // define('AUTH_DIR', 'http://localhost/theatreV1/account/dashboard/');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#0ed3cf">
    <meta name="msapplication-TileColor" content="#0ed3cf">
    <meta name="theme-color" content="#0ed3cf">

    <meta property="og:image" content="http://tailwindcomponents.com/storage/6789/conversions/temp97123-ogimage.jpg?v=2023-02-13 00:53:23" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="640" />
    <meta property="og:image:type" content="image/png" />

    <meta property="og:url" content="https://tailwindcomponents.com/component/navigation-blog-with-dropdown-search-and-logo/landing" />
    <meta property="og:title" content="Navigation Blog With Dropdown + Search and Logo by okthapian" />
    <meta property="og:description" content="This is a navigation bar that can be used on any website, depending on usage, and can be customized with any color" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@TwComponents" />
    <meta name="twitter:title" content="Navigation Blog With Dropdown + Search and Logo by okthapian" />
    <meta name="twitter:description" content="This is a navigation bar that can be used on any website, depending on usage, and can be customized with any color" />
    <meta name="twitter:image" content="http://tailwindcomponents.com/storage/6789/conversions/temp97123-ogimage.jpg?v=2023-02-13 00:53:23" />

    <title>Navigation Blog With Dropdown + Search and Logo by okthapian. </title>

        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="<?= ROOT_DIR ?>assets/scss/app.css">

    </head>
<body class="bg-black">

<script src="//unpkg.com/alpinejs" defer></script>

