<?php
$books = [
    [
        'title' => 'The Adventures of Tom Sawyer',
        'author' => 'Mark Twain',
        'price' => 200,
        'releaseYear' => 2006,
        'purchaseUrl' => 'https://example.com'
    ],
    [
        'title' => 'The Adventures of Sherlock Holmes',
        'author' => 'Arthur Conan Doyle',
        'price' => 250,
        'releaseYear' => 2011,
        'purchaseUrl' => 'https://example.com'
    ],
    [
        'title' => 'The Adventures of Huckleberry Finn',
        'author' => 'Mark Twain',
        'price' => 300,
        'releaseYear' => 2012,
        'purchaseUrl' => 'https://example.com'
    ]
];

function filter($items, $func)
{
    $filteredItems = [];

    foreach ($items as $item) {
        if ($func($item)) {
            $filteredItems[] = $item;
        }
    }

    return $filteredItems;
}

$filteredBooks = filter($books, function ($book) {
    return $book['releaseYear'] >= 2012;
});

include 'index.view.php';

