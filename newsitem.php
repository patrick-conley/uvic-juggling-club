<?php

# error case: no news file exists
if ( ! file_exists( "news/news.xml" ) && ! file_exists( "news/skeleton.xml" ) )
{
   echo "<b>ERROR: News file DNE!</b>";
}
# Base case: an xml newsfile exists
else
{

   # Get the news
   if ( ! function_exists( 'getNews' ) )
      include( 'news/functions.php' );
   $news = getNews( 1 );

   # Print the news
   echo "<h3>News - " . $news[0]->date . "</h3>";
   echo "<p>" . $news[0]->content . "</p>";

   echo '<p><a href="news.php">See past news</a></p>';

}
?>
