<!DOCTYPE html>
<html>
<head>
  <title>Vintage Books Search Results</title>
</head>
<body>
   <h1>Vintage Books Search Results</h1>

 <?php

  //create short variable names
   

   $searchtype=$_POST['searchtype'];
   $searchterm=trim($_POST['searchterm']);


   if (!$searchtype || !$searchterm) {
   echo '<p>You have not entered search details.<br/>
   Please go back and try again.</p>';
   exit;
   }
  
    

// whitelist the searchtype
   
  switch ($searchtype)  {
     case 'title':
     case 'author':
     case 'isbn':
       break;
     default:
       echo '<p>That is not a valid search type. <br/>
       Please go back and try again.</p>';
       exit;
       } 


//Checking connection 

    @$db = mysqli_connect('mysql.jenjac29.dreamhosters.com','brett45','#EnteredMind19!$','brett45');

    if (mysqli_connect_errno()) {
      echo '<p>Error: Could not connect to database.<br/>
 	       Please try again later.</p>';
      exit;
      }

// creating query

   $query = "SELECT ISBN, Author, Title, Price 
             FROM Books WHERE $searchtype = ?";
   $stmt = $db->prepare($query);
   $stmt->bind_param('s', $searchterm);
   $stmt->execute();
   $stmt->store_result();

   $stmt->bind_result($isbn, $author, $title, $price);

   echo "<p>Number of books found: ".$stmt->num_rows."</p>";

//returning results
   
  while($stmt->fetch())  {
      echo "<p><strong>Title: ".$title."</strong>";
      echo "<br />Author: ".$author;
      echo "<br />ISBN: ".$isbn;
      echo "<br />Price: \$".number_format($price,.2)."</p>";  	

      }
      
      $stmt->free_result();
      $db->close();
   
?>
</body>
</html>