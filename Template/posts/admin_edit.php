<div class="page-header">
    <h1>Editer un article</h1>
</div>
<form method="post" action="<?php echo Router::url('admin/posts/edit/'); ?>">
    <?php echo $this->Form->input('name', 'titre');?>
    <?php echo $this->Form->input('content', 'contenu', ['type' => 'textarea', 'rows' => '7', 'cols' => '50']);?>
</form>