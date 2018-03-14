<?php

try {
    $connection = new PDO('mysql:host=localhost;dbname=exercise_3','root');
} catch (PDOException $e) {
    echo 'Problem with the connection! Try later!';
    }
    
$sql = "SELECT * FROM movies";
$statement = $connection->prepare($sql);
if(!$statement->execute()){
    echo 'Read error on movies database';
    return;
}
$returnedData = $statement->fetchAll();
foreach ($returnedData as $value) {
    
    $line = '<li>'.$value['title'].' '.
    $value['director'].' '.
    $value['year_of_prod'].'</li>';
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>List of movies</title>
    </head>
    <body>
    	<h1>List of movies in the database</h1>
    	<ul>
    		<?php echo $line?>
    	</ul>
    </body>
</html>