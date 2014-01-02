De makkelijkste manier om een afspraak te maken is per mail.<br />
U kunt één van onze verkopers mailen (mailadressen van de verkopers vind u op de 'Personeelsleden' pagina) voor een afspraak.

<?php echo form_open("eigenaar/afspraak_maken"); ?>
        <table>
            <?php
            foreach($query as $row)
               {
            ?>
                      <tr>
                          <td><h2>Afspraak maken voor de <?php echo $row->merk; ?> <?php echo $row->type; ?></h2></td>
                      </tr>
                      <tr>
                          <td><input type='hidden' name='autoid' value='<?php echo $row->autoid; ?>'/></td>
                      </tr>
                      <tr>
                          <td>Naam</td>
                          <td><?php echo $row->voornaam; ?> <?php echo $row->achternaam; ?></td>
                      </tr>
                      <tr>
                          <td>E-mailadres</td>
                          <td><?php echo $row->emailadres; ?></td>
                      </tr>
                      <tr>
                          <td>Dag & Tijd</td>
                          <td><input type="datetime-local" name="datum" id="datepicker1"></td>
                      </tr>
                      <tr>
                          <td><input type="submit" name="submit" value="afspraak maken"></td>
                      </tr>
              <?php
               }
echo form_close(); 
?>
</table>

