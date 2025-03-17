<?php

// echo "<h1>Home page</h1>";

// echo "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui laborum commodi eius ex delectus id accusantium at, veritatis, eligendi distinctio facilis doloribus voluptatibus dolor quo rerum ad quae, provident esse.";
$title = "Home page";
$breadcrumbs =[
    'title' => "Home page",
    'link' => "/",
];
echo render('home/index', compact('title', 'breadcrumbs'));
//render('home/index', ['title'=>$title]);