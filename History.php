<!DOCTYPE html>
<html lang="en">

<?php
require("Header.php");

require("DBconnect.php");
$IDGame = $_GET['IDGame'];
$Game = $_GET['Game'];
$sql = "SELECT * FROM `record` WHERE Game='$IDGame'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


// print_r($row);
$BOARD = $row["Board"];
$STATUS = $row["Status"];
// echo ($BOARD) . "<br/>";
// echo ($STATUS);

// echo print_r($row);
preg_match_all('/\d+/', $row["Board"], $arr);
$arr = $arr[0];
// print_r($arr);
require("DBclose.php");
?>

<body>

    <i onclick="window.location.href='Table_History.php';" class="bi bi-arrow-left ml-3 mt-10" style="font-size:50px;"></i>
    <h1 style="text-align: center;">ประวัติเกมที่ <?php echo $Game ?></h1>



    <!-- TEMPLATE -->
    <div class="mt-3" class="d-none" id="template-board" data-id="0">
        <div class="board" id="board">
            <div class="cell" id="0"></div>
            <div class="cell" id="1"></div>
            <div class="cell" id="2"></div>
            <div class="cell" id="3"></div>
            <div class="cell" id="4"></div>
            <div class="cell" id="5"></div>
            <div class="cell" id="6"></div>
            <div class="cell" id="7"></div>
            <div class="cell" id="8"></div>
        </div>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {

        let result_history = "<?php echo $BOARD; ?>"

        console.log(result_history)

        result_history = result_history.split(",").filter((x) => x !== null && x !== '');
        console.log(result_history)

        $.each(result_history, function(index, value) {
            console.log("index : " + index)
            console.log("value : " + value)
            if (index == 0) {
                console.log("----")
                $(`#template-board[data-id='${index}'] > .board > #${value}.cell`).html("X")
                // $(`#template-board[data-id='0'] > .board > #0.cell`).html("X")
            } else {

                $_TEMPLATE = $("body").find(`#template-board[data-id=${index-1}]`).clone(true)

                console.log($_TEMPLATE)

                $($_TEMPLATE).attr("data-id", index)

                if (index % 2 === 0) {
                    $($_TEMPLATE).find(`.board > #${value}.cell`).html("X")
                } else {
                    $($_TEMPLATE).find(`.board > #${value}.cell`).html("O")
                }
                $($_TEMPLATE).removeClass("d-none")
                $("body").append($_TEMPLATE)
            }

        })
    });
</script>