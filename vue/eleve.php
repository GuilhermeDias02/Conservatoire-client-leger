<div class="contenu">
    <h1>Ajouter un adhérent:</h1>
    <br>

    <form action="index.php?uc=admin&choix=ajoutEleve" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nom" class="form-label">Son nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Son prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="">
        </div>
        <div class="mb-3">
            <label for="tel" class="form-label">Un numéro de téléphone</label>
            <input type="text" class="form-control" id="tel" name="tel" placeholder="ex: 0456789012">
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">Une adresse email</label>
            <input type="text" class="form-control" id="mail" name="mail" placeholder="">
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Une adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="">
        </div>
        <div class="mb-3">
            <label for="niveau" class="form-label">Son niveau</label>
            <input type="text" class="form-control" id="niveau" name="niveau" placeholder="1 / 2 / 3 / 4">
        </div>
        <div class="mb-3">
            <label for="bourse" class="form-label">Bourse</label>
            <input type="text" class="form-control" id="bourse" name="bourse" placeholder="oui = 1 et non = 2">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>