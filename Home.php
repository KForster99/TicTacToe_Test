<!DOCTYPE html>
<html>

<?php
require("Header.php");
?>

<body>
    <h1 style="text-align: center;margin:20px">Tic-Tac-Toe</h1>

    <div id="board">
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

    <div class="New">
        <form method="post">
            <input type="hidden" name="BoardHistory" id="BoardHistory" value="" />
            <input type="hidden" name="RoundStatus" id="RoundStatus" value="" />
            <input type="submit" name="NewGame" id="NewGame" value="New Game" class="btn btn-primary btn-game-action m-1"></input>
            <input type="submit" name="History" value="History" class="btn btn-warning btn-game-action m-1"></input>
        </form>
    </div>

    <?php

    $HISTORY = "";
    // echo $NEW_GAME;
    if (isset($_POST['NewGame'])) {
        $BoardHistory = $_POST['BoardHistory'];
        $RoundStatus = $_POST['RoundStatus'];

        if (isset($BoardHistory) && isset($RoundStatus)) {
            require("DBconnect.php");

            $sql = "INSERT INTO `record` (`Game`, `Board`, `Status`) VALUES ('NULL','" . $BoardHistory . "','" . $RoundStatus . "')";

            mysqli_query($conn, $sql);
            require("DBclose.php");

            unset($_POST["NewGame"]);
            unset($BoardHistory);
            unset($RoundStatus);

            header('Location: Home.php');
        }
    }
    if (isset($_POST['History'])) {
        header("Location: Table_History.php");
    }
    ?>
</body>

<script>
    $(document).ready(function() {
        var check = 0;
        var num = 0;
        var player = "X";
        var computer = "O";
        var board = ["", "", "", "", "", "", "", "", ""];
        var His = ["", "", "", "", "", "", "", "", ""];

        function checkWin() {
            if (
                (board[0] === player && board[1] === player && board[2] === player) ||
                (board[3] === player && board[4] === player && board[5] === player) ||
                (board[6] === player && board[7] === player && board[8] === player) ||
                (board[0] === player && board[3] === player && board[6] === player) ||
                (board[1] === player && board[4] === player && board[7] === player) ||
                (board[2] === player && board[5] === player && board[8] === player) ||
                (board[0] === player && board[4] === player && board[8] === player) ||
                (board[2] === player && board[4] === player && board[6] === player)
            ) {
                alert("You won!");
                $("#RoundStatus").val("Win")
                return check = 1;
            } else if (
                (board[0] === computer && board[1] === computer && board[2] === computer) ||
                (board[3] === computer && board[4] === computer && board[5] === computer) ||
                (board[6] === computer && board[7] === computer && board[8] === computer) ||
                (board[0] === computer && board[3] === computer && board[6] === computer) ||
                (board[1] === computer && board[4] === computer && board[7] === computer) ||
                (board[2] === computer && board[5] === computer && board[8] === computer) ||
                (board[0] === computer && board[4] === computer && board[8] === computer) ||
                (board[2] === computer && board[4] === computer && board[6] === computer)
            ) {
                alert("You lost!");
                $("#RoundStatus").val("Lost")
                return check = 1;
            } else if (
                (board[0] === computer || board[0] === player) &&
                (board[1] === computer || board[1] === player) &&
                (board[2] === computer || board[2] === player) &&
                (board[3] === computer || board[3] === player) &&
                (board[4] === computer || board[4] === player) &&
                (board[5] === computer || board[5] === player) &&
                (board[6] === computer || board[6] === player) &&
                (board[7] === computer || board[7] === player) &&
                (board[8] === computer || board[8] === player)
            ) {
                alert("TIE!");
                $("#RoundStatus").val("TIE")
                return check = 1;
            }
        }

        function computerMove() {
            var move = Math.floor(Math.random() * 9);
            while (board[move] !== "") {
                move = Math.floor(Math.random() * 9);
            }
            board[move] = computer;
            $("#" + move).text(computer);
            His[num] = move;
            num++;
            $("#BoardHistory").val(His)

            checkWin();
        }

        $(".cell").click(function() {
            var id = $(this).attr("id");

            if ($(this).is(":empty")) {
                if (check == 0) {
                    if (board[id] === "") {

                        board[id] = player;
                        $(this).text(player);
                        His[num] = id;
                        num++;
                        $("#BoardHistory").val(His)
                        checkWin();
                    }
                    if (check == 0) {
                        computerMove();
                    }
                }
            }
            // console.log(id)

        });
    });
</script>

</html>