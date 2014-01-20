<table class="afspraken_tabel">
    <tr>
        <th><h3>Vraag</h3></th>
        <th><h3>Antwoord</h3></th>
    </tr>
<?php
foreach($query as $row)
{
  echo "
        <tr>
            <td>$row->vraag</td>
            <td>$row->antwoord</td>
        </tr>
        ";
}?>
</table>