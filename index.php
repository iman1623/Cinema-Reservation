<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Cinema</title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body>
    <?php
    $link = mysqli_connect("localhost", "root", "", "cinema_db");
    $sql = "SELECT * FROM Films";
    ?>
    <header></header>
    <div id="home-section-1" class="movie-show-container">
        <h1>A l'affiche</h1>
        <h3>Reservez un film maintenant</h3>

        <div class="movies-container">

            <?php
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                for ($i = 0; $i <= 5; $i++){
                                    $row = mysqli_fetch_array($result);
                                    echo '<div class="movie-box">';
                                    echo '<img src="'. $row['Images'] .'" alt=" ">';
                                    echo '<div class="movie-info ">';
                                    echo '<h3>'. $row['Titres'] .'</h3>';
                                    echo '<a href="booking.php?id='.$row['ID'].'"><i class="fas fa-ticket-alt"></i> Book a seat</a>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                mysqli_free_result($result);
                            } else{
                                echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }

                        // Close connection
                        mysqli_close($link);
                        ?>
        </div>
    </div>
    <div id="home-section-2" class="services-section">
        <h1></h1>
        <h3>Voici les 3 étapes afin de réservez votre film préferer!</h3>

        <div class="services-container">
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-video"></i>
                </div>
                <h2>Choisissez votre film préferer</h2>
                <p></p>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-credit-card"></i>
                </div>
                <h2>Payez le ticket</h2>
                <p></p>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-theater-masks"></i>
                </div>
                <h2>Choisissez votre siège et profitez de votre film</h2>
                <p></p>
            </div>
            <div class="service-item"></div>
            <div class="service-item"></div>
        </div>
    </div>
    <div id="home-section-3" class="trailers-section">
        <h1 class="section-title">Explorer un nouveau film</h1>
        <h3></h3>
        <div class="trailers-grid">
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-1.jpg" alt="">
                <div class="trailer-item-info" data-video="Z1BCujX3pw8">
                    <h3>Captain Marvel</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-2.jpg" alt="">
                <div class="trailer-item-info" data-video="OPEfsEaFv_c">
                    <h3>Karting Karim</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-3.jpg" alt="">
                <div class="trailer-item-info" data-video="cksYkEzUa7k">
                    <h3>Lego</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-4.jpg" alt="">
                <div class="trailer-item-info" data-video="Ze5YA4mkzhI">
                    <h3>Secret Men Club</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-5.jpg" alt="">
                <div class="trailer-item-info" data-video="lbUAVTc7NTo">
                    <h3>VICE</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-6.jpg" alt="">
                <div class="trailer-item-info" data-video="RyFlfN4dD14">
                    <h3>The Vanishing</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
        </div>
    </div>
    <footer></footer>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>
