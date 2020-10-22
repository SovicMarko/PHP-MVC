<?php

    class ArticleModel extends AppModel {
        public function __construct() { parent::__construct(); }

        public function insertRecord() 
        {
            $naziv =  $_POST['naziv'];
            $cena  =  $_POST['cena'];
            $opis  =  $_POST['opis'];
            $kategorija  =  $_POST['kategorija'];

            $image = $imgName = $imgTmpName = $imgSize = $imgError = $imgType = "";

            if ($_FILES['slika']['size'] > 0) {

                $image = $_FILES['slika'];
                $imgName = $_FILES['slika']['name'];
                $imgTmpName = $_FILES['slika']['tmp_name'];
                $imgSize = $_FILES['slika']['size'];
                $imgError = $_FILES['slika']['error'];
                $imgType = $_FILES['slika']['type'];

                $imgExt = explode('.', $imgName);
                $imgExt = $imgExt[count($imgExt) - 1];

                $allowedExt = ['png','PNG','jpg','JPG','jpeg','JPEG'];

                if (in_array($imgExt,$allowedExt)) {
                    if ($imgError === 0) {
                        if ($imgSize < 10000000) {
                            $newImgName = uniqid('',true).".".$imgExt;
                            $imgDestionation = 'img/'.$newImgName;
                            move_uploaded_file($imgTmpName,$imgDestionation);
                        } else {
                            echo 'slika je prevelike velicine';
                        }
                    } else {
                        echo 'Doslo je do greske prilikom dodavanja!';
                }
                } else {
                    echo 'Format nije dozvoljen';
                }
            }
                $sql = "INSERT INTO artikal(naziv,cena,opis,sifra_podkategorije, slika) 
                        VALUES ('$naziv',$cena,'$opis', $kategorija, '$newImgName')";
                $this->db->conn->query($sql);
                header("Location: ../admin");
        }

        public function readRecords()
        {
            $sql = "SELECT * FROM artikal";
            return $this->db->conn->query($sql);
        }

        public function readCompleteRecords() 
        {
            $sql = "SELECT artikal.sifra, artikal.naziv, 
                           artikal.cena, kategorija.naziv AS kategorija,
                           podkategorija.naziv AS podkategorija
                    FROM artikal
                    LEFT JOIN podkategorija on artikal.sifra_podkategorije = podkategorija.sifra
                    LEFT JOIN kategorija on podkategorija.sifra_kategorije = kategorija.sifra";
            return $this->db->conn->query($sql);
        }

        public function readSingleRecord($id) {
            $sql = "SELECT * FROM artikal WHERE sifra=$id";
            $result = $this->db->conn->query($sql);
            return $result->fetch_assoc();
        }

        public function removeRecord($id) 
        {
            $record = $this->readSingleRecord($id);
            $file = "img/".$record['slika'];
            if (file_exists($file)) { unlink($file); }
            
            $sql = "DELETE FROM artikal WHERE sifra = $id";
            $this->db->conn->query($sql);
            
            header("Location: ../../admin");
        }

        public function updateRecord($id) {
            $naziv = $_POST['naziv'];
            $cena  = $_POST['cena'];
            $opis  = $_POST['opis'];
            $kategorija = $_POST['kategorija'];
            $sql = "UPDATE artikal 
                    SET naziv = '$naziv', cena = $cena, 
                        opis = '$opis', sifra_podkategorije = $kategorija
                    WHERE sifra=$id;";
            $this->db->conn->query($sql);
            // echo "BLABLA";
            header("Location: ../../admin");
        }
    }

?>