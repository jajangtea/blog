<?php
// set title
$this->setVar('headerTitle', $headerTitle);

// extends layout
echo $this->extend('Views\layout');
echo $this->section('content');
?>

<div class="container">
    <h1 class="mt-2"> <?php echo esc($headerTitle); ?></h1>
    <p>
        <?php echo anchor('posts/add', 'Tambah Posts', ['class' => 'btn btn-sm btn-success']); ?>
    </p>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($posts as $post) : ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++ ?></td>
                            <td><?= $post['title'] ?></td>
                            <td><?= $post['content'] ?></td>
                            <td style="text-align: center;">
                                <?php echo anchor(sprintf('posts/edit/%d', $post['id']), 'Edit', ['class' => 'btn btn-sm btn-success']); ?>
                                <?php echo anchor(sprintf('posts/delete/%d', $post['id']), 'Delete', ['onclick' => 'return confirm(\'Are you sure?\')', 'class' => 'btn btn-sm btn-danger']); ?>
                            </td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
echo $this->endSection();
?>