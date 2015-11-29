<?php 

/*
 * Make a page using a template for everything but the body
 *
 * $page:      File to load in /content. May be substituted for $text
 * $title:     Page title. May be empty
 * $text:      Content text. May be substituted for $page
 * $redirect:  Page redirect destination
 */
function loadPage($page, $title, $text, $redirect) { 
   if (trim($title) !== "") {
      $title .= " | ";
   } 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
      <meta http-equiv="Content-Style-Type" content="text/css">
<?php
   if (trim($redirect) !== "") {
      echo "<meta http-equiv='Refresh' content='0;$redirect'>";
   }
?>
      <link rel="stylesheet" type="text/css" href="./stylesheets/stylesheet.css">
      <link rel="shortcut icon" href="http://web.uvic.ca/~juggling/images/favicon.ico">

      <title><?php echo "$title"; ?> UVic Juggling Club</title>
   </head>

   <body>

      <div id="topcontent">
         <?php include("topmenu.php"); ?>
      </div>

      <div id="body">

         <div id="leftcontent">
            <?php include("leftmenu.php"); ?>
         </div>

         <div id="centrecontent">
            <div id="nav">
               <?php include("nav.php"); ?>
            </div>

            <div id="maincontent">
               <?php 
                  if (trim($page) === "") {
                     if (trim($text) !== "") {
                        echo $text;
                     }
                  } else {
                     include("content/$page"); 
                  }
               ?>
            </div>

         </div>

         <div id="rightcontent">
            <?php include("rightmenu.php"); ?>
         </div>

         <div id="bottomcontent">
            <?php include("bottommenu.php"); ?>
         </div>

      </div>

   </body>
</html>
<?php } ?>
