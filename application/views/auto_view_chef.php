<h2>Overzicht auto's</h2>
<a href='<?php echo base_url(); ?>index.php/chef/new_car_view'>Maak nieuwe auto</a>
<table class="cars">
<?php
foreach($query as $row)
{
  
  echo "<tr>
            <td><img src='".base_url()."assets/images/".$row->afbeelding."'</td>
        </tr>
        <tr>
            <td><h2>$row->merk $row->type</h2></td>
        </tr>
        <tr>
            <td>Bouwjaar</td>
            <td>$row->bouwjaar</td>
        </tr>
        <tr>
            <td>Prijs</td>
            <td>€$row->prijs</td>
        </tr>
        <tr>
            <td><a href='".base_url()."index.php/chef/auto_overview_chef/$row->autoid'>Meer info</td>
            
        </tr>
        <tr>
            <td><a href='".base_url()."index.php/chef/edit_car/$row->autoid'>Wijzigen</td>
        </td>
        <tr>
            <td><a href='".base_url()."index.php/chef/delete_car/$row->autoid'>Verwijderen</td>
        </tr>
        ";
  echo "<br>";
}?>
</table>