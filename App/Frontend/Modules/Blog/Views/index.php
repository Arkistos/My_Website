
	<div class="lastPost">
		<div class="container">
			<div class="row justify-content-around">
				<?php foreach ($listPost as $post)
					{
				?>
					<a href="/blog/post-<?= $post['id'] ?>"class="col-md-3 col-sm-6 col-12 boxPost overflow-hidden" style="background-image:url('/images/post/<?= $post->title() ?>/<?= $post->image()?>')">
						<p class="text-center"><?= date_format(new DateTime($post->date()), 'd-m-Y') ?></p>
						<h4 class="text-center"><?= $post->title() ?></h4>
						<p class="text-center"><?= $post->content()?></p>
					</a>
				<?php } ?>
			</div>
		</div>
	</div>
