<h2>De chef</h2>
<table>
<?php
foreach($chefs as $row)
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
}?>
</table>
<br />
<h2>Overzicht verkopers</h2>
<table>
<?php
foreach($verkopers as $row)
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
}?>
</table>
