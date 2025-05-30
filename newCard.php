<div class="container" style="height: 1000px;">
    <h3>Új kártya hozzáadása</h3>
    <?php
        $errors = $_GET['errors'] ?? '';
        $errorList = [];
        if($errors != ""){
            $errorList = explode(",",$errors);
            if(in_array("title",$errorList)){
                echo "<div class='text-danger' style='font-size: 22px;'>Név megadása kötelezö!</div>";
            }
            if(in_array("type", $errorList)){
                echo "<div class='text-danger' style='font-size: 22px;'>Típus választása kötelezö!</div>";
            }
            if(in_array("mana", $errorList)){
                echo "<div class='text-danger' style='font-size: 22px;'>Mana megadása kötelezö!</div>";
            }
        }
    ?>
    <form action="index.php?todo=save" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Kártya neve:</label>
            <input type="text" style="width: 250px" class="form-control" id="title" name="title" >
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Kártya leírása:</label>
            <input type="text" class="form-control" id="description" name="description" >
        </div>
        <div class="d-flex mb-3">
            <div class="">
                <label for="hp" class="form-label">Életerö:</label>
                <input type="number" style="width: 70px" max="99" class="form-control" id="hp" name="hp" >
            </div>
            <div class="">
                <label for="attack" class="form-label">Sebzés:</label>
                <input type="number" style="width: 70px" max="99" class="form-control" id="attack" name="attack" >
            </div>
            <div class="">
                <label for="mana" class="form-label">Mana:</label>
                <input type="number" style="width: 70px" max="99" class="form-control" id="mana" name="mana" >
            </div>
            <div>
                <label for="type" class="form-label">Típus:</label>
                <select name="type" id="type" class="form-control" style="width: 100px; height: 40px">
                    <option value="Minion">Minion</option>
                    <option value="Spell">Spell</option>
                    <option value="Weapon">Weapon</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-warning">Mentés</button>
    </form>
</div>