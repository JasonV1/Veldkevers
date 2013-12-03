
<h2>Overzicht auto's</h2>
<table class="cars">
<?php
foreach($query as $row)
{
  
  echo "<tr>
            <td><img src='".base_url()."assets/images/".$row->afbeelding."'</td>
        </tr>
        <tr>
            <td><h2>$row->merk $row->type</h2></td>
        </tr>
        <tr>
            <td>Bouwjaar</td>
            <td>$row->bouwjaar</td>
        </tr>
        <tr>
            <td>Prijs</td>
            <td>€$row->prijs</td>
        </tr>
        <tr>
            <td><a href='".base_url()."index.php/klant/auto_overzicht_klant/$row->autoid'>Meer info</td>
        </tr>
        ";
  echo "<br>";
}?>
</table>