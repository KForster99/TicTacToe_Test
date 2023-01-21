<!DOCTYPE html>
<html>

<?php
require("Header.php");
?>

<body>
    <h1 style="text-align: center;margin:20px">Tic-Tac-Toe</h1>
    <!DOCTYPE html>
    <html lang="en">

    <form>
        <label for="gridSize">Grid size:</label>
        <input type="number" id="gridSize" value="3" min="3">
        <a href="Home.php?Size=">
        <button type="button" id="createGrid">Create Grid</button>
        </a>
    </form>

</body>

<script>
    $(document).ready(function() {

    });
</script>

</html>