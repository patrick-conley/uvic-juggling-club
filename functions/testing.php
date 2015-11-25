<?php

/*
 * Some code to let me add hideable comments to a page.
 *
 * Include this file in the header, then call setComments() somewhere (before the news div is 
 * ideal). It displays a box (with the "announcement" div id) with a button.
 */

if ( ! isset( $_GET["comm"] ) || ! strcmp( $_GET["comm"], "on" ) )
   $active = 1;
elseif ( ! strcmp( $_GET["comm"], "off" ) )
   $active = 0;


// Set up style information right in the header

echo '<style type="text/css">
div.fixme { 
   color: red;
   ';

// NB: strcmp() returns 0 if the strings are equal...
if ( $active )
   echo 'display: visible; }';
else
   echo 'display: none; }';

?>

</style>

<?php

/* Function: setComments()
 * Purpose:  Buttons to let a tester show or hide testing comments in the code
 * Argument N/A
 * Return N/A
 */
function setComments()
{

   if ( ! isset( $_GET["comm"] ) || ! strcmp( $_GET["comm"], "on" ) )
      $active = 1;
   elseif ( ! strcmp( $_GET["comm"], "off" ) )
      $active = 0;

echo '<div id="announcement">
<p>
This page contains comments on its content. ';
if ( $active )
   echo 'To hide these comments (to show proper formatting)';
else
   echo 'To show these comments';
echo ', click this button
</p>

<form action="" method="get">';

   if ( ! isset( $_GET["comm"] ) || ! strcmp( $_GET["comm"], "on" ) )
      echo '<button name="comm" type="submit" value="off">Hide</button>';
   elseif ( ! strcmp( $_GET["comm"], "off" ) )
      echo '<button name="comm" type="submit" value="on">Show</button>';
?>

</form>

</div>

<?php
}
?>

