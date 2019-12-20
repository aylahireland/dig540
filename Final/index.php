<!doctype html>
<html lang="en">
  <head>
    <title>My Genealogy</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
  <h1>My Genealogy</h1>
    <p style="font-size: 2em;">
    <span style="color: blue;">Basic list information of family</span>
    </p>
    
<b>Annie Sibley:</b> <br>
<img style="max-width: 400px" src="http://aylahireland.com/genealogy/docs/id18.jpg"><br>

<?php

  error_reporting(E_ALL); 
  ini_set("display_errors", 1); 
  
  //include('./includes/db_config.php')
  //I changed the password and make everything match, but when I load the page with the "include" line I get an error.
  include('./includes/Genealogy.php');

$file_handle = fopen('./genealogy_dataset.csv', 'r');
$first_line = fgetcsv($file_handle);
for($i=0; $i<count($first_line); $i++){ 
   print_r('Column header found: '.$first_line[$i].'<br>');
}
$genealogys = array();
    
	while($data_row = fgetcsv($file_handle)){
		$genealogy = new Genealogy();
		$genealogy->setData($data_row);
		array_push($genealogys, $genealogy);
	}

	for($i=count($genealogys)-1; $i>=0; $i--){
		print_r("<p><span style='color:red'>Relative:</span><br>");
		$genealogys[$i]->getTitleLink();
	   	print_r('</p>');
  }
 
fclose($file_handle);

$files = glob("/docs/*.jpg");
for ($i=1; $i<count($files); $i++)
{
	$num = $files[$i];
	echo '<img src="'.$num.'" alt="random image">'."&nbsp;&nbsp;";
	}

?>


    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>