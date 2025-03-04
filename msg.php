<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .message {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .req {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            position: relative;
            background-color: darkolivegreen;
            color: aliceblue;
        }

        .req_1 {
            font-family: 'monospace';
            
        }

        button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 4px 2px;
            cursor: pointer;
            position: absolute;
            top: 8px;
            right: 8px;
        }

        button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
<div class="message">
<?php
include "config.php";

$sql = "SELECT * FROM request";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class='req' style='display: block;' id='msg_div'>
            <?php
            echo "<div class='req_1'>";
            echo "<h2 style='font-family: monospace;'>Name: <span style='font-family: monospace; font-size: small;'>{$row['name']}</span></h2>";
            echo "<p>Reason: {$row['reasons']}</p>";
            echo "<p>Medicine: {$row['medicine_name']}</p>";
            echo "<p>Quantity: {$row['quantity']}</p>";
            echo "<a href='delete_request.php?id={$row['id']}' style='font-family: monospace;' onclick='return confirm(\"Are you sure you want to delete this request?\")'><button>X</button></a>";
            echo "</div>";
            ?>
        </div>
   <?php }
} else {
    echo "No requests found.";
}

mysqli_close($conn);
?>



    </div>
    <a href="medicine.php " ><button style="padding: 10px; color: white; border-radius: 20px; background-color:darkgreen; margin-right: 50px;">BACK</button></a>
</body>
</html>