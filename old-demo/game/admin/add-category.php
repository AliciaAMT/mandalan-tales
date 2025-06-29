<?php 
require( $_SERVER['DOCUMENT_ROOT'] . '/includes/config2.php');


//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>

<?php include( $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'); ?>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/includes/menu.php'); ?>


<div id="wrapper">

	<?php include('menu.php');?>
	<p><a href="categories.php">Categories Index</a></p>

	<h2>Add Category</h2>

	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		//collect form data
		extract($_POST);

		//very basic validation
		if($catTitle ==''){
			$error[] = 'Please enter the Category.';
		}

		if(!isset($error)){

			try {

				$catSlug = slug($catTitle);

				//insert into database
				$stmt = $db->prepare('INSERT INTO blog_cats (catTitle,catSlug) VALUES (:catTitle, :catSlug)') ;
				$stmt->execute(array(
					':catTitle' => $catTitle,
					':catSlug' => $catSlug
				));

				//redirect to index page
				header('Location: categories.php?action=added');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

	<form action='' method='post'>

		<p><label>Title</label><br />
		<input type='text' name='catTitle' value='<?php if(isset($error)){ echo $_POST['catTitle'];}?>'></p>

		<p><input type='submit' name='submit' value='Submit'></p>

	</form>

</div>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/includes/about.php'); ?>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/includes/foot.php'); ?>
