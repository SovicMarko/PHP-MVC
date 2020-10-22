<?php
    require '_adminNav.php';
?>

<h1 class="page-header"> Kategorije artikala </h1>

<div class="row">
    <div class="col col-lg-4">
        <ul class="list-group">
            <?php 
                $active = "";
                $first = true;
                while($row = $this->cathegoryList->fetch_assoc()) {
                    if ($active != $row['kategorija']) {
                        if ($first) { $first = false;} else { echo "</ul>";}
                        echo "<li class='list-group-item'>".$row['kategorija']."
                               
                                <span class='cathegory-plus-btn glyphicon glyphicon-chevron-down' 
                                id='drop-sub-cat".$row['sifra_kategorije']."'></span> 
                             
                                <a href='removeCathegory/".$row['sifra_kategorije']."'>
                                    <span class='cathegory-dlt-btn glyphicon glyphicon-trash' 
                                    title='obrisite kategoriju ".$row['kategorija']."'></span> 
                                </a> 
                                
                             </li>
                                
                                <ul class='list-group sub-cat-list' id='sub-cat-list".$row['sifra_kategorije']."'>";
                            $active = $row['kategorija'];
                    } 
                    if (!is_null($row['podkategorija'])) {
                        echo "<li class='list-group-item'>".$row['podkategorija']."
                                <a href='removeSubCathegory/".$row['sifra']."'>
                                    <span class='cathegory-dlt-btn subcathegory-dlt-btn glyphicon glyphicon-trash' 
                                    title='obrisite podkategoriju ".$row['podkategorija']."'></span> 
                                </a> 
                                <span class='cathegory-badge badge' 
                                    title='broj objava u kategoriji'>".$row['broj_artikala']."</span>
                            </li>";
                    }
                }
                echo "</ul>";
            ?>
        </ul>
        <hr>
        <form id="cathegory-form" method="POST" action="insertCathegory" method="POST">
            <!-- <div class="input-group"> -->
            <input type="text" class="form-control" placeholder="Unesite novu kategoriju" id="add-cathegory" name="naziv">
            
            <button class="btn btn-default" type="submit" id="confirm-btn">
                <i class="glyphicon glyphicon-plus"></i>
            </button>

            <!-- </div> -->
        </form>
    </div>
</div>


  <!-- <li class="list-group-item">New <span class="badge">12</span></li>
  <li class="list-group-item">Deleted <span class="badge">5</span></li>
  <li class="list-group-item">Warnings <span class="badge">3</span></li> -->
