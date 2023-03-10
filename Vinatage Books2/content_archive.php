<h3>Archive</h3>

<main>
   <form action="insert_book.php" method="post">

   <fieldset>
    
     <p><label for="isbn">ISBN</label>
     <input type="text" id="isbn" name="isbn"
     maxlength="13" size="13"></p>

     <p><label for="author">Author</label>
     <input type="text" id="author" name="author"
     maxlength="30" size="30"></p>

     <p><label for="title">Title</label>
     <input type="text" id="title" name="title"
     maxlength="60" size="30"></p>

     <p><label for="price">Price</label>
     <input type="text" id="price" name="price"
     maxlength="7" size="7"></p>

   </fieldset>

    <p><input type="submit" value="Add New Book"></p>
   
   </form>
</main>