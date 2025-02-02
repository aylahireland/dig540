<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
  <style> div{background-color:green; }
    </style>
    <h1>Hello, world!</h1>
    <p style="color: orange; font-size:2cm;"></p>
    <?php {
    error_reporting(E_ALL); 
    ini_set("display_errors", 1); 

    $file_handle = fopen('./albumlist.csv', 'r');

    $first_line = fgetcsv($file_handle);

    for($i=0; $i<count($first_line); $i++){
        print_r('<div>Column header found:</div> '.$first_line[$i].'<br>');
    }
    

    while($data_row = fgetcsv($file_handle)){
        print_r("<strong><p>This is the #$data_row[0] album:<br></strong>");
        for($i=1; $i<count($data_row); $i++){
            if($i < 4){
                print_r("$first_line[$i]: $data_row[$i]<br>");
            } else {
                $genres = str_getcsv($data_row[$i]);

                for($j=0; $j<count($genres); $j++){
                    print_r("$first_line[$i] #".($j+1)." is $genres[$j]<br>");
                }
            }
        }
        print_r('</p>');
    }

    fclose($file_handle);
  } 
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  
  </body>
</html>