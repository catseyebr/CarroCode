<head>
  <title><?php echo $this->metatags['title'] ?></title>
  <meta http-equiv="Content-Type"  content="text/html; charset=utf-8" />
  <meta name="KEYWORDS" content="<?php echo $this->metatags['keywords'] ?>" />
  <meta name="description" content="<?php echo $this->metatags['description'] ?>" />
  <meta name="author" content="<?php echo $this->metatags['author'] ?>" />
  <meta name="copyright" content="<?php echo $this->metatags['copyright'] ?>" />
  <?php echo $this->css_js->toData(); ?>
</head>