<?php

class Cards {
    public $userName = "root";
    public $password = "";
    public $server = "localhost";
    public $db = "hscards";
    private $conn;

    function __construct() {
        $this->conn = new mysqli($this->server, $this->userName, $this->password, $this->db);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function getAllCards() {
        $sql = "SELECT * FROM `kartyak`";
        $result = $this->conn->query($sql);
    
        $cards = [];
        while ($card = $result->fetch_object()) {
            $cards[] = $card;
        }
        return $cards;
    }

    function deleteCard() {
        $cardID = htmlspecialchars($_GET['cardID']);
        $sql = "DELETE FROM `kartyak` WHERE ID = $cardID;";
        $this->conn->query($sql);
    }

    function saveCard() {
        $title = htmlspecialchars($_POST['title']);
        $desc = htmlspecialchars($_POST['description']);
        $type = htmlspecialchars($_POST['type']);
        $hp = htmlspecialchars($_POST['hp']);
        $att = htmlspecialchars($_POST['attack']);
        $mana = htmlspecialchars($_POST['mana']);

        $invalid = false;
        $errors = "";
        if($title == ""){
            $errors .= "title,";
            $invalid = true;
        }
        if($type == ""){
            $errors .= "type,";
            $invalid = true;
        }
        if($mana == ""){
            $errors .= "mana";
            $invalid = true;
        }
        if($invalid){
            header("Location: index.php?todo=new&errors=$errors");
            return;
        }

        $sql = "INSERT INTO `kartyak` (`ImageSrc`, `HP`, `Attack`, `Mana`, `Description`, `Title`, `Type`) VALUES
    ('alapKep.jpg', $hp, $att, $mana, '$desc', '$title', '$type')";
        $this->conn->query($sql);
    }

    function showCards(){
        $index = 0;
        foreach($this->getAllCards() as $card){
            echo '<div class="hsCard col-md-2" onclick="toggleElement('.$index.')">';
            echo    '<img class="commonBG" src="commonBG2.png" alt="bg">';
            echo    '<img class="cardImg" src="kartyaKepek/'.$card->ImageSrc.'" alt="">';
            echo    '<div class="hp">'.$card->HP.'</div>';
            echo    '<div class="att">'.$card->Attack.'</div>';
            echo    '<div class="mana">'.$card->Mana.'</div>';
            echo    '<div class="desc">'.$card->Description.'</div>';
            echo    '<div class="title">'.$card->Title.'</div>';
            echo    '<div class="type">'.$card->Type.'</div>';
            echo '<div class="buttonsCard buttonsCard'.$index.'" style="display: none;">
                <a class="btn btn-danger" href="index.php?todo=delete&cardID='.$card->ID.'" style="width: 130px">Törlés</a>
            </div>';
            echo  '</div>';
            // <a class="btn btn-warning" style="width: 130px">Módosítás</a>
            $index++;
        }
    }

    function showFilteredCards($filterMana, $filterType){
        $index = 0;
        foreach($this->getAllCards() as $card){
            if(($filterMana == "" || $card->Mana == $filterMana) && ($filterType == "" || $card->Type == $filterType)){
                echo '<div class="hsCard col-md-2" onclick="toggleElement('.$index.')">';
                echo    '<img class="commonBG" src="commonBG2.png" alt="bg">';
                echo    '<img class="cardImg" src="kartyaKepek/'.$card->ImageSrc.'" alt="">';
                echo    '<div class="hp">'.$card->HP.'</div>';
                echo    '<div class="att">'.$card->Attack.'</div>';
                echo    '<div class="mana">'.$card->Mana.'</div>';
                echo    '<div class="desc">'.$card->Description.'</div>';
                echo    '<div class="title">'.$card->Title.'</div>';
                echo    '<div class="type">'.$card->Type.'</div>';
                echo '<div class="buttonsCard buttonsCard'.$index.'" style="display: none;">
                    <a class="btn btn-danger" href="index.php?todo=delete&cardID='.$card->ID.'" style="width: 130px">Törlés</a>
                </div>';
                echo  '</div>';
                // <a class="btn btn-warning" style="width: 130px">Módosítás</a>
                $index++;
            }
        }
    }

    function showSearchedCards($searchValue){
        $index = 0;
        foreach($this->getAllCards() as $card){
            if($card->Title != "" && str_contains(strtolower($card->Title),strtolower($searchValue))){
                echo '<div class="hsCard col-md-2" onclick="toggleElement('.$index.')">';
                echo    '<img class="commonBG" src="commonBG2.png" alt="bg">';
                echo    '<img class="cardImg" src="kartyaKepek/'.$card->ImageSrc.'" alt="">';
                echo    '<div class="hp">'.$card->HP.'</div>';
                echo    '<div class="att">'.$card->Attack.'</div>';
                echo    '<div class="mana">'.$card->Mana.'</div>';
                echo    '<div class="desc">'.$card->Description.'</div>';
                echo    '<div class="title">'.$card->Title.'</div>';
                echo    '<div class="type">'.$card->Type.'</div>';
                echo '<div class="buttonsCard buttonsCard'.$index.'" style="display: none;">
                    <a class="btn btn-danger" href="index.php?todo=delete&cardID='.$card->ID.'" style="width: 130px">Törlés</a>
                </div>';
                echo  '</div>';
                // <a class="btn btn-warning" style="width: 130px">Módosítás</a>
                $index++;
            }
        }
    }
}