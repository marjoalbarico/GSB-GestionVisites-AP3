function corrigeOuiBureau() {
    document.getElementById("dvtext").innerHTML = "Bravo! C'est la bonne réponse.";
    document.getElementById("idCompris").style.display="block";
    document.getElementById("bureauExpQues").style.display="block";
  }
  
  function corrigeNoBureau() {
    document.getElementById("dvtext").innerHTML = "Réessayez... c'est la mauvaise réponse.";
    document.getElementById("idCompris").style.display="none";
    document.getElementById("bureauExpQues").style.display="block";
  }
  