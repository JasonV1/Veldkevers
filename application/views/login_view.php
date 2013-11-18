<h2>Inloggen</h2>

    <?php echo form_open("user/login"); ?>
        <table>
            <tr>
                <td>E-mailadres</td>
            </tr>
            <tr>
                <td><input type="text" id="emailadres" name="emailadres" value="<?php echo set_value('emailadres'); ?>" /></td>
            </tr>
            <tr>
                <td>Wachtwoord</td>
            </tr>
            <tr>
                <td><input type="password" id="wachtwoord" name="wachtwoord" value="<?php echo set_value('wachtwoord'); ?>" /></td>
            </tr>
            <tr>
                <td><input type="submit" value="Inloggen" />
            </tr>
        </table>
<?php echo form_close(); ?>