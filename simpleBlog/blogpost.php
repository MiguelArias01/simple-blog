<?php
require_once "database.php";
require_once "partial_header.php";

$id = $_GET['id'];

$result = $conn->query("SELECT content.Title, content.Content  FROM content where ID ='$id' ");


while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<div>
            
           
             
              <p> {$row['Title']}</p>
              <p>{$row['Content']}</p>
             
              
          
             
          </div>";
}

require_once "partial_footer.php";


