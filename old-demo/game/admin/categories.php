<?php
require( $_SERVER['DOCUMENT_ROOT'] . '/includes/config2.php');

if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['delcat'])){ 

	$stmt = $db->prepare('DELETE FROM blog_cats WHERE catID = :catID') ;
	$stmt->execute(array(':catID' => $_GET['delcat']));

	header('Location: categories.php?action=deleted');
	exit;
} 

?>

<?php include( $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'); ?>


  <script language="JavaScript" type="text/javascript">
  function delcat(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = 'categories.php?delcat=' + id;
	  }
  }
  </script>


<?php include( $_SERVER['DOCUMENT_ROOT'] . '/includes/menu.php'); ?>


	<div id="wrapper">

	<?php include('menu.php');?>

	<?php 
	//show message from add / edit page
	if(isset($_GET['action'])){ 
		echo '<h3>Category '.$_GET['action'].'.</h3>'; 
	} 
	?>

	<table>
	<tr>
		<th>Title</th>
		<th>Action</th>
	</tr>
	<?php
		try {

			$stmt = $db->query('SELECT catID, catTitle, catSlug FROM blog_cats ORDER BY catTitle DESC');
			while($row = $stmt->fetch()){
				
				echo '<tr>';
				echo '<td>'.$row['catTitle'].'</td>';
				?>

				<td>
					<a href="edit-category.php?id=<?php echo $row['catID'];?>">Edit</a> | 
					<a href="javascript:delcat('<?php echo $row['catID'];?>','<?php echo $row['catSlug'];?>')">Delete</a>
				</td>
				
				<?php 
				echo '</tr>';

			}

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
	?>
	</table>

	<p><a href='add-category.php'>Add Category</a></p>

</div>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/includes/about.php'); ?>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/includes/foot.php'); ?>
