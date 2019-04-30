<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= isset($title) ? $title : 'Blog' ?>
    </title>
    

    <meta name="keywords" content="developpeur, blog, impressionniste, tech, web">
    <meta name="description" content="Déveleoppeur web en freelance PHP, Symfony, Javascript">
    <meta name="author" content="Pierre">


    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet"><link rel="stylesheet" href="/css/style.css" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> 
       <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Lora|Playfair+Display|Quicksand" rel="stylesheet"> 
    <link rel="stylesheet" href="/css/style.css" type="text/css" />
    <link rel="stylesheet" href="/css/styleHome.css" type="text/css" />
    <link rel="stylesheet" href="/css/stylePost.css" type="text/css" />
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2327588890504851",
    enable_page_level_ads: true
  });
</script>
  </head>
  
<body>
  <div class="page">
    <header>
      <?php if(!isset($display) || $display == true) { ?>
      <div class="container">
        <div class="row">
          <a class="text-center col-md-4 col-sm-12" href="/"><h1>Le Blog de L'impressionniste</h1></a>
          <div id="nav" class="offset-md-4  col-md-4 col-sm-12 d-flex justify-content-around  align-items-center link"> 
            <a href="/blog">Blog</a>
            <a href="/blog/categories">Categories</a>
            <?php if($user->isAuthenticated()) { ?>
              <a href="/admin/blog/add">Écrire</a>
              <a href="/admin/blog">Admin</a>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php } ?>
    </header>


    <div id="content-wrap">
        <section id="main">
          <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>
          
          <?= $content ?>
        </section>
      </div>

    </div>
    <footer>


      <form id="getNewsletter" >
        <div class="container">
          <div class="form-row justify-content-around">
            <label id="retour" for="inputEmail" class="form-group">Get our Newsletter</label>
          </div>
          <div class="form-row justify-content-center">
            <input type="email" name="email" id="inputEmail" required placeholder="email">
            <button class="btn btn-lg btn-outline-secondary" type="submit" id="btnNews"> get newsletter</button>
          </div>
          <div class="row justify-content-around">
            <p id="validation"></p>
          </div>
        </div>
      </form>

      <div class="container">
      <div class="row justify-content-around">
        <a href="/contact"><img src="/images/icons/logo_mail.png"></a>
        <a href="https://twitter.com/Arkhistos"><img src="/images/icons/logo_twitter.png"></a>
      </div>
    </div>

      <p class="text-center">
        Copyright © <script type="text/javascript">
          var d = new Date();
          document.write(d.getFullYear());
          </script>  
          <a href="/">L'impressionniste</a> - All Rights Reserved
      </p>
    </footer>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
     <script src="/js/layout.js" type="text/javascript"></script>
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    

  </body>

</html>











