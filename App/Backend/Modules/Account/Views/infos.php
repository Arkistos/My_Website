
<div class="container text-center">
	<div class="row">
		<p class="col-12"><?php echo $user->user()['name'] ?></p>
	</div>
	<div class="row">
		<p class="col-12"><?php echo $user->user()['email'] ?></p>
	</div>
	<p id="mdp" class="btn btn-light"> change password</p>
	<form id="mdpForm">
		<label>old password</label>
		<input class="<?php echo $user->user()['id']?>" id="oldMdp" type="password" name="oldmdp"/><br/>

		<label>new password</label>
		<input id="newMdp" type="password" name="oldmdp"/><br/>

		<input class="btn btn-light" type="submit" value="Change password"/>
	</form>

	<form id="formPic">
		<div class="file_upload">
			<label for="profile_pic">
				<?php if(!is_null($pic)){ ?>
				<img class="profile_pic" id="pic" src="/images/profile/<?=$pic?>">
				<?php }
				else{ ?>
				<img class="<profile_pic" id="pic" src="/images/icons/icon_profile.png">
			    <?php } ?>
			</label>
			<input type="file" name="profile_pic" id="profile_pic">
		</div>
	</form>
</div>

<script src="/js/updateInfo.js" type="text/javascript"></script>