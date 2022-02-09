<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GSB Gestion Visites</title>
    <style type="text/css">
            @import url("./css/style.css");
            @import url("./css/images.css");
            @import url("./css/forms.css");
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script>
        $(document).ready(function() {
          var max_fields      = 10; //maximum input boxes allowed
          var wrapper         = $(".input_fields_wrap"); //Fields wrapper
          var add_button      = $(".add_field_button"); //Add button ID
        
          var x = 1; //initlal text box count
        
        
        $(add_button).click(function(e){ //on add input button click
              e.preventDefault();
              if(x < max_fields){ //max input box allowed
        
              //text box increment
                  $(wrapper).append('<div><label for="quantite" class="nouvRapLabelQttMedic">Quantité : </label><input type="number" name="mynumber[]" id="quantite" class="qttNouvRap"><label for="medicament" class="nouvRapLabelQttMedic"> Medicament : </label><input list="medicaments" name="mytext[]" id="medicament" class="inputPrac" placeholder="Nom du medicament..."><datalist id="medicaments"></datalist><a href="#" class="remove_field">Supprimer</a></div>'); //add input box
                  x++; 
          }
          });
        
          $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            
          e.preventDefault(); 
          $(this).parent('div').remove(); 
          x--;
          })
      });
        
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
          $('input[type="radio"]').click(function () {
            var inputValue = $(this).attr("value");
            var target = $("." + inputValue);
            $(".select").not(target).hide();
            $(target).show();
          });
        });
      </script>
  </head>
  <body>
    