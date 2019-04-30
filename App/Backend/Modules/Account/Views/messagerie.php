<div class="container">

		<?php foreach ($listMessage as $msg)
					{
				?>
					<div class="row">
							<a class="col-4" href="/admin/message-<?= $msg['id'] ?>"><?= $msg['name']?> le <?= $msg['date'] ?></a>
					</div>
				<?php } ?>

</div>