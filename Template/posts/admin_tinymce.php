<?php //debug($posts); ?>
<ul>
    <?php foreach($posts as $k => $v): ?>
        <li>
            <a href="#" onclick="FileBrowserDialogue.sendURL('<?php echo Router::url($v->type . 's/view/id:' . $v->id . '/slug:' . $v->slug);?>')">
                <?php echo ucfirst($v->type); ?> : <?php echo $v->name; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<script type="text/javascript" src="<?php echo Router::webroot('js/tinymce/tiny_mce_popup.js'); ?>"></script>
<script type="text/javascript">
    let FileBrowserDialogue = {
        init:function()
        {
            //ici je peux initialiser mes propres conditions au chargement
        },
        sendURL:function(URL)
        {
            console.log(URL);
            let win = tinyMCEPopup.getWindowArg("window");
            console.log(win);
            win.document.getElementById(tinyMCEPopup.getWindowArg("input")).value = URL;
            console.log(URL);
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