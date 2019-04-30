<link rel="stylesheet" href="/css/styleAdmin.css" type="text/css" />

<a href="/admin/info"><h2 class="text-center"> Vos infos </h2></a>
<div class="container">

		<?php foreach ($listPost as $post)
					{
				?>
		<div class="row justify-content-around">
					<a href="/blog/post-<?= $post['id'] ?>"><p class="text-center"><?= date_format(new \Datetime($post['date']), 'd-m-Y')?> - <?= $post['title'] ?></p></a><a href="/admin/blog/deletePost-<?= $post['id'] ?>"><img class="icon" src="/images/icons/icon_delete.png"></a>
					</div>
				<?php } ?>


</div>