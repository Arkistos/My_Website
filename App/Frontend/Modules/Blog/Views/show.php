<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.2"></script>
<div class="container">
	<div class="row justify-content-center">
		<h2 id="title"><?= $post->title() ?></h2>
	</div>
	<?php if($post->image()!= null) { ?>
	<div class="row justify-content-center">
		<img id="banner" src="/images/post/<?= $post->title() ?>/<?= $post->image()?>">
	</div>
	<?php } ?>

	<div id="info" class="row d-flex justify-content-around  align-items-center">
		<h5  class="col-md-6">Ecrit le <?= date_format(new DateTime($post->date()), 'd-m-Y') ?> par <?= $post->author() ?>

		<?php if($user->isAuthenticated()){ ?> <a href="/admin/blog/deletePost-<?= $post['id'] ?>"><img class="icon" src="/images/icons/icon_delete.png"></a> <?php } ?> </h5>

		<div>
			<?php if($post->image()!= null) { ?>
			<img class="" id="profile_pic" src="/images/profile/<?php echo $pic?>">
			<?php }?>
		</div>
	</div>
	
	<?php foreach($listCat as $cat)
	{ ?>
	    <h2><a href="/blog/cat-<?= $cat['id'] ?> "><?= $cat->name() ?></a></h2>
    <?php } ?>

	<div class="row justify-content-center">
		<div class="contentPost col-md-6">
			<p id="content"><?= $post->content() ?></p>
			<div class="share">
				<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-via="Arkhistos" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				<div class="fb-share-button" data-href="<?= $link ?>" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8888%2Fblog%2Fpost-127&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a></div>
			
			</div>
		</div>
	</div>

	

	<div class="comments">
	<?php foreach($listComment as $com)
	{ ?>
		
			<h5><?= $com['author'] ?> le <?= date_format(new DateTime($com['date']), 'd-m-Y') ?></h5>
			<p><?= $com['commentaire'] ?></p>
		
	<?php } ?>
    </div>


	<form id="com" class="<?= $post->id() ?>">
	    <label for="comAuthor">Name</label>
	    <input type="text" name="comAuthor" id="author">
	    <label for="comContent">Commentaire</label>
	    <input type="text" name="comContent" id="contenu">
	    <button class="btn btn-lg btn-outline-secondary" type="submit" id="btnCom">Comment</button>
	</form>
</div>


<script src="/js/comment.js" type="text/javascript"></script>

