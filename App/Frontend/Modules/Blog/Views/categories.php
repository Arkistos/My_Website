<div class="container">
	<div class="row justify-content-around">
		<?php foreach ($listCat as $cat)
					{
				?>
					<a href="/blog/cat-<?= $cat['id'] ?>" class="col-md-3 col-sm-6 col-12 boxCat overflow-hidden">
						<h4 class="text-center center-vert"><?= $cat->Name() ?></h4>
					</a>
				<?php } ?>
	</div>

</div>