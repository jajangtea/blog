<?php
// set title
$this->setVar('headerTitle', $headerTitle);

// extends layout
echo $this->extend('Views\layout');
echo $this->section('content');

?>
<div class="row">
    <div class="col">
        <h1 class="mt-2"><?php echo esc($headerTitle) ?></h1>
        <?= form_open(sprintf('posts/edit/%d', $posts['id'])); ?>
        <?= form_hidden('id', set_value('id', $posts['id'])); ?>
        <div class="form-group">
            <?= form_label('Title', 'title') ?>
            <?= form_input('title', set_value('title', $posts['title']), ['class' => 'form-control']); ?>
            <small class="form-text text-danger"> <?= $errors['title'] ?? ''; ?></small>
        </div>
        <div class="form-group">
            <?= form_label('Content', 'content') ?>
            <?= form_input('content', set_value('content', $posts['content']), ['class' => 'form-control']); ?>
            <small class="form-text text-danger"> <?= $errors['title'] ?? ''; ?></small>
            <?= form_submit('Save', 'Save', ['class' => 'btn btn-sm btn-info']); ?>
            <?php echo anchor('posts', 'Back', ['class' => 'btn btn-sm btn-danger']); ?>
            <?= form_close(); ?>
        </div>
    </div>
    <?= $this->endSection(); ?>
</div>