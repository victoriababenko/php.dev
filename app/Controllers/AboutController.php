<?php
// echo '
// <ul>
//   <li><a href="/">Home</a></li>
//   <li><a href="/about">About</a></li>
//   <li><a href="/contact">Contact</a></li>
// </ul>
// ';

// echo "<h1>About page</h1>";

// echo "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui laborum commodi eius ex delectus id accusantium at, veritatis, eligendi distinctio facilis doloribus voluptatibus dolor quo rerum ad quae, provident esse.";

// echo date("F j, Y");

$title = "About page";

$breadcrumbs =[
    'title' => "About page",
    'link' => "/about",
];

echo render('about/index', compact('title', 'breadcrumbs'));