<div class="bg-light rounded p-4">
    <h4 class="h4">Words</h4>

    <!-- No words message -->
    <?php if (!count($activeItem->words())) { ?>
        <div class="mt-4 mb-0 alert alert-info">
            This dictionary doesn't have any words.
        </div>
    <?php } ?>

    <!-- Words -->
    <?php if (count($activeItem->words())) { ?>
        <table class="table table-bordered table-hover table-sm mt-4">
            <thead>
            <tr>
                <th class="w-25">ID</th>
                <th>Word</th>
                <th class="text-center w-25">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($activeItem->words() as $word) { ?>
                <tr>
                    <td><?php echo $word->id ?></td>
                    <td><?php echo $word->value ?></td>
                    <td class="text-center">
                        <a href="/Word/Pages/words-edit.php?item=<?php echo $word->id ?>" class="text-info mr-2">Edit</a>
                        <a href="/Dictionary/Pages/dictionary-delete-word.php?word=<?php echo $word->id ?>&dictionary=<?php echo $activeItem->id ?>" class="text-danger">Remove</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</div>
