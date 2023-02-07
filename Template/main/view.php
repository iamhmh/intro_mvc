<h1><?= $page->name ?></h1>
<p><?= $page->content ?></p>

<?php foreach($pages as $p): ?>

    <?= $p->id . ' , ' . $p->name . ' - ' ?>

<?php endforeach; ?>