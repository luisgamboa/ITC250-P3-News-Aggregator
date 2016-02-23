<?
//read-feed-simpleXML.php
//our simplest example of consuming an RSS feed
//you can add the q= q=Asthma with the specifi categorie you want inside of the link

  $request = "https://news.google.com/news?cf=all&hl=en&pz=1&q=Asthma&ned=us&topic=m&output=rss";
  $response = file_get_contents($request);
  $xml = simplexml_load_string($response);
  print '<h1>' . $xml->channel->title . '</h1>';
  foreach($xml->channel->item as $story)
  {
    echo '<a href="' . $story->link . '">' . $story->title . '</a><br />'; 
    echo '<p>' . $story->description . '</p><br /><br />';
  }
?>