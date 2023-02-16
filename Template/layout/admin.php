<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"> 
    <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
    <title><?php echo isset($title_for_layout)?$title_for_layout:'Administration'; ?></title> 
    <link rel="stylesheet" href="https://getbootstrap.com/1.2.0/assets/css/bootstrap-1.2.0.min.css">
    <link rel="stylesheet" href="<?php echo Router::webroot('css/jqueryui/jquery-ui-1.8.16.custom.css'); ?>">
    </head> 
    <body>       
      
        <div class="topbar" style="position:static"> 
          <div class="topbar-inner"> 
            <div class="container"> 
              <h3><a href="<?php echo Router::url('admin/posts/index'); ?>">Administration</a></h3> 
              <ul class="nav"> 
                <li><a href="<?php echo Router::url('admin/posts/index'); ?>">Articles</a></li>
                <li><a href="<?php echo Router::url('admin/categories/index'); ?>">Catégories</a></li>
                <li><a href="<?php echo Router::url('admin/pages/index'); ?>">Pages</a></li>
                <li><a href="<?php echo Router::url(); ?>">Voir le site</a></li>
                <li><a href="<?php echo Router::url('users/logout'); ?>">Se déconnecter</a></li>
              </ul>
            </div> 
          </div> 
        </div> 
 
        <div class="container" style="padding-top:60px;">
            <?php echo $this->Session->flash(); ?>
        	<?php echo $content_for_layout; ?>
        </div>
         
    </body> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo Router::webroot('js/datepicker-fr.js'); ?>"></script>

    <script type="text/javascript">
        $(function(){
            $.datepicker.setDefaults( $.datepicker.regional['fr'] ); 
            $( ".datepicker" ).datepicker({
                dateFormat : 'yy-mm-dd'
            });
        })
    </script>
</html>