<table>
    <thead>
        <tr>
            <th></th>
            <th>Titre</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
<div class="page-header">
    <h1>Ajouter une image</h1>
</div>
<form action="<?php Router::url('admin/medias/index/' . $post_id);?>" method="post" enctype="multipart/form-data">
        <?php echo $this->Form->input('file', 'Image', ['type' => 'file']); ?>
        <?php echo $this->Form->input('name', 'Titre'); ?>
    <div class="actions">
        <input type="submit" value="Envoyer" class="btn btn-primary">
    </div>
</form>
<!--
<script type="text/javascript" src="<?php //echo Router::webroot('js/tinymce/tiny_mce.js'); ?>"></script>
<script type="text/javascript" src="<?php //echo Router::webroot('js/tinymce/tiny_mce_popup.js'); ?>"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
</script>
-Je fais appel au popup de tinymce grace au javascript tiny_mce_popup.js
-Je vais créer une boite de dialogue pour aller chercher mes images sur l'ordinateur
-je vais initialiser mes fonctions 
-J'envoie l'url de téléchargement
-Je vais prendre la value de l'input de mon url
-Je vais prendre les dimensions de l'image en width et height
-Je vais mets mon image en preview si nécessaire
-Je vais fermer la pop-up de tiny_mce
-J'envoie mes données pour l'upload et l'envoi en base de donnée
tiny_mce_popup.onInit.add(FileBrowerDialog.Init, FileBrowerDialog)
-->