<?php

    class CathegoryModel extends AppModel {
        public function __construct() { parent::__construct(); }

        public function insertRecord() 
        {
            $naziv =  $_POST['naziv'];
            $sql = "INSERT INTO kategorija(naziv) VALUES ('$naziv')";
            $this->db->conn->query($sql);
            header("Location: ../admin/cathegory");
        }

        public function readRecords()
        {
            $sql = "SELECT * FROM kategorija";
            return $this->db->conn->query($sql);
        }

        public function readRecordsAndSubCathegories() {
            $sql = "SELECT kategorija.naziv    AS kategorija,
                           podkategorija.naziv AS podkategorija,
                           podkategorija.sifra,
                           kategorija.sifra AS sifra_kategorije,
                           COUNT(artikal.sifra) AS broj_artikala
                    FROM       kategorija
                    LEFT JOIN podkategorija ON podkategorija.sifra_kategorije = kategorija.sifra
                    LEFT JOIN artikal       ON artikal.sifra_podkategorije = podkategorija.sifra
                    GROUP BY podkategorija.naziv, kategorija.naziv
                    ORDER BY kategorija.sifra, podkategorija.sifra";
            return $this->db->conn->query($sql);
        }

        public function countArticlesByCathegory() {
            $sql = "SELECT kategorija.sifra, kategorija.naziv, COUNT(artikal.naziv) AS 'broj'
                    FROM kategorija
                    LEFT JOIN podkategorija ON kategorija.sifra = podkategorija.sifra_kategorije
                    LEFT JOIN artikal ON kategorija.sifra = artikal.sifra_podkategorije
                    GROUP BY kategorija.naziv
                    ORDER BY kategorija.sifra";
            return $this->db->conn->query($sql);        
        }

        public function readSingleRecord($id) {
            // $sql = "SELECT * FROM artikal WHERE sifra=$id";
            // $result = $this->db->conn->query($sql);
            // return $result->fetch_assoc();
        }

        public function removeRecord($id) 
        {
            
            $sql = "DELETE FROM podkategorija WHERE sifra_kategorije = $id;";
            $this->db->conn->query($sql);
            $sql = "DELETE FROM kategorija WHERE sifra = $id;";
            $this->db->conn->query($sql);
            header("Location: ../../admin/cathegory");
        }

        public function updateRecord($id) {
            echo "AAA";
            // $naziv = $_POST['naziv'];
            // $cena  = $_POST['cena'];
            // $opis  = $_POST['opis'];
            // $sql = "UPDATE artikal 
            //         SET naziv = '$naziv', cena = $cena, opis = '$opis'
            //         WHERE sifra=$id;";
            // $this->db->conn->query($sql);
            // echo "BLABLA";
            // header("Location: ../../admin");
        }



        public function insertSubCathegory($id) {
            $naziv =  $_POST['naziv'];
            $sql = "INSERT INTO podkategorija(naziv,sifra_kategorije) VALUES ('$naziv', $id)";
            $this->db->conn->query($sql);
            header("Location: ../../admin/cathegory");
        }

        public function removeSubCathegory($id) {
            $sql = "DELETE FROM podkategorija WHERE sifra = $id";
            $this->db->conn->query($sql);
            header("Location: ../../admin/cathegory");
        }
    }

?>