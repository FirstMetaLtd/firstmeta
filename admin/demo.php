<?php 
include 'private/autoload.php';
$search_keyword = 'virat kohli';
if(!empty($_POST['search']['keyword'])) {
	$search_keyword = $_POST['search']['keyword'];
}
$sql = 'SELECT * FROM posts WHERE title LIKE :keyword OR description LIKE :keyword OR short_desc LIKE :keyword ORDER BY id DESC ';

$pdo_statement = $con->prepare($sql);
$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
print_r($result);
?>