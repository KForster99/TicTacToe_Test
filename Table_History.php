<!DOCTYPE html>
<html>

<?php require("Header.php") ?>

<body>

    <i onclick="window.location.href='Home.php';" class="bi bi-arrow-left ml-3 mt-10" style="font-size:50px;"></i>
    <h1 style="text-align: center;">ประวัติ</h1>

    <div class="d-flex justify-content-center mt-3">
        <table class="col-md-6 table table-bordered">
            <tr>
                <th class='sticky-col text-center'>เกมที่</th>
                <th class='sticky-col text-center'>ประวัติ</th>
                <th class='sticky-col text-center'>สถานะ</th>
            </tr>

            <?php
            require("DBconnect.php");
            $sql = "SELECT * FROM `record`";
            $result = $conn->query($sql);

            $arr = [];
            while ($row = $result->fetch_assoc()) {
                $array_item = array(
                    "Game" => $row["Game"],
                    "Board" => $row["Board"],
                    "Status" => $row["Status"],
                );
                array_push($arr, $array_item);
            }
            require("DBclose.php");

            $num = 0;
            for ($i = 0; $i < count($arr); $i++) {
                if ($arr[$i]["Status"] != "" && $arr[$i]["Board"] != "") {
                    echo "<tr>";
                    echo "<td class ='sticky-col text-center'>";
                    echo ($i + 1) - $num;
                    echo "</td>";
                    echo "<td class ='text-center'>";
                    echo "<a href='history.php?IDGame=" . $arr[$i]["Game"] . "&Game=" . ($i + 1) - $num . "'>ดูรายละเอียด</a>";
                    echo "</td>";
                    echo "<td class ='text-center'>";
                    if ($arr[$i]["Status"] == "Win")
                        echo "ชนะ";
                    else if ($arr[$i]["Status"] == "Lost")
                        echo "แพ้";
                    else if ($arr[$i]["Status"] == "TIE")
                        echo "เสมอ";
                    echo "</td>";
                    echo "</tr>";
                } else {
                    $num++;
                }
            }
            ?>
        </table>
    </div>

</body>

</html>