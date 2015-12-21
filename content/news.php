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
   if ( ! function_exists( 'getNews' ) ) {
      include( 'news/functions.php' );
   }
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
