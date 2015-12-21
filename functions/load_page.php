<?php

class Page {

   var $page_title;
   var $stylesheets;
   var $redirect;

   var $body_file;
   var $body_text;

   function Page() {
      $this->stylesheets = array("css/main.css");
      $this->page_title = "";
      $this->redirect = "";
      $this->body_file = "";
      $this->body_text = "";

      return $this;
   }

   function set_title($page_title) {
      $this->page_title = trim($page_title);

      if ($this->page_title !== "") {
         $this->page_title .= " | ";
      }

      return $this;
   }

   function add_stylesheet($css) {
      $this->stylesheets[] = $css;

      return $this;
   }

   function set_redirect($redirect) {
      $this->redirect = trim($redirect);

      return $this;
   }

   function set_file($file) {
      $this->body_file = trim($file);

      return $this;
   }

   function set_text($text) {
      $this->body_text = trim($text);

      return $this;
   }

   function render() {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
      <meta http-equiv="Content-Style-Type" content="text/css">
<?php
   if ($this->redirect !== "") {
      echo "<meta http-equiv='Refresh' content='0;" . $this->redirect . "'>";
   }

   foreach ($this->stylesheets as $style) {
      echo "<link rel='stylesheet' type='text/css' href='$style'>";
   }
?>
      <link rel="shortcut icon" href="http://web.uvic.ca/~juggling/images/favicon.ico">

      <title><?php echo $this->page_title; ?> UVic Juggling Club</title>
   </head>

   <body>

      <div id="topcontent">
         <?php include("topmenu.php"); ?>
      </div>

      <div id="body">

         <div class="menu left">
            <div id="nav">
               <?php include("nav.php"); ?>
            </div>
         </div>

         <div id="centrecontent">
            <div id="maincontent">
               <?php
                  if ($this->body_file === "") {
                     if ($this->body_text !== "") {
                        echo $this->body_text;
                     }
                  } else {
                     include("content/$this->body_file");
                  }
               ?>
            </div>
         </div>

         <div class="menu right">
            <?php include("newsbar.php"); ?>
            <?php // include("linkbar.php"); ?>
         </div>

         <div id="bottomcontent">
            <?php include("bottommenu.php"); ?>
         </div>

      </div>

   </body>
</html>
<?php
   }
}
?>
