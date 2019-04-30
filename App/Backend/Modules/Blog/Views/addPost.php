<h2 class="text-center">Ajouter un post</h2>
<form id="mef" action="" method="post" enctype="multipart/form-data">
  <p>
    <?= $form ?>
    <div class="banner">
        <label for="banner">Bannière</label>
        <input type="file" name="banner"/>
    </div>
    <div class="listCat">
    <?php foreach($listCat as $cat)
    {?>
    <input type="checkbox" name="cat[]" value="<?= $cat['id'] ?>"><?=$cat['name']?><br>
    <?php } ?>
    </div>
    <button id="addCat" type="button" class="btn btn-light">Ajouter une Catégorie</button>
    <input name="upload[]" type="file" multiple />
    <input type="submit" value="Ajouter" />
    </p>
</form>


<script src="/js/addPost.js" type="text/javascript"></script>