$('document').ready(function(){

//Removing selected file for upload
	$('.deleteFile').on('click', function(){
		let input = $('input.file');

		input.val('');
		$('.fileCont').hide();
		$('#upload-button').hide();
		$('.file + label').show();
	})


// Getting filename to display, toggling the add file and upload button 
	$('input.file').on('change', function(){
		let input = $('input.file'),
			filename;
		if (input.val().length > 0) {
			filename = input.val().split('\\').pop();
			console.log(filename);
			$('.file + label').hide();
			$('#upload-button').show();

		} 


	//Adding filename and showing
		$('.fileName').text(filename);
		$('.fileCont').show();


	});

//adds active class for Upload or My Files tab and hides/show respective divs
	$('.tabs a').on('click', function(){
		$('.tabs a').removeClass('active');
		$(this).addClass('active');
	
		if($(this).text() == 'My Files') {
			$('.myFiles').show();
			$('.form').hide();
		} else {
			$('.myFiles').hide();
			$('.form').show();
		}
	})

//Refreshes page and displays My Files Tab after deleting a file.
	$('.delete').on('click', function(){
		//Find file name
		let el = $(this).parent();
		let fileName = el.find('.fileName').text();

		//Ajax to delete file and remove element from browser.
		$.ajax({
			url: "index.php?delete=uploads/" + fileName,
			success: function(){
				console.log('deleted');
				el.fadeOut('400', function(){this.remove();});

			},
			error: function(){
				console.log('fail');
			}
		});

	});

});
