<?php
session_start();
 ?>
<html>
  <body style="background-color: #FFD119">
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogweb";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$key=$_POST['key'];
$re="SELECT blogger_info.blogger_id,email,blogger_username,blog_master.blog_id,blog_title,blog_desc,blog_auther,blog_category FROM blog_master,blogger_info WHERE (email like '$key%' or blogger_username like '$key%' or blog_title like '$key%' or blog_desc  like '$key%' or blog_auther  like '$key%' or blog_category  like '$key%') ORDER BY blog_master.blog_id";
		echo "<div class=\"container\">  
  <table class=\"table table-striped\">
    <thead>
      <tr>
        <th>Blogger_id</th>
        <th>Email</th>
        <th>Username</th>
		<th>Blog_id</th>
        <th>Title</th>
		<th>Description</th>
        <th>Author</th>
        <th>Category</th>
      </tr>
    </thead>
    <tbody>";
		
		$rs = mysqli_query($conn,$re);
while ($row=mysqli_fetch_array($rs))
	{
	
	$p=$row['blogger_id'];
	$p1=$row['email'];
	$p2=$row['blogger_username'];
	$p3=$row['blog_id'];
	$p4=$row['blog_title'];
	$p5=$row['blog_desc'];
	$p6=$row['blog_auther'];
	$p7=$row['blog_category'];

echo "<tr><td>$p</td><td>$p1</td><td>$p2</td><td>$p3</td><td>$p4</td><td>$p5</td><td>$p6</td><td>$p7</td></tr>";
}
echo "</tbody></table></div>";
  ?>
  </body>
  </html>