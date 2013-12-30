<table>
<?php
foreach($car_data as $row)
{
  
  echo "
        <tr>
            <td><h2>Overzicht $row->merk $row->type</h2></td>
        </tr>
        <tr>
            <td><img src='".base_url()."assets/images/".$row->afbeelding."'</td>
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
            <td>$row->filmpje</td>
        </tr>
        ";
  echo "<br>";
}?>
</table>