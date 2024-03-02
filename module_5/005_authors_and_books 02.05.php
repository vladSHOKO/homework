<?php

/*
Доработаем массив библиотеки с авторами и книгами из предыдущих домашних заданий. Возьмите массив $library, созданный в приложенном файле 005_authors_and_books.php.
Сейчас ключами к каждому автору в этом массиве являются числовые индексы. Давайте заменим их, сделав ключом для каждого из авторов его email. Теперь, зная email автора, мы сможем без перебора массива с авторами получить нужного автора книги, последовательно указав несколько индексов.
Добавьте каждому автору новое поле — «Год рождения».
Добавьте каждой книге новое поле — «Дата публикации».
Добавьте ещё одного автора в массив авторов и ещё одну книгу, которую написал этот автор, в массив книг.
Выведите информацию по всем книгам в формате: Книга <Название книги>, её написал <ФИО автора> <Год рождения автора> (<email автора>).
*/

$library = [
    'authors' => [
        'john_makkormik@example.com' =>[
            'name' => 'Джон Маккормик',
            'email' => 'john_makkormik@example.com',
            'date_of_born' => '01.02.1900'
        ],
        'martin_robert@example.com' =>[
            'name' => 'Мартин Роберт',
            'email' => 'martin_robert@example.com',
            'date_of_born' => '02.01.1900'
        ],
        'peter_parker@example.com' => [
            'name' => 'Питер Паркер',
            'email' => 'peter_parker@example.com',
            'date_of_born' => '01.12.1900'
        ]
    ],
    'books' => [
        [
            'title' => 'Чистый код: создание, анализ и рефакторинг',
            'author' => 'martin_robert@example.com',
            'date_of_publish' => '10.12.1950'
        ],
        [
            'title' => 'Девять алгоритмов, которые изменили будущее',
            'author' => 'john_makkormik@example.com',
            'date_of_publish' => '10.11.1950'
        ],
        [
            'title' => 'Идеальный программист',
            'author' => 'martin_robert@example.com',
            'date_of_publish' => '10.10.1950'
        ],
        [
            'title' => 'Волшебный программист',
            'author' => 'peter_parker@example.com',
            'date_of_publish' => '10.5.1950'
        ]
    ],
];

foreach ($library as $departmentOfLibrary) {
    foreach ($departmentOfLibrary as $information) {
        $name = $information['name'];
        $title = $departmentOfLibrary['title'];
        $dateOfBurn = $information['date_of_born'];
        $mail = $information['email'];
        var_dump(sprintf("Книга %s, её написал %s, %s(%s)",$title, $name, $dateOfBurn, $mail));

    }
}
