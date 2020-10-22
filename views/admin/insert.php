<?php
    require '_adminNav.php';
    if (isset($this->izmena)) {
        $id    = $this->id;
        $naziv = $this->naziv;
        $cena  = $this->cena;
        $opis  = $this->opis;
        $podkategorija = $this->kategorija;

        echo '<h1 class="page-header">Izmena objave</h1>';
    } else {
        $naziv = $cena = $opis = "";
        echo '<h1 class="page-header">Unos nove objave</h1>';
    }
?>
<div class="row">
    <div class="col col-lg-4"> 
        <?php
            if (isset($this->izmena)) {
                echo '<form action="../updateRecord/'.$id.'" method="post" enctype="multipart/form-data">';
            } else {
                echo '<form action="insertRecord" method="post" enctype="multipart/form-data">';
            }
        ?>
            <div class="form-group">
                <label for="usr">Naziv:</label>
                <input type="text" class="form-control" id="usr" name="naziv" value="<?php echo $naziv?>" maxlength="15">
            </div>
            <div class="form-group">
                <label for="pwd">Cena:</label>
                <input type="text" class="form-control" id="pwd" name="cena" value="<?php echo $cena?>">
            </div>
            <div class="form-group">
                <label for="sel1">Kategorija:</label>
                <select class="form-control" id="sel1" name="kategorija">
                    <option disabled selected>--izaberite kategoriju--</option>
                    <?php
                        $activeCathegory = "";
                        $first = true;
                        while($r = $this->subCathegoryList->fetch_assoc()) {
                            if ($activeCathegory != $r['kategorija']) {
                                if($first) {
                                    $first = false;
                                } else {
                                    echo "</optgroup>";
                                }
                                echo "<optgroup label='".$r['kategorija']."'>";
                                $activeCathegory = $r['kategorija'];
                                if ($r['podkategorija']) {
                                    if ($r['sifra'] == $podkategorija) {
                                        echo "<option selected value='".$r['sifra']."'>".$r['podkategorija']."</option>";
                                    } else {
                                        echo "<option value='".$r['sifra']."'>".$r['podkategorija']."</option>";
                                    }
                                }
                            } else {
                                if ($r['sifra'] == $podkategorija) {
                                    echo "<option selected value='".$r['sifra']."'>".$r['podkategorija']."</option>";
                                } else {
                                    echo "<option value='".$r['sifra']."'>".$r['podkategorija']."</option>";
                                }
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="comment">Opis:</label>
                <textarea class="form-control" rows="5" id="comment" name="opis"><?php echo $opis?></textarea>
            </div>
            <div class="form-group">
                <label for="picture">Dodajte sliku:</label>
                <input type="file" name="slika">
            </div>



            <button type="submit" class="btn btn-success">Potvrdi</button>
        </form>
    </div>

</div>
