<form>
    <fieldset>
        <legend>
            form
        </legend>
        <div>
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" title="name">
        </div>
        <div>
            <label for="first-name">Prenom</label>
            <input type="text" id="first-name" name="first-name" title="first-name">
        </div>
        <div>
            <label for="email">Email professionnel</label>
            <input type="text" id="email" name="email" title="email">
        </div>
        <div>
            <label for="motPasse">MDP</label>
            <input type="password" id="motPasse" name="motPasse" title="motPasse">
        </div>
        <div>
            <label for="numeroPhase">N° phase de l'ecole</label>
            <input type="text" id="numeroPhase" name="numeroPhase" title="numeroPhase">
        </div>
        <div>
            <input type="checkbox" id="partenaire" name="partenaire" value="partenaire" />
            <label for="partenaire">partenaire</label>
            <input type="checkbox" id="exceptionnel" name="exceptionnel" value="exceptionnel" />
            <label for="exceptionnel">exceptionnel</label>
        </div>
        <div>
            <label for="Motif"></label>

            <textarea id="Motif" name="Motif" rows="5" cols="33">
               Raison...
            </textarea>
        </div>
    </fieldset>
    <button type="submit">Soumettre</button>
</form>