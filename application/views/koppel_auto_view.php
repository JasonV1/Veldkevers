<?php echo form_open('verkoper/make_new_owner'); ?>
<table>
<?php
foreach($car_data as $row)
{
?>
        <tr>
            <td><h2><?php echo $row->merk; ?> <?php echo $row->type; ?> koppelen aan klant</h2></td>
        </tr>
        <tr>
            <td>Naam eigenaar (achternaam)</td>
            <td>
                <?php echo form_dropdown('achternaam', $achternaam); ?>
            </td>
        </tr>
        <tr>
            <td><input type='hidden' name='autoid' value='<?php echo $row->autoid; ?>'/></td>
        </tr>
        <tr>
            <td>Datum gekocht</td>
            <td><input type='date' max="<?php echo date('Y-m-d'); ?>" name='gekocht' id='gekocht' /></td>
        </tr>
        <tr>
            <td><input type="submit" value="Auto koppelen" /></td>
        </tr>

</table>
<?php }
echo form_close(); ?>