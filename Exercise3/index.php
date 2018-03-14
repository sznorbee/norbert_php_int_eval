<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $title = $_POST["title"] ?? null;
    $actors = $_POST["actors"] ?? null;
    $director = $_POST["director"] ?? null;
    $producer = $_POST["producer"] ?? null;
    $year_of_prod = $_POST["year_of_prod"] ?? null;
    $language = $_POST["language"] ?? null;
    $category = $_POST["category"] ?? null;
    $storyline = $_POST["storyline"] ?? null;
    $video = $_POST["video"] ?? null;
    
    $titleOk = strlen($title)>=5;
    $actorsOk = strlen($actors)>=5;
    $directorOk = strlen($director)>=5;
    $producerOk = strlen($producer)>=5;
    $storylineOk = strlen($storyline)>=5;
    $videoOk = filter_var($video, FILTER_VALIDATE_URL);
    
    if(
        $titleOk &&
        $actorsOk &&
        $directorOk &&
        $producerOk &&
        $storylineOk &&
        $videoOk
      )
    {
        
        try {
            $connection = new PDO('mysql:host=localhost;dbname=exercise_3','root');
        } catch (PDOException $e) {
            echo 'Problem with the connection! Try later!';
        }
        $sql = "INSERT INTO movies(title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES(:title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video)";
        $statement = $connection->prepare($sql);
        $statement->bindValue('title', $title, PDO::PARAM_STR);
        $statement->bindValue('actors', $actors, PDO::PARAM_INT);
        $statement->bindValue('director', $director, PDO::PARAM_INT);
        $statement->bindValue('producer', $producer, PDO::PARAM_STR);
        $statement->bindValue('year_of_prod', $year_of_prod, PDO::PARAM_INT);
        $statement->bindValue('language', $language, PDO::PARAM_INT);
        $statement->bindValue('category', $category, PDO::PARAM_STR);
        $statement->bindValue('storyline', $storyline, PDO::PARAM_INT);
        $statement->bindValue('video', $video, PDO::PARAM_INT);
        
        if(!$statement->execute()){
            echo 'INSERT FAILED';
        }
        echo 'Success!';
    }else{
        echo 'Form non complet';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
    	<meta charset="UTF-8">
    	<title>Insert title here</title>
    	<style>
    	   p{color:red}
    	</style>
    </head>
    <body>
    	<h1>Movie register</h1>
    	
    	<form method="post">
    		
    		<label for="title">Title</label><br>
    		<?php if (!($titleOk ?? true)){?>
					<p>Minimum 5 characters!</p>
			<?php }?>
    		
    		<input type="text" name="title" value="<?php echo htmlentities($_POST['title'] ?? '');?>"/><br>
    		
    		<label for="actors">Actors</label><br>
    		<?php if (!($actorsOk ?? true)){?>
					<p>Minimum 5 characters!</p>
			<?php }?>
    		<input type="text" name="actors" value="<?php echo htmlentities($_POST['actors'] ?? '');?>"/><br>
    		
    		<label for="director">Director</label><br>
    		<?php if (!($directorOk ?? true)){?>
					<p>Minimum 5 characters!</p>
			<?php }?>
    		<input type="text" name="director" value="<?php echo htmlentities($_POST['director'] ?? '');?>"/><br>
    		
    		<label for="producer">Producer</label><br>
    		<?php if (!($producerOk ?? true)){?>
					<p>Minimum 5 characters!</p>
			<?php }?>
    		<input type="text" name="producer" value="<?php echo htmlentities($_POST['producer'] ?? '');?>"/><br>
    		
    		<label for="year_of_prod">Year_of_prod</label>
    		<select name="year_of_prod">
    			<option value="2018">2018</option>
    			<option value="2017">2017</option>
    			<option value="2016">2016</option>
    		</select><br>
    		
    		<label for="language">Language </label>
    		<select name="language">
    			<option value="eng">English</option>
    			<option value="fr">French</option>
    			<option value="gr">German</option>
    		</select><br>
    		
    		<label for="category">Category</label>
    		<select name="category">
    			<option value="comedy">Comedy</option>
    			<option value="sci-fi">Sci-fi</option>
    			<option value="action">Action</option>
    			<option value="thriller">Thriller</option>
    			<option value="animation">Animation</option>
    			<option value="fantasy">Fantasy</option>
    		</select><br>
    		
    		<label for="storyline">Storyline</label><br>
    		<?php if (!($storylineOk ?? true)){?>
					<p>Minimum 5 characters!</p>
			<?php }?>
    		<input type="text" name="storyline" value="<?php echo htmlentities($_POST['storyline'] ?? '');?>"/><br>
    		
    		<label for="video">Video</label><br>
    		<?php if (!($videoOk ?? true)){?>
					<p>Add a valid url!</p>
			<?php }?>
    		<input type="text" name="video" value="<?php echo htmlentities($_POST['video'] ?? '');?>"/><br>
    		
    		<button type="submit">Add</button>
    		
    		
    	
    	</form>
    	
    	
    </body>
</html>