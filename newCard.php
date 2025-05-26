<div class="container">
    <h3>Új kártya hozzáadása</h3>
    <form action="index.php?todo=save" method="post">
        <div class="mb-3">
            <label for="destination" class="form-label">Kártya neve</label>
            <input type="text" class="form-control" id="destination" name="destination" >
        </div>
        <div class="mb-3">
            <label for="transport" class="form-label">Kártya leírása</label>
            <input type="text" class="form-control" id="transport" name="transport" >
        </div>
        <div class="mb-3">
            <label for="transport" class="form-label">Életerö:</label>
            <input type="number" class="form-control" id="transport" name="transport" >
        </div>

        <button type="submit" class="btn btn-primary">Mentés</button>
    </form>
</div>