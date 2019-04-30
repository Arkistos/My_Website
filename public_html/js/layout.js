/*
var buttonState = true;
var angle = 0;
document.getElementById("slide").onclick = function rotateButton(){
	var button = document.getElementById("slide");
	var i = 0;
	if(buttonState === true){
		angle += 5;
		button.style.transform = "rotate("+ angle + "deg)";
		if(angle < 90){
			requestAnimationFrame(rotateButton);
		}
		else{
			buttonState = false;
		}
	}
	else
	{
		angle -= 5;
		button.style.transform = "rotate("+ angle + "deg)";
		if(angle >0){
			requestAnimationFrame(rotateButton);
		}
		else{
			buttonState = true;
		}
	}
}



/***Newsletter***/
var $form = $('#getNewsletter');
var $mail;
var $comment;

$form.on('submit', function(e){
	e.preventDefault();
	$mail = $('#inputEmail').val();
	$.ajax({
  	type: "POST",
  	url: '/newsletter',
  	data: {"data":$mail}
	});
});




