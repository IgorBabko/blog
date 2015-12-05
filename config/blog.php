<?php

return [
    'name' => 'Blog',
    'title' => 'Igor Babko\'s Blog',
    'subtitle' => 'A clean blog written in Laravel 5.1',
    'description' => 'This is my meta description',
    'author' => 'Igor Babko',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 10,
    'link_limit' => 7,
    'rss_size' => 25,
    'uploads' => [
        'storage' => 'local',
        'webpath' => '/uploads',
    ],
    'contact_email' => env('MAIL_FROM', 'i.i.babko@gmail.com'),
];
