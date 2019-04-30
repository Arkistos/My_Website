

$mdpForm = $("#mdpForm");
$mdpForm.hide();
$formOn = false;

$( "#mdp" ).click(function() {
	if(!$formOn){
	  $mdpForm.show();
	  $formOn = true;
	}
	else{
		$mdpForm.hide();
		$formOn = false;
	}
});



$fileInput = $("#profile_pic");

$fileInput.change(function() {

	var formData = new FormData();
	formData.append('pic', $('input[type=file]')[0].files[0]);
	//formData.append('pic', $fileInput.files[0], $fileInput.files[0].name);
	//file = $("#profile_pic").prop('files')[0];;
	//alert(file);
	$.ajax({
    type: "POST",
    url: "/admin/changePic",
    data: formData,
    processData : false,
    contentType: false,
    mimeTypes: "multipart/form-data",
    success : function(data){
        $("#pic").attr('src', '/images/profile/' + data);
    }
    });
});