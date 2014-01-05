<table>
    <?php
        foreach($afspraken as $row)
        {
            ?>
            <tr>
                <td><h2>Mijn afspraak</h2></td>
            </tr>
            <tr>
                <td>Datum</td>
                <td><?php echo $row->datum; ?></td>
            </tr>
            <tr>
                <td>Tijd</td>
                <td><?php echo $row->tijd; ?></td>
            </tr>
            <tr>
                <td>Bevestigd</td>
                <td><?php echo $row->bevestigd; ?></td>
            </tr>
          
    
    
    <?php
        }
    ?>
    
    
</table>

<a href="#">Annuleer deze afspraak</a>