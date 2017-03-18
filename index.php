<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>File Updload</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- Latest compiled and minified CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/css/styles.css">
	<script src="/js/upload.js"></script>

</head>
<body>
	<section class="container u-mt-25">
			<div class="appDiv col-md-4 col-md-offset-4">
				<ul class="tabs col-sm-12 u-background-grey u-nopadding u-rounded-top">
					<li class="col-sm-6 col-xs-6 text-center u-padding-15"><a class="u-lightBlue u-pointer active">Upload</a></li>
					<li class="col-sm-6 col-xs-6 text-center u-padding-15"><a class="u-lightBlue u-pointer">My Files</a></li>
				</ul>


			<!----------    Upload Files form ------------>
			<div class="form col-sm-12 u-background-white text-center u-pb-15">

				<h2 class="u-lightBlue u-pt-15 u-pb-15">Please Choose Your File</h2>
				<div class="arrowDown u-background-lightGrey u-margin-auto u-mb-60"></div>

				<form id="file-form" action="handler.php" method="POST" enctype="multipart/form-data" class="u-clear u-margin-auto u-pb-15 u-mb-60">
				  <input type="file" id="fileToUpload" name="fileToUpload" class="file" />
				  <label for="fileToUpload" class="u-block u-margin-auto u-pointer"><span class="glyphicon glyphicon-file" aria-hidden="true"></span><span class="buttonText">Select File</span></label>

				  <div class="fileCont u-padding-15 u-background-lightGrey u-grey u-mb-60 u-displaynone">
				  	<span class='fileName'></span><span class="deleteFile u-background-grey u-lightGrey u-pointer">x</span>
			  	  </div>

				  <button type="submit" name="submit" id="upload-button" class="u-displaynone u-margin-auto u-padding-15 u-pointer"><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span><span class="buttonText">Upload File</span></button>
				  <span class="disclaimer u-grey u-block">50k max</span>
				</form>
			</div>

			<!----------    My Files ------------>
			<div class="myFiles col-sm-12 u-background-white text-center u-displaynone u-pb-15">
				<h2 class="u-lightBlue u-pt-15 u-pb-15">My Files</h2>
				<div>
					<?php
						$dir = "uploads/";

						// Delete file Function
						if (isset($_GET['delete'])) {
      				unlink($_GET['delete']);
  					}
						// Open a directory, and read its contents
						if (is_dir($dir)){
						  if ($dh = opendir($dir)){
						    while (($file = readdir($dh)) !== false){
						    	if ($file != "." && $file != ".." && $file != ".DS_Store") {
						      		echo
												"<div class='fileCont u-float-left u-padding-15 u-background-lightGrey u-grey u-mb-15 u-margin-auto'>
														<span class='fileName u-float-left u-text-left'>" . $file . "</span>
														<span class='glyphicon glyphicon-remove delete u-pointer u-float-right' aria-hidden='true'></span>
														<a href='uploads/" . $file . "' class='u-float-right u-mr-25' download><span class='glyphicon glyphicon-cloud-download download u-pointer' aria-hidden='true'></span></a>
													</div>";
					      		}
						    }
						    closedir($dh);
						  }
						}
					?>
				</div>
			</div>
		</div>
	</section>

 <!--
	<?php
		// Show all information, defaults to INFO_ALL
		phpinfo();
	?> -->
</body>


</html>
