<table class="cars2">
<?php
foreach($query as $row)
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
        ";
  echo "<br>";
}?>
</table>

<?php echo $row->filmpje; ?>