<?php echo form_open('chef/edit_car'); ?>
<table class="cars2">

<?php
foreach($query as $row)
{
  
  echo "
        <tr>
            <td><h2>Wijzigen $row->merk $row->type</h2></td>
        </tr>
        <tr>
            <td><input type='hidden' name='autoid' value='$row->autoid' /></td>
        </tr>
        <tr>
            <td>Merk</td>
            <td><input type='text' id='merk' name='merk' value='$row->merk' /></td>
        </tr>
        <tr>
            <td>Type</td>
            <td><input type='text' id='type' name='type' value='$row->type' /></td>
        </tr>
        <tr>
            <td>Bouwjaar</td>
            <td><input type='text' id='bouwjaar' name='bouwjaar' value='$row->bouwjaar' /></td>
        </tr>
        <tr>
            <td>Prijs</td>
            <td><input type='text' id='prijs' name='prijs' value='$row->prijs' /></td>
        </tr>
        <tr>
            <td>Afbeelding</td>
            <td><input type='text' id='afbeelding' name='afbeelding' value='$row->afbeelding' /></td>
        </tr>
        <tr>
            <td>Filmpje</td>
            <td><textarea id='filmpje' name='filmpje' rows='8' cols='40' >$row->filmpje</textarea></td>
        </tr>
        <tr>
            <td><input type='submit' value='wijzigen' /></td>
        </tr>
        ";
  echo "<br>";
}?>
</table>
<?php echo form_close();