

<h2>Overzicht afspraken</h2>

<table class="afspraken_tabel">
    <tr>
        <th><h3>Naam</h3></th>
        <th><h3>Dag</h3></th>
        <th><h3>Tijd</h3></th>
    </tr>
<?php
foreach($query as $row)
{
  echo "
        <tr>
            <td>$row->voornaam $row->achternaam</td>
            <td>$row->datum</td>
            <td>$row->tijd</td>
        </tr>
        ";
}?>
</table>