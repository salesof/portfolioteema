<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <?php wp_head(); ?>
</head>

<nav class="navbar">

  <div class="nav-wrapper">

    <div class="logo">
      <?php
      if (function_exists('the_custom_logo')) {
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id, $size = 'small');
      }
      ?>
      <img src="<?php echo $logo[0] ?>" alt="Sofian logo" id="logo">
    </div>

    <?php
    wp_nav_menu(
      array(
        'menu' => 'primary',
        'container' => '',
        'theme_location' => 'primary',
        'items_wrap' => '<ul class="nav-links"><input type="checkbox" id="checkbox_toggle" />
    <label for="checkbox_toggle" class="menuicon"><i class="fa fa-bars"></i></label><div class="menu" id="mainmenu">%3$s</div></ul>'
      )
    );
    ?>

  </div>

</nav>

<body>
  <article>