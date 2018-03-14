<?php
$norbertArray= 
[
    'firstname' => 'Norbert',
    'lastname' => 'Szekeres',
    'address' => '31, Rue de la Foret',
    'postalcode' => 'L-8317',
    'city' => 'Capellen',
    'email' => 'norbert.szekeres@gmail.com',
    'telephone' => '+352-621-183846',
    'birthdate' => '1978-10-01'
];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Introduction</title>
</head>
<body>
	<h1>Exercice 1:</h1>
	<h2>Introduce yourself !</h2>
	<ul>
		<?php 
		foreach ($norbertArray as $key => $value){
		    echo '<li>'.$key.':'.$value.'</li>';
		}
		?>
	</ul>
</body>
</html>