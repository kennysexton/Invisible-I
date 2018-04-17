$(document).ready(function(){
	$('.card').click(function(){
			/* Receive File */
			$('input[type="file"]').click();
			
			/* assign variable; */
			
			
			
	});
	
	document.getElementById('fileInput').onchange = function()
	{
		alert('Selected file: ' + this.value);
		var selectedFile = document.getElementById('fileInput').files[0].name;
		document.getElementById("filename").innerHTML = selectedFile;
	};
});