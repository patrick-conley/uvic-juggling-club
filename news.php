<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

   <!-- The document body starts at line 40. Don't change anything before or after this -->

   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
      <meta http-equiv="Content-Style-Type" content="text/css">
      <link rel="stylesheet" type="text/css" href="./stylesheets/stylesheet.css">
      <link rel="shortcut icon" href="http://web.uvic.ca/~juggling/images/favicon.ico">

      <title>News Archive | UVic Juggling Club</title>
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
            <div id="news">
               <h2>Club news</h2>
   <?php
# error case: no news file exists
if ( ! file_exists( "news/news.xml" ) && ! file_exists( "news/skeleton.xml" ) )
{
   echo "<b>ERROR: News file DNE!</b>";
}
# Good case: xml newsfile exists
else
{
   # get the news
   if ( ! function_exists( 'getNews' ) )
      include( 'news/functions.php' );
   $news = getNews();

   # Print the news
   foreach ( $news as $item )
   {
      echo "<h3>" . $item->date . "</h3>";
      echo "<p>" . $item->content . "</p>";
   }

}
      ?>

            </div>

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
