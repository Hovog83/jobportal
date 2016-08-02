<!DOCTYPE html>
<!-- <html dir="rtl" lang="ar"> -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Post a job position or create your online resume by TheJobs!">
    <meta name="keywords" content="">

    <title>TheJobs - Login</title>

    <!-- Styles -->
    <?= $this->Html->css('app.min') ?>
    <?= $this->Html->css('thejobs') ?>
    <?= $this->Html->css('custom') ?>
<!--     <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/thejobs.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet"> -->

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/jobportal/apple-touch-icon.png">
    <link rel="icon" href="/jobportal/img/favicon.ico">
    <?= $this->Html->script('app.min.js') ?>
    <?= $this->Html->script('thejobs.js') ?>
    <?= $this->Html->script('custom.js') ?>
  </head>

  <body class="login-page">

    <main>
        <?= $this->Flash->render() ?>
        <?= $this->Flash->render('auth') ?>
        <?= $this->fetch('content') ?>
    </main>
  </body>
</html>
