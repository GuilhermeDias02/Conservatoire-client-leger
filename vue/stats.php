<div class="contenu">
    <h1>Nombre d'adhérents: <?php 
        if (isset($nbrEleves)){
            echo $nbrEleves;
        }
    ?></h1>

    <h1>Nombres d'adhérents d'un département: <?php 
        if (isset($nbrElevesDep)){
            echo $nbrElevesDep;
        }
    ?></h1>
    <br>

    <form action="index.php?uc=admin&choix=stats" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="code" class="form-label">Le code Postal</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>