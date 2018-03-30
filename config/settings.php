<?php
return [ //Application settings
    'path_folder_frontend' => 'frontendsite', //The path to the template folder for the website front-end part
    'path_folder_backendsite' => 'backendsite', //The path to the template folder for the website back-end part

    /*Articles:*/
    'articles_pagination' => 3, //pagination of Articles
    'limit_description_prev_file' => 150, //limit description text preview file
    'articles_img' => [
        'origin' => ['width'=>960, 'height'=>670],
        'mini' => ['width'=>240, 'height'=>320],
        'max' => ['width'=>1280, 'height'=>960],
    ],
];