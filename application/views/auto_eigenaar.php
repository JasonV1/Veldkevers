<h2>Welkom op de overzichtspagina van uw auto</h2>

<table class="cars2">
<?php
foreach($car_data as $row)
{
  
  echo "
        <tr>
            <td><img src='".base_url()."assets/images/".$row->afbeelding."'</td>
        </tr>
        <tr>
            <td>Bouwjaar</td>
            <td>$row->bouwjaar</td>
        </tr>
        <tr>
            <td>Gekocht voor:</td>
            <td>€$row->prijs</td>
        </tr>
        <tr>
            <td>Gekocht op:</td>
            <td>$row->gekocht</td>
        </tr>
        <tr>
            <td><a href='".base_url()."index.php/eigenaar/afspraak_onderhoudsbeurt/$row->autoid'>Maak afspraak voor een onderhoudsbeurt</td>
        </tr>
        ";
  echo "<br>";
}?>
</table>