<?php

# A note on organization:
#
# $values contains an array (nb: in php array <=> hash) of tag hashes. Each tag array contains its 
# name, its indent level, whether it is an open, close, or complete tag. If it is complete, the 
# unformatted text is included.
#    Array
#    (
#       [0]->Array
#       (
#          [tag] => items,
#          [type] => open,
#          [level] => 1
#       ),
#
# $tags contains a hash of tag arrays, keyed by tag name. The arrays contain only the indices of the 
# key tag in the $value array. A 'complete' instance of a tag will only have one line in this array, 
# while open and close instances will have separate lines.
#    Array
#    (
#       [item]->Array
#       (
#          [0] => 0
#          [1] => 3

# Function: getNews( max_n_items ) {{{1
# Purpose: get news items
function getNews( $n_items = 0 )
{

   if ( file_exists( "news/news.xml" ) )
      $newsfile = "news/news.xml";
   else
      $newsfile = "news/skeleton.xml";

   $raw_data = implode( "", file( $newsfile ) );
   $parser = xml_parser_create();
   xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
   xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
   xml_parse_into_struct($parser, $raw_data, $values, $tags);
   xml_parser_free($parser);

   # Loop through the items
   foreach ( $tags as $key=>$val )
   {

      if ( $key != "item" )
         continue;
      else
      {

         # Get the array of "item" instances
         $items = $val;

         # Each "item" should have both open and close pairs
         for ( $i = 0; $i < count( $items ) && ( $n_items == 0 || $i < 2*$n_items ); $i += 2 )
         {
            # Get the position and length of the tags inside the item
            $data_begin = $items[$i] + 1;
            $length = $items[$i + 1] - $data_begin;

            # Process the item
            $item_data = array_slice( $values, $data_begin, $length );
            $parsed_items[] = parseItem( $item_data );

         }

         # We have everything with the "item" tag
         return $parsed_items;

      }

   }

}

# Class: NewsItem( %data ) {{{1
# Purpose: Class storing the date and content of a single news item
class NewsItem
{
   var $date;
   var $content;
    
   function NewsItem ($data)
   {
      foreach ($data as $key=>$value)
      {
         $this->$key = $data[$key];

         $this->$key = str_replace( '[', '<', $this->$key );
         $this->$key = str_replace( ']', '>', $this->$key );
      }
   }

} 

# Function: parseItem( $values ) {{{1
# Purpose: Create a NewsItem object out of the XML $values array
function parseItem( $data )
{

    for ($i=0; $i < count($data); $i++) {
        $item[$data[$i]["tag"]] = $data[$i]["value"];
    }
    return new NewsItem($item);
} # }}}1

?>
