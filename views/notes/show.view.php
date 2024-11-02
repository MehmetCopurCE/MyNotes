<?php require base_path("views/partials/head.php") ?>

<?php require base_path("views/partials/nav.php") ?>

<?php require base_path("views/partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <p><?= htmlspecialchars($note['body']) ?></p>

        <div class="flex gap-x-2">

            <!-- Delete Form -->
            <form method="post" action="/note/delete">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button type="submit" class="mt-6 bg-red-500 text-white px-2 py-1 rounded">Delete</button>
            </form>

            <!-- Edit Form -->
            <form method="get" action="/note/edit">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button type="submit" class="mt-6 text-gray-500 border border-current px-2 py-1 rounded">Edit</button>
            </form>
        </div>

        <p class="mt-6">
            <a href="/notes" class="text-blue-500 underline">go back notes</a>
        </p>

    </div>
</main>

<?php require base_path("views/partials/footer.php") ?>
