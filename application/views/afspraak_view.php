<?php echo form_open("user/afspraak_view"); ?>
        <table>
            <?php
            foreach($query as $row)
               {
  
                echo "
                      <tr>
                          <td><h2>Afspraak maken voor de $row->merk $row->type</h2></td>
                      </tr>
                      ";
               }
echo form_close(); 
?>
</table>