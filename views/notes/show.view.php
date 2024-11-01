<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p class="mb-6">
      <a href="/notes" class="text-2xl text-blue-500 underline ">Go To Notes...</a>
    </p>
    <p class="text-xl font-bold"> <?= htmlspecialchars($note["body"]) ?> </p>

    <footer class="flex space-x-4 mt-6">
      <form method="post">
        <input type="hidden" name="_method" value="DELETE" />
        <input type="hidden" name="id" value="<?= $note["id"] ?>" />
        <button class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete</button>
      </form>
      <a href="/note/edit?id=<?= $note["id"] ?>" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
    </footer>

  </div>
</main>
<?php require base_path("views/partials/footer.php") ?>