<style>
    table, th, td
    {
    border: 1px solid black;
    }
    th
    {
    text-align:left;
    }
    td
    {
    text-align:left;
    }
    
</style>

<table>
<?php
foreach($query as $row)
{
  
  echo "<tr>
            <td>$row->afbeelding</td>
        </tr>
        <tr>
            <td>Auto</td>
            <td>$row->merk&nbsp; $row->type</td>
        </tr>
        <tr>
            <td>Bouwjaar</td>
            <td>$row->bouwjaar</td>
        </tr>
        <tr>
            <td>Prijs</td>
            <td>€$row->prijs</td>
        </tr>
        ";
  echo "<br>";
}?>
</table>

<?php echo $row->filmpje; ?>