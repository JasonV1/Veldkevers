<table>
<?php
foreach($query as $row)
{
  
  echo "<tr>
            <td><h2>Overzicht $row->merk $row->type</h2></td>
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