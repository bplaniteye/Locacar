<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?> 
<div class="text-center">
    <h2 class="text-center">Catégorie</h2> 
    <form method="post" action="<?=hlien("categorie","edit")?>">
        <input type="hidden" name="cat_id" id="cat_id" value="<?= $id ?>" />
                <div class='form-group'>
                    <label for='cat_libelle' class="form-label">Catégorie</label>
                    <input id='cat_libelle' name='cat_libelle' type='text' size='50' value='<?=mhe($cat_libelle)?>'  class='form-control' />
                </div>
            <input class="btn btn-success mt-5" type="submit" name="btSubmit" value="Valider" />
        </form>              
</div>
<?php } ?>