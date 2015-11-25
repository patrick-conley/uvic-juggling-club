<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

   <!-- The document body starts at line 40. Don't change anything before or after this -->

   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
      <meta http-equiv="Content-Style-Type" content="text/css">
      <link rel="stylesheet" type="text/css" href="./stylesheets/stylesheet.css">
      <link rel="stylesheet" type="text/css" href="./stylesheets/image_stylesheet.css">
      <link rel="shortcut icon" href="http://web.uvic.ca/~juggling/images/favicon.ico">

<?php include("photos/functions.php"); ?>

      <title>Photos | UVic Juggling Club</title>
   </head>

   <body>

      <!-- top content -->
      <div id="topcontent">
         <!-- content for this section is automatically generated and unchanged between pages-->
         <?php include("topmenu.php"); ?>
      </div>

      <div id="body">

         <!-- left content -->
         <div id="leftcontent">
            <!-- content for this section is automatically generated and unchanged between pages-->
               <?php include("leftmenu.php"); ?>
            </div>

         <div id="maincontent">

            <!-- BODY -->
   <?php

   /* If the script hasn't been told to load an album, it should create an index of
    * all of them.
    * Note this intentionally creates an index when it's been given a photo but 
    * not its album.
    */
   if ( ! isset( $_GET['album'] ) )
      makeIndex();

   /* If it has an album but no photo, it should create an index of the album
    */
   else if ( ! isset( $_GET['image'] ) )
      makeAlbumIndex( $_GET['album'] );

   /* If it has an album and photo, it should open up the image
    */
   else
      makeImage( $_GET['album'], $_GET['image'] );

   ?>
         </div>

         <!-- right content -->
         <div id="rightcontent">
            <!-- content for this section is automatically generated and unchanged between pages-->
            <?php include("rightmenu.php"); ?>
         </div>

      </div>

      <!-- bottom content -->
      <div id="bottomcontent">
         <!-- content for this section is automatically generated and unchanged between pages-->
         <?php include("bottommenu.php"); ?>
      </div>

   </body>
</html>
