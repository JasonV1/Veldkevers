

<table class="cars2">
<?php
  $verkoopprijs = $query->prijs * 2.2;
  echo "
        <tr>
            <td><h2>Bekijken bodprijzen $query->merk $query->type</h2></td>
        </tr>
        <tr>
            <td>Standaard verkoopprijs</td>
            <td>$verkoopprijs</td>
        </tr>
        <tr>
            <td>Laagste bod</td>
            <td>$laagste</td>
        </tr>
        <tr>
            <td>Adviesbod</td>
            <td>$advies</td>
        </tr>
        <tr>
            <td>Aankoopdatum</td>
            <td>$query->aankoopdatum</td>
        </tr>
        ";
  ?>
</table>
<h2>Tabel voor absoluut laagste bod</h2>
<table>
    <th>Aantal maanden sinds aankoop</th>
    <th>Inkoopprijs</th>
    <tr>
        <td>< 3</td>
        <td>
            <?php
                echo $query->prijs * 1.4;
            ?>
        </td>
    </tr>
    <tr>
        <td>< 6</td>
        <td>
            <?php
                echo $query->prijs * 1.3;
            ?>
        </td>
    </tr>
    <tr>
        <td>< 12</td>
        <td>
            <?php
                echo $query->prijs * 1.1;
            ?>
        </td>
    </tr>
    <tr>
        <td>Meer dan 12 maanden</td>
        <td>
            <?php
                echo $query->prijs;
            ?>
        </td>
    </tr>
</table>
<h2>Tabel voor advies start bod</h2>
<table>
    <th>Aantal maanden sinds aankoop</th>
    <th>Inkoopprijs</th>
    <tr>
        <td>< 3</td>
        <td>
            <?php
                echo $query->prijs * 2;
            ?>
        </td>
    </tr>
    <tr>
        <td>< 6</td>
        <td>
            <?php
                echo $query->prijs * 1.8;
            ?>
        </td>
    </tr>
    <tr>
        <td>< 12</td>
        <td>
            <?php
                echo $query->prijs * 1.4;
            ?>
        </td>
    </tr>
    <tr>
        <td>Meer dan 12 maanden</td>
        <td>
            <?php
                echo $query->prijs * 1.3;
            ?>
        </td>
</table>