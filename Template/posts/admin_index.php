<div class="page-header">
    Editer un article
    <h1><?php $total ?> Articles</h1>
</div>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $k => $v): ?>
            <tr>
                <td><?= $v->id ?></td>
                <td><?= $v->name?></td>
                <td>
                    <a href="<?php echo Router::url('admin/posts/edit/' . $v->id); ?>">Editer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>