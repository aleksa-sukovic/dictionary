<div class="bg-light rounded p-4">
    <h4 class="h4">Add words</h4>

    <!-- Search form -->
    <form action="/Dictionary/Pages/dictionaries-edit.php" method="GET" class="form-inline mt-4">
        <input type="hidden" value="<?php echo $activeItem->id ?>" name="item">

        <input type="text" value="<?php if ($wordQuery) echo $wordQuery ?>" name="q" id="q" placeholder="Search word" class="form-control mr-4">

        <button type="submit" class="btn btn-outline-secondary">Search</button>
    </form>

    <!-- Search for words claim -->
    <?php if (!$wordQuery) { ?>
        <div class="mt-4 mb-0 alert alert-info">
            Search for words to add to this dictionary.
        </div>
    <?php } ?>

    <!-- Search results -->
    <?php if ($wordQuery) { ?>
        <table class="table table-bordered table-hover table-sm mt-4">
            <thead>
            <tr>
                <th class="w-25">ID</th>
                <th>Word</th>
                <th class="text-center w-25">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($searchResults as $word) { ?>
                <tr>
                    <td><?php echo $word->id ?></td>
                    <td><?php echo $word->value ?></td>
                    <td class="text-center">
                        <a href="/Dictionary/Pages/dictionary-add-word.php?word=<?php echo $word->id ?>&dictionary=<?php echo $activeItem->id ?>" class="text-info">Add</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</div>
