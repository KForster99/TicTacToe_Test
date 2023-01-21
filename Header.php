<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .cell {
            width: 100px;
            height: 100px;
            border: 1px solid black;
            text-align: center;
            font-size: 48px;
            line-height: 100px;
            float: left;
        }

        #board {
            width: 300px;
            height: 300px;
            margin: 0 auto;
            display: grid;
            grid-template: ". . .";
        }

        .New {
            margin: 0;
            position: absolute;
            margin-top: 50px;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
</head>