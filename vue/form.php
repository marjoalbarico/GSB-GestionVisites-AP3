
  <h1 class="titreIndex">LABORATOIRE GALAXY SWISS BOURDIN</h1>
  <img src="./img/gsbLogo.png" class="logoIndex">
      <div class="formIndex">
            <!--FORM SE CONNECTER-->
        <h1 class="titreFormIndex">Accédez à votre compte</h1>
        <form action="./?action=connexion" method="POST">
		    <label for="login" class="labelIndex">Login :</label>
		    <input type="text" id="login" name="login" class="inputIndex" required oninvalid="this.setCustomValidity('Veuillez remplir ce champ')" oninput="this.setCustomValidity('')"/>
        <br>
		    <label for="mdp" class="labelIndex">Mot de passe :</label>
		    <input type="password" name="mdp" id="mdp" class="inputIndex" required oninvalid="this.setCustomValidity('Veuillez remplir ce champ')" oninput="this.setCustomValidity('')"/><br>

		    <input type="submit" value="SE CONNECTER" class="submitIndex">
		    </form>
      </div>
