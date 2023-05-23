<div class="contenu">
    <h1>Inscrire un adhérent à un cours:</h1>
    <br>
    <?php echo $lesSeances[0]->TRANCHE;?>
    <form action="index.php?uc=admin&choix=inscription2" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="seance" class="form-label">Un cours</label>
            <select id="seance" name="seance" class="form-select" aria-label="Default select example">
                <option selected></option>
                <?php
                    foreach($lesSeances as $uneSeance){
                        echo '<option value="'.$uneSeance->NUMSEANCE.'">'.$uneSeance->TRANCHE.' '.$uneSeance->JOUR.', '.$uneSeance->CAPACITE.'</option>';
                    }
                ?>
            </select>
        </div>
        <?php
            echo '
            <input id="prof" name="prof" type="hidden" value="'.$hprof.'">
            <input id="eleve" name="eleve" type="hidden" value="'.$heleve.'">';
        ?>
        <button type="submit" class="btn btn-primary">Confirmer</button>
    </form>
</div>