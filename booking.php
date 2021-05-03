<!DOCTYPE html>
<html lang="en">
<?php
        $id = $_GET['id'];
        $link = mysqli_connect("localhost", "root", "", "cinema_db");

        $movieQuery = "SELECT * FROM Films WHERE ID = $id";
        $movieImageById = mysqli_query($link,$movieQuery);
        $row = mysqli_fetch_array($movieImageById);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>RESERVEZ <?php echo $row['movieTitle']; ?> MAINTENANT</title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body style="background-color:#6e5a11;">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>RESERVEZ VOTRE TICKET</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <?php
                    echo '<img src="'.$row['Images'].'" alt="">';
                    ?>
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"><?php echo $row['Titres']; ?></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td>GENRE</td>
                        <td><?php echo $row['Genre']; ?></td>
                    </tr>
                    <tr>
                        <td>DUREE</td>
                        <td><?php echo $row['Duree']; ?></td>
                    </tr>
                    <tr>
                        <td> DATE</td>
                        <td><?php echo $row['Date']; ?></td>
                    </tr>
                    <tr>
                        <td>REALISATEUR</td>
                        <td><?php echo $row['Realisateur']; ?></td>
                    </tr>

                </table>
            </div>
            <div class="booking-form-container">
                <form action="" method="POST">



                    <select name="type" required>
                        <option value="" disabled selected>TYPE</option>
                        <option value="3d">3D</option>
                        <option value="2d">2D</option>
                        <option value="imax">6D</option>
                        <option value="7d">7D</option>
                    </select>

                    <select name="date" required>
                        <option value="" disabled selected>DATE</option>
                        <option value="12-3">Mars 12,2019</option>
                        <option value="13-3">Mars 13,2019</option>
                        <option value="14-3">Mars 14,2019</option>
                        <option value="15-3">Mars 15,2019</option>
                        <option value="16-3">Mars 16,2019</option>
                    </select>

                    <select name="hour" required>
                        <option value="" disabled selected>Date</option>
                        <option value="09-00">09:00</option>
                        <option value="12-00">12:00</option>
                        <option value="15-00">03:00</option>
                        <option value="18-00">06:00</option>
                        <option value="21-00">09:00</option>
                        <option value="24-00">12:00</option>
                    </select>

                    <input placeholder="First Name" type="text" name="fName" required>

                    <input placeholder="Last Name" type="text" name="lName">

                    <input placeholder="Phone Number" type="text" name="pNumber" required>

                    <button type="submit" value="submit" name="submit" class="form-btn">Reservez un siege</button>
                    <?php
                    $fNameErr = $pNumberErr= "";
                    $fName = $pNumber = "";

                    if(isset($_POST['submit'])){


                        $fName = $_POST['fName'];
                        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $fName)) {
                            $fNameErr = 'Name can only contain letters, numbers and white spaces';
                            echo "<script type='text/javascript'>alert('$fNameErr');</script>";
                        }

                        $pNumber = $_POST['pNumber'];
                        if (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $pNumber)) {
                            $pNumberErr = 'Phone Number can only contain numbers and white spaces';
                            echo "<script type='text/javascript'>alert('$pNumberErr');</script>";
                        }

                        $insert_query = "INSERT INTO
                        Reservation (  movieName,

                                        Type,
                                        Date,
                                        Heure,
                                        Nom,
                                        Prenom,
                                        Numero)
                        VALUES (        '".$row['Titres']."',
                                        '".$_POST["Type"]."',
                                        '".$_POST["Date"]."',
                                        '".$_POST["Heure"]."',
                                        '".$_POST["Nom"]."',
                                        '".$_POST["Prenom"]."',
                                        '".$_POST["Numero"]."')";
                        mysqli_query($link,$insert_query);
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>
