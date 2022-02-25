<?php 
    include_once 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php 
        $data = array("first", "second");
        $data[] = "Daniel";
        array_push($data, "Rita");
        array_push($data, 23);
        array_push($data, 45, 67, 89);

        foreach ($data as $value) {
            echo $value." ";
        }
        echo "<br>";

        $sql = "SELECT * FROM words;";
        $result = mysqli_query($conn, $sql);
        $datas = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $datas[] = $row;
            }
        }

        foreach ($datas as $value) {
            echo $value['word']." ";
        }

        foreach ($datas as $value) {
            foreach($value as $res) {
                echo $res." ";
            } echo "<br>";
        }

?>
</body>
</html>