<?php

 get_header(); ?>

This is the new homepage, bitch!

<?php
    // Home Page, showing only the images as menus
    $destination = 'collection';
    include( locate_template( 'template-parts/content-images-menu.php', false, false ) ); 
?>