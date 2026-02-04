<?php
// datatypes:
$item="pizza";
$quantity=2;
$price=99.5;
$isgood=true;
$varieties=array("cheese","baby corn","chicken");
echo "string:";
var_dump($item);
echo "<br>";
echo "integer:";
var_dump($quantity);
echo "<br>";
echo "float:";
var_dump($price);
echo "<br>";
echo "boolean:";
var_dump($isgood);
echo "<br>";
echo "array:";
var_dump($varieties);
echo "<br> <br>";

//variable scopes:
echo "local scope: <br>";
function user(){
    $username="Nikitha";
    $email="n221102@rguktn.ac.in";
    echo "username: $username <br>";
    echo "Email: $email <br>";
}
user();

echo "global scope: <br>";
$projectname="food_delivery";
function showWebsite(){
    global $projectname;
    echo "project Name: $projectname <br>";
}
showWebsite();

echo "static scope: <br>";
function logincount(){
    static $count=0;
    $count++;
    echo "Login Attempt Count: $count <br>";
}
logincount();
logincount();
logincount();
logincount();




?>