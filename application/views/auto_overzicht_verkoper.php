<style>
    a.button {
        background-color: #999999;
        color: #FFFFFF !important;
        display: inline-block;
        padding: 5px 8px;
        text-align: center;
    }
    .button:hover {
        text-decoration: none;
    }
</style>

<table class="cars2">
<?php
foreach($query as $row)
{
  
  echo "
        <tr>
            <td><h2>Overzicht $row->merk $row->type</h2></td>
        </tr>
        <tr>
            <td><img src='".base_url()."assets/images/".$row->afbeelding."'</td>
        </tr>
        <tr>
            <td><h2>Beschrijving</h2></td>
        </tr>
        <tr>
            <td>$row->beschrijving</td>
        </tr>
        <tr>
            <td><a class='button' href='".base_url()."index.php/verkoper/bekijk_prijzen/$row->autoid' target='_blank'>Bekijk prijzen</td>
        </tr>
        ";
  echo "<br>";
}?>
</table>
