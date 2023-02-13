<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"> 
    <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
    <title><?php echo isset($title_for_layout)?$title_for_layout:'Mon site'; ?></title> 
    <link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap-1.2.0.min.css">
    </head> 
    <body>       
      
        <div class="topbar" style="position:static"> 
          <div class="topbar-inner"> 
            <div class="container"> 
              <h3><a href="#">Mon site</a></h3> 
              <ul class="nav"> 
                <?php $pagesMenu = $this->request('Pages','getMenu'); ?>
                <?php foreach($pagesMenu as $p): ?>
                    <li><a href="<?php echo __BASE_URL__.'pages/view/'.$p->id; ?>" title="<?php echo $p->name; ?>"><?php echo $p->name; ?></a></li> 
                <?php endforeach; ?>
                <li><a href="<?php echo Router::url('posts/index'); ?>">Actualité</a></li>
              </ul>
            </div> 
          </div> 
        </div> 
 
        <div class="container" style="padding-top:60px;">
            <?= $this->Session->flash(); ?>
        	  <?php echo $content_for_layout; ?>
        </div>
         
    </body> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
</html>