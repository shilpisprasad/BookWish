[HEAD]
<!DOCTYPE html>
<html>
    <head>
	<title>Hello, World!</title>
	<link type="text/css" rel="stylesheet" href="styles.css" />
	</head>
    <body>

[LOGIN_MAIN]
[ADD_BOOK]
	<div class="Library"> Library Management System</div>
	<a href= "/add.php"><button class="Add_Book" name="add">Add Book</button></a>
    
[HOME_PAGE_SEARCH]
    <form action="/index.php" method="GET">
	<div class="search-bar">
	    <input type="text" id="search_input" name="search" placeholder="##search##"></input>
	    <button type="submit" id="search_button"></button>
	    </div>
      
	<table>
	    <tr>
		<th>Serial Number</th>
		<th>Book Name</th>
		<th>Author Name</th>
		<th>Edit</th>
		<th>Delete</th>
		</tr>
	    <tbody>
		[[table_data]]
		</tbody>
        </table>
	</form>

[SEARCH_RES]
<div class="Library"> Library Management System</div>
	<table>
	    <tr>
		<th>Serial Number</th>
		<th>Book Name</th>
		<th>Author Name</th>
		<th>Edit</th>
		<th>Delete</th>
		</tr>
	    <tbody>
		[[table_data]]
	    </tbody>
        </table>
     </div>


    <!--div class="search-bar">
    <input type="text" id="search-input" name="q" placeholder="Search...">
    <button type="submit" id="search-button"></button>
    </div>
    <table>
      <thead>
        <tr>
          <th>Book Name</th>
          <th>Author Name</th>
          <th>Serial Number</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
	[[table_data]]
	<tr></tr>
      </tbody>
    </table>
    <span> TABLE END</span-->
[add_book_htl]
<div id="container">
    <form  action="/add.php" method="GET" id="add_form">
        <h2>Book Information</h2>
        <label for="bookName">Book Name:</label>
        <input type="text" id="bookName" name="bookname" placeholder="Enter book name"  required>

        <label for="authorName">Author Name:</label>
        <input type="text" id="authorName" name="author" placeholder="Enter author name" required>

        <label for="serialNumber">Serial Number:</label>
        <input type="text" id="serialNumber" name="serialno" placeholder="Enter serial number" required>

        <a href="/index.php" class="back">Back</a>
        <button class="save" name="save">save</button>
    </form>
</div>

[edit_book_htl]
<div id="container">
    <form  action="/edit.php" method="GET" id="add_form">
        <h2>Book Information</h2>
        <label for="bookName">Book Name:</label>
        <input type="text" id="bookName" name="bookname" value= ##bookName## readonly>

        <label for="authorName">Author Name:</label>
        <input type="text" id="authorName" name="author" value= ##authorName##>

        <label for="serialNumber">Serial Number:</label>
        <input type="text" id="serialNumber" name="serialno" value=##serialNumber## >

         <a href="/index.php" class="back">Back</a>
        <button class="save" name="update">Update</button>
    </form>
</div>

[book_htl]
<div id="container">
    <form  action="/add.php" method="GET" id="add_form">
        <h2>Book Information</h2>
        <label for="bookName">Book Name:</label>
        <input type="text" id="bookName" name="bookname" value= ##bookName##>

        <label for="authorName">Author Name:</label>
        <input type="text" id="authorName" name="author" value= ##authorName##>

        <label for="serialNumber">Serial Number:</label>
        <input type="text" id="serialNumber" name="serialno" value=##serialNumber## >

         <a href="/index.php" class="back">Back</a>
        <button class="save" name="save"  onclick="alert('##msg##')">##button##</button>
    </form>
</div>



[null_book]
 	<h1 id= "null">Books not available</h1>

[draw_data]
        <tr class="data_table">
          <td>##bookName##</td>
          <td>##authorName##</td>
          <td>##serialNumber##</td>
          <td><a href= "/edit.php?edit=&book=##bookName##" class="edit-btn"></a></td>
          <td><a href= "/edit.php?delete=&book=##bookName##"  class="delete-btn" ></a></td>
        </tr>

[FOOTER]
  </body>
</html>
