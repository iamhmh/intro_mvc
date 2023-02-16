<table>
    <thead>
        <tr>
            <th></th>
            <th>Titre</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($images as $k => $v): ?>
            <tr>
                <td>
                    <a href="#" onclick="FileBrowserDialogue.sendURL('<?php echo Router::webroot('img/' . $v->file);?>')">
                        <img src="<?php echo Router::webroot('img/' . $v->file);?>" height="50">
                    </a>
                </td>
                <td>
                    <?php echo $v->name;?>
                </td>
                <td>
                    <a href="<?php echo Router::url('admin/medias/delete/' . $v->id);?>" onclick="return confirm('Voulez-vous coucher avec moi ce soir?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
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
<script type="text/javascript" src="<?php echo Router::webroot('js/tinymce/tiny_mce_popup.js'); ?>"></script>
<script type="text/javascript">
    let FileBrowserDialogue = {
        init:function()
        {
            //ici je peux initialiser mes propres conditions au chargement
        },
        sendURL:function(URL)
        {
            let win = tinyMCEPopup.getWindowArg("window");
            win.document.getElementById(tinyMCEPopup.getWindowArg("input")).value = URL;
            if(typeof(win.ImageDialog) != 'undefined')
            {
                if(win.ImageDialog.getImageData)
                {
                    win.ImageDialog.getImageData();
                }
                if(win.ImageDialog.showPreviewImage)
                {
                    win.ImageDialog.showPreviewImage(URL);
                }
            }
            tinyMCEPopup.close();
        }
    };
    tinyMCEPopup.onInit.add(FileBrowserDialogue.init, FileBrowserDialogue);
</script>