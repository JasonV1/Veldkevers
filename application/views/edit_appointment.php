<?php echo form_open('chef/edit_appointment'); ?>
<table>

<?php
foreach($query as $row)
{
  
  echo "<tr>
            <td>Wijzigen afspraak van $row->voornaam $row->achternaam</td>
        </tr>
        <tr>
            <td><input type='hidden' name='afspraaknr' value='$row->afspraaknr' /></td>
        </tr>
        <tr>
            <td>Datum</td>
            <td><input type='date' id='datum' name='datum' value='$row->datum' /></td>
        </tr>
        <tr>
            <td>Tijd</td>
            <td><input type='text' id='tijd' name='tijd' value='$row->tijd' /></td>
        </tr>
        <tr>
            <td>Bevestigd</td>
            <td><input type='text' id='bevestigd' name='bevestigd' value='$row->bevestigd' /></td>
        </tr>
        <tr>
            <td><input type='submit' value='wijzigen' /></td>
        </tr>
        ";
  echo "<br>";
}?>
</table>
<?php echo form_close();