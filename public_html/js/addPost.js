
document.getElementById("addCat").onclick = function addCat(){
    $newCat = prompt("Entrez le nom de la nouvelle catégorie");
    if($newCat != "" & $newCat != null){
      $.ajax({
      type: "POST",
      url: "/admin/blog/addCat",
      data: {"name":$newCat},
      success : function(data){
         $('.listCat').append('<input type="checkbox" name="cat[]" value="' + data + '">' + $newCat + '<br>');
      }
      })
    }
    else{
      alert('erreur de saisie de categorie')
    }
   
};

/*
$form.on('submit', function(e){
	e.preventDefault();
	$mail = $('#inputEmail').val();
	$.ajax({
  	type: "POST",
  	url: '/newsletter',
  	data: {"data":$mail}
	});
});*/