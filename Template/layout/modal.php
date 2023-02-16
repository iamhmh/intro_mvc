<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://getbootstrap.com/1.2.0/assets/css/bootstrap-1.2.0.min.css">
    <title>Document</title>
</head>
<body>
    <?php $this->Session->flash();?>
    <?php echo $content_for_layout; ?>
</body>
</html>