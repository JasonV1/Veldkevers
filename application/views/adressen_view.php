<style>
    .etiketten{
        border: 1px #0000FF solid; 
    }
    
</style>

<div class='noprint'>
    <h2>Overzicht adressen</h2>
</div>
<div class='print'>
<table>
<?php
foreach($klanten as $row)
{
  echo "
        <tr>
            <td><h3>$row->voornaam $row->achternaam</h3></td>
        </tr>
        <tr>
            <td>$row->straatnaam $row->huisnummer</td>
        </tr>
        <tr>
            <td>$row->postcode $row->woonplaats</td>
        </tr>
        ";
}

foreach($eigenaren as $row)
{
  echo "
        <tr>
            <td><h3>$row->voornaam $row->achternaam</h3></td>
        </tr>
        <tr>
            <td>$row->straatnaam $row->huisnummer</td>
        </tr>
        <tr>
            <td>$row->postcode $row->woonplaats</td>
        </tr>
        ";
}?>
</table>
</div>
<div class='noprint'>
<a href="javascript:window.print()">Print deze lijst</a><br />
</div>