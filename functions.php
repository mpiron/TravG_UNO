<?php
function afficherCartes($listeCartes)
{ foreach($listeCartes as $carte) 
          { echo '<img class="carte" src="cartes/'.$carte['image'].'" alt="'.$carte['nom'].'">';}
}
