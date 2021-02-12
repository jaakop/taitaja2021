<!DOCTYPE html>
<html lang="fi">

<head>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../mainStyle.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mustat Renkaat</title>
</head>

<body class="noMargin noPadding">
  <div class="headerBar noMargin noPadding">
    <img src="../images/LogoDark.jpg" alt="Dark logo" />
  </div>

  <!-- Main view -->
  <div class="headerSplash noMargin noPadding">
    <div class="rengasSelect" style="text-align: left;">
    <h2 class='header noMargin noPadding'>Tilaus</h2>
    <!-- Table with the tyres -->
    <table id="rengasTable">
        <tr>
          <th>Merkki</th>
          <th>Tyyppi</th>
          <th>Määrä</th>
          <th>KPL Hinta</th>
          <th></th>
        </tr>
        <?php
            //Get the data from post
            $data = json_decode($_POST["fragment"], true);
            $cost = 0;

            //Create table rows with data
            foreach($data['orders'] as $order) {
                echo '<tr><td>' 
                . $order['tyre']['Merkki'] . "</td>"
                . "<td>" . $order['tyre']['Koko'] . "</td>"
                . "<td>" . (int)$order['amount'] . "</td>"
                . "<td>" . $order['tyre']['Hinta'] . "€</td>";
                if(trim($order['tyre']['Merkki']) == "Nokian")
                    echo '<td><img  height="35px" src="../images/NokianRengas.jpg"></td>';
                elseif(trim($order['tyre']['Merkki']) == "Kumho")
                    echo '<td><img  height="35px" src="../images/KuhmoRengas.jpg"></td>';
                elseif(trim($order['tyre']['Merkki']) == "Hankook")
                    echo '<td><img  height="35px" src="../images/HankhookRengas.jpg"></td>';
                echo "</tr>";
                $cost += $order['tyre']['Hinta'] * $order['amount'];
            }
            echo "</table>";

            //Create other fields with data
            echo "<h4 class='noPadding noMargin' style='margin-top: 10px;'>Loppusumma:</h4> " . $cost . "€";
            echo "<h4 class='noPadding noMargin'>Toimitustapa:</h4>" . $data['delivery'];
            echo "<h4 class='noPadding noMargin'>Asiakastiedot:</h4>";
            echo "Nimi: " . $data['name']; 
            echo "	&emsp; Postiosoite: " . $data['address'];
            echo "<br>Sähköposti: " . $data['email'];
            echo "	&emsp; Puhelinnumero : " . $data['phone'];

            //Save user to database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "taitaja";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $conn->set_charset("utf8");
            
            //Hash the email with argon2
            $hashEmail = password_hash($data['email'], PASSWORD_ARGON2ID);

            $sql = "INSERT INTO asiakasrekisteri
            VALUES ('{$data['name']}', '{$data['address']}', '$hashEmail', '{$data['phone']}')";  
            $result = $conn->query($sql);

            //Remove tyres from the database
            foreach($data['orders'] as $order) {
                $sql = "UPDATE renkaat SET Saldo = Saldo - " . (int)$order['amount'] . " WHERE RengasID = " . $order['tyre']['RengasID'];  
                $result = $conn->query($sql);
            }

            $conn->close();
        ?>
    </div>
  </div>

  <!-- Footer element -->
  <div class="noMargin noPadding footer text"  style="top: 100vh">
    <div>
      <h2 class="header">Yritys</h2>
      <p>Mustapään Auto Oy</p>
      <p>Mustat Renkaat</p>
      <p>Kosteenkatu 1, 86300 Oulainen</p>
      <p>Puh. 040-7128158</p>
      <p>email. myyntimies@mustatrenkaat.net</p>
    </div>
    <div class="verticalBanner"></div>
    <iframe class="video" width="560" height="315" src="https://www.youtube-nocookie.com/embed/joBmbh0AGSQ"
      allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <iframe class="noMargin noPadding mapImg" width="560" height="315" src="https://www.openstreetmap.org/export/embed.html?bbox=24.817133545875553%2C64.26468652521265%2C24.819644093513492%2C64.26551225233781&amp;layer=mapnik" style="border: 1px solid black"></iframe>
  </div>
</body>