<div class="page-header">
    <h1>Editer un article</h1>
</div>
<form method="post" action="<?php echo Router::url('admin/posts/edit/'); ?>">
    <?php echo $this->Form->input('name', 'Titre');?>
    <?php echo $this->Form->input('slug', 'slug');?>
    <?php echo $this->Form->input('id', 'hidden');?>
    <?php echo $this->Form->input('content', 'Contenu', ['type' => 'textarea', 'rows' => '7', 'cols' => '50']);?>
    <?php echo $this->Form->input('online', 'en ligne', ['type' => 'checkbox']);?>
    <div class="action">
        <input type="submit" class="btn-primary" value="Envoyer">
    </div>
</form>