<h2>Nieuwe auto</h2>

<?php echo validation_errors(); ?>
 <?php echo form_open("chef/new_car"); ?>
        <table>
            
            <tr>
                <td>Merk*</td>
            </tr>
            <tr>
                <td><input type="text" id="merk" name="merk" value="<?php echo set_value('merk'); ?>" /></td>
            </tr>
            <tr>
                <td>Type*</td>
            </tr>
            <tr>
                <td><input type="text" id="type" name="type" value="<?php echo set_value('type'); ?>" /></td>
            </tr>
            <tr>
                <td>Bouwjaar*</td>
            </tr>
            <tr>
                <td><input type="text" id="bouwjaar" name="bouwjaar" value="<?php echo set_value('bouwjaar'); ?>" /></td>
            </tr>
            <tr>
                <td>Prijs*</td>
            </tr>
            <tr>
                <td><input type="text" id="prijs" name="prijs" value="<?php echo set_value('prijs'); ?>" /></td>
            </tr>
            <tr>
                <td>Afbeelding*</td>
            </tr>
            <tr>
                <td><input type="text" id="afbeelding" name="afbeelding" value="<?php echo set_value('afbeelding'); ?>" /></td>
            </tr>
            <tr>
                <td>Filmpje*</td>
            </tr>
            <tr>
                <td><textarea id="filmpje" name="filmpje" rows="8" cols="40"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="versturen" /></td>
            </tr>
        </table>
<?php echo form_close();