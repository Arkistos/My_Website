var $formComment = $('#com');
var $author;
var $comment;
var $post_id;

$formComment.on('submit', function(e){
	e.preventDefault();
	$author = $('#author').val();
	$comment = $('#contenu').val();
	$post_id = $formComment.attr('class');
	$.ajax({
  	type: "POST",
  	url: '/blog/post/addComment',
  	data: {"author":$author, "comment":$comment, "postId":$post_id},
  	success : function(data){
  		$('.comments').append('<h5>' + $author + ' le ' + data + '</h5>');
  		$('.comments').append('<p>' + $comment + '<p>');
  	}
	})
});