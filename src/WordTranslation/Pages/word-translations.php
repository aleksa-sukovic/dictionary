<!-- No translations alert -->
<?php if (!count($activeItem->translations())) { ?>
    <p class="alert alert-info">
        There are currently no translations for this word.
    </p>
<?php } ?>

<!-- Translations list -->
<?php if (count($activeItem->translations())) { ?>
<table class="table table-hover table-bordered table-sm mt-4 mb-0">
    <thead>
    <tr>
        <th>Value</th>
        <th class="w-25">Language</th>
        <th class="text-center w-25">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($activeItem->translations() as $translation) { ?>
        <tr>
            <td><?php echo $translation->value ?></td>
            <td><?php echo $translation->language()->label ?></td>
            <td class="text-center">
                <a href="/WordTranslation/Pages/word-translations-edit.php?item=<?php echo $translation->id ?>" class="text-info mr-2">Edit</a>
                <a href="/WordTranslation/Pages/word-translations-delete.php?item=<?php echo $translation->id ?>" class="text-danger mr-2">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php } ?>
