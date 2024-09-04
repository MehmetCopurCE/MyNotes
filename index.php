<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
</head>

<body>
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

?>

<h1>Recommended Books</h1>

<ul>
    <?php
    foreach ($books as $book) {
        echo "<li><strong>Title: </strong>{$book['title']} <br> <strong>Author: </strong> {$book['author']} <br> <strong>Price: </strong> {$book['price']} <br> <strong>Purchase: </strong> <a href='{$book['purchaseUrl']}'>Link</a> </li><br>";
    }
    ?>
</ul>


<h1>Recommended Books Type 2</h1>

<ul>
    <?php foreach ($filteredBooks as $book) : ?>

        <a href="<?php echo $book['purchaseUrl']; ?>">
            <?= $book["title"] ?> (<?= $book["releaseYear"] ?>) by <?= $book["author"] ?>
        </a>
        <br>
    <?php endforeach; ?>
</ul>

</body>

</html>