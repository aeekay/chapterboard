<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title><?= html::specialchars($this->title); ?> | ChapterBoard</title>
    <link rel="shortcut icon" href="/favicon.ico"> 
    <?= css::get(); ?>
  </head>
  <body class="<?= Router::$controller?>-<?= Router::$method ?>">
    <div id="logo">
      <?= html::anchor(Kohana::config('app.public_url'), html::image('images/logo-tagline.png', 'ChapterBoard')) ?>
    </div>
    <div id="content">
      <div id="wrap" class="clearfix">
        <div id="wrap-inner">
          <?= $content; ?>
        </div>
      </div>
    </div>
    <div id="footer">
      <div class="links">
        <?= html::anchor('http://www.chapterboard.com/privacy-policy', 'Privacy Policy', array('target' => '_blank')) ?>
        <?= html::anchor('http://www.chapterboard.com/terms-of-service', 'Terms of Service', array('target' => '_blank')) ?>
        <?= html::anchor(Kohana::config('app.public_url'), sprintf('&copy; %d ChapterBoard LLC', date('Y'))); ?> 
      </div>
      <div id="info">
        ChapterBoard is a communication and organization tool for Fraternity and Sororities.  <?= html::anchor(Kohana::config('app.public_url'), 'Find out more &raquo;') ?>
      </div>      
    </div> <!-- footer -->
    <?= javascript::get() ?>
  </body>
</html>