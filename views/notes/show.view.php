<?php require base_path("views/partials/head.php") ?>

<?php require base_path("views/partials/nav.php") ?>

<?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            <p><?= htmlspecialchars($note['body']) ?></p>


         <!--   <form method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?php /*= $note['id'] */?>">
                <button type="submit" class="mt-6 bg-red-500 text-white px-2 py-1 rounded">Delete</button>
            </form>-->

            <p class="mt-6">
                <a href="/notes" class="text-blue-500 underline">go back notes</a>
            </p>

            <footer class="mt-6">
                <a href="/note/edit?id=<?= $note['id'] ?>" class="text-gray-500 border border-current px-2 py-1 rounded">Edit</a>
            </footer>

        </div>
    </main>

<?php require base_path("views/partials/footer.php") ?>