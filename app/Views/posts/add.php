<?php
// set title
$this->setVar('headerTitle', $headerTitle);

echo $this->extend('Views\layout');
echo $this->section('content');

?>

<div class="row">
    <div class="col">
        <h1 class="mt-2"><?php echo esc($headerTitle) ?></h1>
        <?php echo form_open('posts/add'); ?>
        <div class="form-group">
            <?= form_label('Title', 'title') ?>
            <?= form_input('title', set_value('title'), ['class' => 'form-control']); ?>
            <small class="form-text text-danger"> <?= $errors['title'] ?? ''; ?></small>
        </div>
        <div class="form-group">
            <?= form_label('Content', 'content'); ?>
            <?= form_input('content', set_value('content'), ['class' => 'form-control']); ?>
            <small class="form-text text-danger"> <?= $errors['content'] ?? ''; ?></small>
        </div>
        <div class="form-group">
            <?= form_submit('Save', 'Save', ['class' => 'btn btn-sm btn-info']); ?>
            <?= anchor('posts', 'Back', ['class' => 'btn btn-sm btn-danger']); ?>
            <?= form_close(); ?>
        </div>
    </div>
</div>





<?php
// end section content
echo $this->endSection();
?>