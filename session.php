<?php
  session_start(); //donne acces à la supervariable $_SESSION qui persiste entre 2 requêtes PHP  
  
  //Gestion de tous les GET
  if ((isset($_GET['reset']) and $_GET['reset']=='oui' )) 
    {
      $_SESSION = [];
    }
  else
  { $mainJoueur1=$_SESSION['mainJoueur1'];
    $mainJoueur2=$_SESSION['mainJoueur2'];
    $pioche= $_SESSION['pioche'];
    $defausse=$_SESSION['defausse'];
  }
?>