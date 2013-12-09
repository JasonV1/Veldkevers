<h2>Registreren</h2>

    <?php echo validation_errors('<p class="error">'); ?>
    <?php echo form_open("user/registration"); ?>
        <table>
            <tr>
                <td>Voornaam*</td>
            </tr>
            <tr>
                <td><input type="text" id="voornaam" name="voornaam" value="<?php echo set_value('voornaam'); ?>" /></td>
            </tr>
            <tr>
                <td>Achternaam*</td>
            </tr>
            <tr>
                <td><input type="text" id="achternaam" name="achternaam" value="<?php echo set_value('achternaam'); ?>" /></td>
            </tr>
            <tr>
                <td>E-mailadres*</td>
            </tr>
            <tr>
                <td><input type="text" id="emailadres" name="emailadres" value="<?php echo set_value('emailadres'); ?>" /></td>
            </tr>
            <tr>
                <td>Telefoonnr</td>
            </tr>
            <tr>
                <td><input type="text" id="telefoonnr" name="telefoonnr" value="<?php echo set_value('telefoonnr'); ?>" /></td>
            </tr>
            <tr>
                <td>Adres (straatnaam + huisnr)*</td>
            </tr>
            <tr>
                <td><input type="text" id="straatnaam" name="straatnaam" value="<?php echo set_value('straatnaam'); ?>" /></td>
                <td><input type="text" id="huisnummer" name="huisnummer" style="width: 30px;" value="<?php echo set_value('huisnummer'); ?>" /></td>
            </tr>
            <tr>
                <td>Postcode</td>
            </tr>
            <tr>
                <td><input type="text" id="postcode" name="postcode" value="<?php echo set_value('postcode'); ?>" /></td>
            </tr>
            <tr>
                <td>Woonplaats</td>
            </tr>
            <tr>
                <td><input type="text" id="woonplaats" name="woonplaats" value="<?php echo set_value('woonplaats'); ?>" /></td>
            </tr>
            <tr>
                <td>Wachtwoord*</td>
            </tr>
            <tr>
                <td><input type="password" id="wachtwoord" name="wachtwoord" value="<?php echo set_value('wachtwoord'); ?>" /></td>
            </tr>
            <tr>
                <td>Bevestig wachtwoord*</td>
            </tr>
            <tr>
                 <td><input type="password" id="con_password" name="con_password" value="<?php echo set_value('con_password'); ?>" /></td>
            </tr>
            <tr>
                <td><input type="submit" value="versturen" />
            </tr>
        </table>
<?php echo form_close(); ?>
* = verplicht veld