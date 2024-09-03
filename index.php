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
        'purchaseUrl' => 'https://example.com'
    ],
    [
        'title' => 'The Adventures of Sherlock Holmes',
        'author' => 'Arthur Conan Doyle',
        'price' => 250,
        'purchaseUrl' => 'https://example.com'
    ],
    [
        'title' => 'The Adventures of Huckleberry Finn',
        'author' => 'Mark Twain',
        'price' => 300,
        'purchaseUrl' => 'https://example.com'
    ]
];

function filterByAuthor($books, $author)
{
    $filteredBooks = [];

    foreach ($books as $book) {
        if ($book['author'] === $author) {
            $filteredBooks[] = $book;
        }
    }

    return $filteredBooks;
}

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
    <?php foreach (filterByAuthor($books, 'Mark Twain') as $book) : ?>
            <li>
                <strong>Title: </strong> <?= $book['title']; ?> <br>
                <strong>Author: </strong> <?php echo $book['author']; ?> <br>
                <strong>Price: </strong> <?php echo $book['price']; ?> <br>
                <strong>Purchase: </strong> <a href="<?php echo $book['purchaseUrl']; ?>">Link</a>
            </li>
            <br>
    <?php endforeach; ?>
</ul>

</body>

</html>