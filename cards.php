<?php

    // Create connection
    //$con=mysqli_connect("psqt.myd.infomaniak.com","psqt_pokecards","pokecards_root","psqt_pokecards_am");
    //$con=mysqli_connect("sql7.freemysqlhosting.net","sql7261296","tGcDhjRp2S","sql7261296");

    $con=mysqli_connect("localhost","root","root","PokeCards", 8888);


    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // Select all of our stocks from table 'stock_tracker'
    $sql = "SELECT * FROM Cards";

    // Confirm there are results
    if ($result = mysqli_query($con, $sql))
    {
        // We have results, create an array to hold the results
        // and an array to hold the data
        $resultArray = array();
        $tempArray = array();

        // Loop through each result
        while($row = $result->fetch_object())
        {
            // Add each result into the results array
            $tempArray = $row;
            array_push($resultArray, $tempArray);
        }

        header('Content-type: application/json');
        // Encode the array to JSON and output the results
        echo json_encode($resultArray, JSON_PRETTY_PRINT);
    }

    // Close connections
    mysqli_close($con);
    ?>
