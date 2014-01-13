<?php echo form_open('verkoper/cancel_appointment');
foreach($query as $row)
{ ?>
<table>

<tr>
        <td><h2>Afspraak annuleren</h2></td>
        </tr>
        <tr>
            <td><input type='hidden' name='afspraaknr' value='<?php echo $row->afspraaknr; ?>' /></td>
        </tr>
        <tr>
            <td><input type='hidden' name='gebruiker_id' value='<?php echo $row->gebruiker_id; ?>' /></td>
        </tr>
        <tr>
            <td>Reden</td>
        </tr>
        <tr>
            <td><td><textarea rows="8" id="reden" name="reden" cols="40"></textarea></td></td>
        </tr>
        <tr>
            <td><input type='submit' value='annuleren' /></td>
        </tr>
</table>
<?php echo form_close(); 
}?>