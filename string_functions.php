<?php
$website = "swiggy food delivery";
$user = "nikitha";

echo "Hardcoded String: $website <br>";
echo "basic string functions: <br>";
echo "Length:".strlen($user)."<br>";
echo "word count:".str_word_count($user)."<br>";
echo "reverse:".strrev($user)."<br><br>";
echo "case conersions: <br>";
echo "uppercase:".strtoupper($user)."<br>";
echo "lowercase:".strtolower($user)."<br>";
echo "uppercase first :".ucfirst($user)."<br>";
echo "uppercase words:".ucwords($user)."<br>";
echo "search pos of a string:".strpos($user,"iki")."<br>";
echo "replace:".str_replace("food","online food",$website)."<br><br>";
echo "substring and trimming: <br>";
echo "substring:".substr($user,0,3)."<br>";
echo "trim:".trim($user)."<br>";
echo "left trim:".ltrim($user)."<br>";
echo "right trim:".rtrim($user)."<br><br>";
echo "string comparisions:<br>";
echo "string compare:".strcmp("user","email")."<br><br>";
echo "strcasecmp:".strcasecmp("Swiggy","swiggy")."<br><br>";
echo "special characters and security:<br>";
echo "specialchars:".htmlspecialchars("<script>alert('hi')</script>")."<br>";
echo "add slashes:".addslashes("o'really")."<br>";

?>