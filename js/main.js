var btnstate = 0;
$(document).ready(function(){
	
	$('.card').click(function(){
			/* Receive File */
			if (btnstate == 2) {
				document.getElementById("form").submit();
				$('.slider').toggleClass('close');
				// alert('Second Click!');
			} else {
				$('input[type="file"]').click();
				btnstate = 1;
			}
	
	});
	
	$('.logout').click(function(){
		alert('logout Click!');
		document.getElementById('right').submit();
	});
	
	document.getElementById('file').onchange = function()
	{
		// Show update
		//alert('Selected file: ' + this.value);
		var selectedFile = document.getElementById('file').files[0].name;
		btnstate = 2;
		// Change Button
		document.getElementById("filename").innerHTML = selectedFile;
		document.getElementById("action-text").innerHTML = "Submit";
		document.getElementById("main-icon").src="icons/arrow_white.svg";
		document.getElementById('card').style.cssText = 'background: linear-gradient(to right, #FF9F4F, #FFAE6B);  color: white;';
		document.getElementById('main-icon').style.cssText = 'width: 20%;';	
	};
});
