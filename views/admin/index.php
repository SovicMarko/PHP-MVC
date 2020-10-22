<?php
    require '_adminNav.php';
?>
<h1 class="page-header"> Admin Panel </h1>
<div class="row">
    <div class="col col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="admin-counter">
            <h2>Broj objava</h2>
            <h1><?php echo $this->readResult->num_rows;?></h1>
        </div>
        

    </div>

    <div class="col col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="admin-counter">
            <h2>Broj kategorija</h2>
            <h1><?php echo $this->cathegoryNum->num_rows;?></h1>
        </div>

    </div>

    <div class="col col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="admin-counter">
            <h2>Broj klijenata</h2>
            <h1>0</h1>
        </div>

    </div>
</div>
<br><br>


<table class="table table-striped">
    <thead>
        <tr>
            <th>Naziv</th>
            <th>Cena</th>
            <th>Kategorija</th>
            <th>Podkategorija</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php
            while($row = $this->readResult->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['naziv']."</td>
                        <td>".$row['cena']."</td>
                        <td>".$row['kategorija']."</td>
                        <td>".$row['podkategorija']."</td>
                        <td><a href='admin/changeRecord/".$row['sifra']."' class='btn btn-success'>
                            <span class='glyphicon glyphicon-pencil'></span>
                        </a></td>
                        <td><a href='admin/removeRecord/".$row['sifra']."' class='btn btn-danger'>
                            <span class='glyphicon glyphicon-trash'></span>
                        </a></td>
                    </tr>";
            }
        
        ?>
    </tbody>
</table>


