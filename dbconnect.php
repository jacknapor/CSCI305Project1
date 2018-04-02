<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('MovieInfo.db');
    }
}

$db = new MyDB();
if(!$db)
{
    echo $db->lastErrorMsg();
}

$hId = $_GET['title']; //we're getting the passed hId as a paramater in the url

$query = $db->prepare("SELECT title FROM movies WHERE title=:id");
$query->bindValue(':id', $hId, SQLITE3_INTEGER);
$results = $query->execute()->fetchArray();
echo $results['name'];
?>