<?php
if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $movie = $_POST['movie'];
   $rating = $_POST['rating'];
   $text = $_POST['text'];
// load previous XML from file
 $xml = simplexml_load_file("../data/reviews.xml") or die("ERROR: Cannot
load Reviews.xml.");

 // add a new feedback node
 $review = $xml->addChild('review');

 // add form data to XML
 $review->addChild('name', $name);
 $review->addChild('movie', $movie);
 $review->addChild('rating', $rating);
 $review->addChild('text', $text);
// save the whole modified XML
 $xml->asXml('../data/reviews.xml');
  // Display thank you
 header("Location: ../thankyou.html");
  
} 
//else {
 // nothing happened -- go back to feedback form
 //header("Location: ../latest movie.html");
//}
?>