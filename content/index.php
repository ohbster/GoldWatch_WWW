<?php
require_once 'dbconfig.php';
#    require_once 'gw-dbconfig.php'
?>
<style>
p   {
    text-align:center
    }
</style>
<html>
        <title>GoldWatch | Gold price tracker</title>
        <body>

<?php
try {
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $today = date("Y-m-d");
    //debug echo "Connected to $dbname successfully.";
    #$fmt = numfmt_create('en_US', NumberFormatter::CURRENCY);


    //debug echo "testing: ";
    //Need to select only values WHERE Day = Today
    $sql = 'SELECT High, Low, Current, Daystamp FROM GoldPrice
            WHERE Daystamp = "'.$today.'"' ;
    

    $q = $conn->query($sql);

    if ($q) {
        //debug echo "<br/>Passed";
    }

    $q->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :". $pe->getMessage());
}

    $row = $q->fetch();


?>

        <br/>
                <h1><p>GoldWatch Price Tracker</p></h1>
                <h1><p>
                
                <br/> Current Price: <?php echo '$'.number_format((float) ($row['Current']),2,'.', '')?>
                <br/> Daily High: <?php echo '$'.number_format((float) ($row['High']),2,'.', '')?>
                <br/> Daily Low: <?php echo '$'.number_format((float) ($row['Low']),2,'.', '')?>       
                </p></h1>
                <h3><p>
                <br/> Prices are in USD per Ounce</p></h4>

                <h4>
                <br/><p>This page is updated every 5 minutes.
                <br/>Questions or comments? Feel free to contact <a href ="mailto: ohbster@protonmail.com">ohbster@protonmail.com</a>
                </p></h4>

        </p>

        </body>
</html>


