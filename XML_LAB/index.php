<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link rel="stylesheet" href="styles.css">

<?php

// Connect to database
// $erver - localhost
// Username - root
// Password - empty
// Database name = xml
$conn = mysqli_connect ("localhost", "root", "", "xml");

$affectedRow = 0;

// Load xml file else check connection
$xml = simplexml_load_file ("XML_Lab.xml")
    or die ("Error: Cannot create object");

// Assign values
foreach ($xml->children () as $row) {
    $employee_id= $row->employee_id;
    $first_name = $row->first_name;
    $last_name = $row->last_name;
    $email = $row->email;
    $phone_number = $row->phone_number;
    $hire_date = $row->hire_date;
    $job_id = $row->job_id;
    $salary = $row->salary;

// $OL query to insert data into xml table
$sql = "INSERT INTO employees (employee_id, first_name,
    last_name, email, phone_number, hire_date, job_id, salary) VALUES ('" 
    . $employee_id . "' , '" . $first_name .  "' , '" . $last_name .  "' , '"
    . $email .  "' , '" . $phone_number .  "' , '" . $hire_date .  "' , '" . $job_id .  "' , '" . $salary . "')";

$result = mysqli_query ($conn, $sql);

if (! empty ($result)) {
    $affectedRow ++;
} else {
    $error_message = mysqli_error ($conn) . "\n";
}

}

?>

<body class="container-fluid bg-dark bg-gradient">

    <div class="text-center p-3">

        <p class="mt-3 text-light text-center fs-1 fw-bolder lh-sm">INSERT XML TO MYSQL USING PHP</p>
        <p class="text-light text-center fs-1 fw-bold lh-sm">XML Data storing in Database</p>

        <?php
            if ($affectedRow > 0) {
            $message = $affectedRow. " records inserted...";
            } else {
            $message = "No records inserted...";

            }
        ?>

        <style>
            .affected-row {
                max-width: 420px;
                background: #ffffff;
                padding: 10px;
                margin: auto;
                /* margin-left: 490px; */
                margin-bottom: 20px;
                border: #dab2b2 1px solid;
                border-radius: 4px;
                color: #000000;
            }

            .error-message {
                max-width: 420px;
                background: #ffffff;
                padding: 10px;
                margin-left: 490px;
                margin-bottom: 20px;
                border: #dab2b2 1px solid;
                border-radius: 4px;
                color: #000000;
            }
        </style>

        <div class="affected-row">
            <?php echo $message; ?>
        </div>

        <a href="LOAD_XML.php"><button type="button" class="btn btn-outline-secondary">Table</button></a>
        
        <img src="point.gif" class="mt-5 mb-5 rounded mx-auto d-block image">

        <div class="container-fluid text-center p-3">
            <p class="mt-5 text-light text-center fs-1 fw-bolder lh-sm">CALLING A PROCEDURE IN PHP</p>

            <h2 class="text-light">PROCEDURE 1</h2>
            <a href="procedure1.php"><button type="button" class="btn btn-outline-secondary mb-4">Procedure Table 1</button></a>

            <h2 class="text-light">PROCEDURE 2</h2>
            <a href="procedure2.php"><button type="button" class="btn btn-outline-secondary mb-4">Procedure Table 2</button></a>

            <h2 class="text-light">PROCEDURE 3</h2>
            <a href="procedure3.php"><button type="button" class="btn btn-outline-secondary mb-4">Procedure Table 3</button></a>

            <img src="point.gif" class="mt-2 rounded mx-auto d-block image">
        </div>

        <?php if (! empty ($error_message)) { ?>

        <div class="error-message">
            <?php echo ($error_message) ; ?>
        </div>

    </div>

</body>

<?php } ?>