<?php 

echo "You can change something";

?>
<html>
<head>
<title>List of articles</title>
</head>

<body>
<?php
foreach($answer as $k){
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "ID is ";
		echo $k['id'];
		echo"<br>";
		echo "Title is ";
		echo $k['title'];
		echo "<br>";
		echo "Content is ";
		echo $k['content'];
		echo "<br>";
		echo "<br>";
		echo "<br>";
?>

<a href="/news/show/<?php echo $k['id']; ?>">You can watch it</a>
<?php } ?>
</body>

</html>