<div class="contenu">
    <h1>Inscrire un adhérent à un cours:</h1>
    <br>

    <form action="index.php?uc=admin&choix=inscription" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="prof" class="form-label">Le professeur</label>
            <select id="prof" name="prof" class="form-select" aria-label="Default select example">
                <option selected></option>
                <?php
                foreach ($lesProfs as $unProf) {
                    echo '<option value="' . $unProf->getId() . '">' . $unProf->getNom() . ' ' . $unProf->getPrenom() . ', ' . $unProf->getInstrument() . '</option>';
                }
                ?>
            </select>
        </div>
        <!-- <div class="mb-3">
            <label for="seance" class="form-label">La séance du professeur</label>
            <select id="seance" class="form-select" aria-label="Default select example">
                <option selected></option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div> -->
        <div class="mb-3">
            <label for="eleve" class="form-label">Un élève</label>
            <select id="eleve" name="eleve" class="form-select" aria-label="Default select example">
                <option selected></option>
                <?php
                foreach ($lesEleves as $unEleve) {
                    echo '<option value="' . $unEleve->getId() . '">' . $unEleve->getNom() . ' ' . $unEleve->getPrenom() . '</option>';
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Confirmer</button>
    </form>
</div>