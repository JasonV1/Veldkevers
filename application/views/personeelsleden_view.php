<h2>Overzicht verkopers</h2>
<table>
<?php
foreach($query as $row)
{
  
  echo "<tr>
            <td><h3>$row->voornaam $row->achternaam</h3></td>
        </tr>
        <tr>
            <td>E-mailadres</td>
            <td>$row->emailadres</td>
        </tr>
        <tr>
            <td>Telefoonnummer&nbsp;</td>
            <td>$row->telefoonnr</td>
        </tr>
        ";
  echo "<br>";
}?>
</table>