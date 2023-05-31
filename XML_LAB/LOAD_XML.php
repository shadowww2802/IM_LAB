<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link rel="stylesheet" href="styles.css">


<body class="bg-dark">

<p class="pt-3 text-center text-light fw-bold title">DATA TABLE</p>

<table class="table table-dark table-striped-columns mt-3">
    <thead class="table-light">
        <tr>
            <th scope="col">employee_id</th>
            <th scope="col">first_name</th>
            <th scope="col">last_name</th>
            <th scope="col">email</th>
            <th scope="col">phone_number</th>
            <th scope="col">hire_date</th>
            <th scope="col">salary</th>
        </tr>
    </thead>
    <tbody>   

        <?php
            $xml_data = simplexml_load_file("XML_Lab.xml") or die("Error: Object Creation failure");
            foreach($xml_data->children() as $data):
        ?>

        <tr>
            <td><?php echo $data->employee_id?></td>
            <td><?php echo $data->first_name?></td>
            <td><?php echo $data->last_name?></td>
            <td><?php echo $data->email?></td>
            <td><?php echo $data->phone_number?></td>
            <td><?php echo $data->hire_date?></td>
            <td><?php echo $data->salary?></td>
        </tr>

        <?php endforeach; ?>

    </tbody>
</table>

</body>