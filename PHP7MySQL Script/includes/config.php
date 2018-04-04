<?php
error_reporting( 0 );
/* if database configuration form is submitted */
if(isset($_POST['saveconfig'])){

$servername = $_POST['servername'];
$username = $_POST['username'];
$password = $_POST['password'];
$dbname = $_POST['dbname'];
$error =array(); // initialize message array

/*Validate database configuration form */
if($servername ==''){
array_push($error,"Please enter Servername");
}
if($dbname ==''){
array_push($error,"Please enter DataBase Name");
}

if($username ==''){
array_push($error,"Please enter Username");
}
/* if validation error does not exist */
if(!$error){
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
array_push($error,$conn->connect_error); // if error in database connection 
}else{
/* if Database Connected */


$conn->query('DROP TABLE IF EXISTS `'.$dbname.'`.`Customer`'); // drop Customer table if already exist
/*Set Customer table column's */
$query = "CREATE TABLE Customer (first_name VARCHAR(30),last_name VARCHAR(30),street VARCHAR(50),city VARCHAR(50),state CHAR(2),zip CHAR(5))";
/* Create new Customer table with column listed*/
if ($conn->query($query) === TRUE) {

    /* if new Customer table created */
    array_push($error,"Table Customer created successfully"); /*Set success message*/
   
    /*Check if connection.php file exist*/
    if(file_exists('includes/connection.php')){
    unlink('includes/connection.php'); // delete connection.php(database connection file) file
    }
    /* Create new connection.php file */
    $txt ='<?php';
    $txt .="\n";
    $txt .= '$servername = "'.$servername.'";';
    $txt .="\n";
    $txt .= '$username = "'.$username.'";';
    $txt .="\n";
    $txt .= '$password = "'.$password.'";';
    $txt .="\n";
    $txt .= '$dbname = "'.$dbname.'";';
    $txt .="\n";
    
    $txt .= '$conn = new mysqli($servername, $username, $password, $dbname);';
    $txt .="\n";
    $txt .="\n";
    
    $myfile = fopen("includes/connection.php", "w");
    if($myfile){ /*check if web server can create new file*/
    chmod('includes/connection.php', 0777);   /*update file permission to writable*/
    fwrite($myfile, $txt);
    fclose($myfile);/* Close new connection.php file */
    }else{
    array_push($error,"Failed to create new file under includes dir, please check dir permission"); /*Set success message*/
    }
     array_push($error,"<a href='?importdata=true'>Import Sample Data</a>"); /*Set link to import sample data*/
    } else {
        array_push($error,"Error creating table: " . $conn->error); /*Set error message if can not create new table*/
    }
}

}


}


/* if database import link is submitted */
if(isset($_GET['importdata']) && $_GET['importdata'] ==true){
require 'includes/connection.php';
global $conn;
for($i=0;$i<100;$i++){ /*Import 100 row's of samle data*/
/*Generate random data */
$first_name = ucfirst(RandomString(5));
$last_name = ucfirst(RandomString(5));
$street = ucfirst(RandomString(5));
$city = ucfirst(RandomString(5));
$state = strtoupper(RandomString(2));
$zip = RandomInt(5);

$sql = "INSERT INTO Customer (first_name, last_name, street,city,state,zip)
VALUES ('".$first_name."', '".$last_name."', '".$street."','".$city."','".$state."','".$zip."')";
$conn->query($sql);

}
header("Location: index.php"); /* redirect to home screen*/
die();
}

/*Function to generate random string*/
function RandomString($limit)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
     for ($i = 0; $i < $limit; $i++) {
   
        $randstring .= @$characters[rand(0, strlen($characters))];
    }
    return $randstring;
}

/*Function to generate random string of interger*/
function RandomInt($limit)
{
    $charactersLIst = '0123456789';
    $randintstr = '';
    for ($i = 0; $i < $limit; $i++) {
        $randintstr .= @$charactersLIst[rand(0, strlen($charactersLIst))];
    }
    return $randintstr;
}



?>
