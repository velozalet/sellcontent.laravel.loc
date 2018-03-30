<?php
return [ //Application settings
    'path_folder_frontend' => 'frontendsite', //The path to the template folder for the website front-end part
    'path_folder_backendsite' => 'backendsite', //The path to the template folder for the website back-end part

    /*Articles:*/
    'articles_pagination' => 3,  //пагинация для Blog(Articles) на стр.`../articles`
    'articles_img' => [
        'origin' => ['width'=>960, 'height'=>670], //для получения изображений оригинального размера(хотя судя по всему оригинальное изображение слещдует загружать в оригинальных размерах,т.к.теряются пропорции)
        'mini' => ['width'=>240, 'height'=>320], //для получения изображений минимального размера (preview)
        'max' => ['width'=>1280, 'height'=>960], //для получения изображений максимального размера
    ],
];