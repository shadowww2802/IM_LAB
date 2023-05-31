<!DOCTYPE html>
<html>
<head>
    <title>PHP MySQL Stored Procedure Demo 1</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
        <?php
        require_once 'dbconfig.php';
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // execute the stored procedure
            $sql = 'CALL totalEmPErQuarter()';
            // call the stored procedure
            $q = $pdo->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }
        ?>

        <p class="pt-3 text-center text-light fw-bold title">DATA TABLE</p>

        <table class="table table-dark table-striped-columns">
            <thead class= "table-light">
            <tr>
                <th scope="col">Year</th>
                <th scope="col">Total Employee</th>
                <th scope="col">Total Hired</th>

            </tr>
            <tbody>
            <?php while ($r = $q->fetch()): ?>
                <tr>
                    <td><?php echo $r['year'] ?></td>
                    <td><?php echo $r['quarter'] ?></td>
                    <td><?php echo $r['totalEm'] ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </thead>
        </table>
</body>
</html>    