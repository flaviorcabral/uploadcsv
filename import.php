<?php

//connect to the database
$connect = new PDO('mysql:host=localhost;dbname=csv','root','');

//

if ($_FILES[csv][size] > 0) {

    //get the csv file
    $file = $_FILES[csv][tmp_name];
    $handle = fopen($file,"r");

    //loop through the csv file and insert into database
    do {
        if ($data[0]) {
            $connect->exec("INSERT INTO contacts (contact_first, contact_last, contact_email) VALUES
                (
                    '".addslashes($data[0])."',
                    '".addslashes($data[1])."',
                    '".addslashes($data[2])."'
                )
            ");
        }
    } while ($data = fgetcsv($handle,1000,",","'"));
    //

    //redirect
    header('Location: index.php?sucesso=1'); die;

}

?>

