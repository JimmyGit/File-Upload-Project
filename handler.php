<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>File Updload</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/css/styles.css">

</head>
<body>
	<section class="container-fluid">
		<div class="row u-mt-25">
			<div class="results col-sm-offset-4 col-sm-4 u-background-white u-padding-15 u-rounded-top">
				<?php
				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;

				// Check if file already exists
				if (file_exists($target_file)) {
				    echo "Sorry, file already exists.";
				    $uploadOk = 0;
				}

				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    echo "Sorry, your file was not uploaded.";

				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				        echo "Success! Your file <strong class='u-lightBlue'>". basename( $_FILES["fileToUpload"]["name"]) . "</strong> has been uploaded.";
				    } else {
				        echo "Sorry, your file is too large to be uploaded.";
				    }
				}
				?>
				<p><a href="http://localhost:8888">Click here</a> to upload another file.</p>
			</div>
		</div>
	</section>
</body>
</html>
