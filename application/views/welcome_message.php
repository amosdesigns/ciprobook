<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo $title; ?></title>
  <meta name="description" content="<?php echo $sitedescr; ?>">
  <meta name="author" content="jerome amos">

  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- CSS concatenated and minified via ant build script-->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- end CSS-->

  <script src="assets/js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body id="<?php echo $title; ?>">

  <div id="site" class="group">
    <header class="group">
       <?php $this->load->view('inc/header');?>
    </header>
    <div id="mainContent" role="main" class="group">
        <aside id="catsnav" class="group">
            <?php $this->load->view('inc/catsnav');?>
        </aside>
        <section id="mainCopy"class="group"> 
            <?php $this->load->view('pages/'.$main);?>
        </section>
        <aside id="cats" class="group">
            <?php $this->load->view('inc/cats');?>
        </aside>
    </div>
    <footer class="group">
       <?php $this->load->view('inc/footer');?>
    </footer>
  </div> <!--! end of #container -->
 <?php $this->load->view('inc/sitestuff');?>
</body>
</html>
