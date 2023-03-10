<!DOCTYPE html>
<html>
<head>
   <title>Vintage Books Archive Results</title>
</head>
<body>
   <h1>Vintage Books Archive</h1>
   <?php
  
      //testing all fields are filled with data
      if (!isset($_POST['isbn']) || !isset($_POST['author'])
         || !isset($_POST['title']) || !isset($_POST['price'])) {
      echo "<p>You have not entered all the required details.<br/>
           Please go back and try again.</p>";
      exit;  }
      
   
    //create short variable names
    $isbn=$_POST['isbn'];
    $author=$_POST['author'];
    $title=$_POST['title'];
    $price=$_POST['price'];
    $price = doubleval($price);

    @$db = mysqli_connect('mysql.jenjac29.dreamhosters.com','brett45','#EnteredMind19!$','brett45');

     if (mysqli_connect_errno()) {
      echo "<p>Error: Could not connect to database.<br/>
 	       Please try again later.</p>";
      exit;
      }  

    $query = "INSERT INTO Books VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('sssd', $isbn, $author, $title, $price);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<p>Book inserted into the database.</p>";
        } else {
          echo "<p>An error has occurred.<br/>
               The item was not added.</p>";
        }  
   
     $db->close();  
      ?>
</body>
</html>