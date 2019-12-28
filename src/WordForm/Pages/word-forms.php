<!-- No translations alert -->
<?php if (!count($activeItem->forms())) { ?>
    <p class="alert alert-info">
        There are currently no forms for this word.
    </p>
<?php } ?>

<!-- Word forms list -->
<?php if (count($activeItem->forms())) { ?>
<div>
    <table class="table table-hover table-responsive table-sm">
        <thead>
        <tr>
            <th>Value</th>
            <th>Type</th>
            <th>State</th>
            <th>Word</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($activeItem->forms() as $form) { ?>
            <tr>
                <td><?php echo $form->value ?></td>
                <td><?php echo $form->type()->value ?></td>
                <td><?php echo $form->state()->value ?></td>
                <td><?php echo $form->translation()->value ?></td>
                <td>
                    <a href="/WordForm/Pages/word-forms-edit.php?item=<?php echo $form->id ?>" class="text-info mr-2">Edit</a>
                    <a href="/WordForm/Pages/word-forms-delete.php?item=<?php echo $form->id ?>&translation=<?php echo $form->translation()->id ?>" class="text-danger mr-2">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>
