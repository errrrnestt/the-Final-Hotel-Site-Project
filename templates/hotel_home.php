<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/hotel_home.css">
    <script src="js/jquery.min.js"></script>
    <title>Home page</title>
</head>

<body>

    <div class="header">

        <header>

            <div id="logo">

                <img src="Photos/logo.png" alt="Logo">

            </div>

            <nav>

                <ul>

                    <li>
                        <a href="hotel_home.php">Home</a>
                    </li>

                    <li>
                        <a href="zimmer_list.php">Zimmern</a>
                    </li>

                    <li>
                        <a href="buchung_list.php">Buchungen</a>
                    </li>

                </ul>

            </nav>

        </header>

    </div>

    <div class="main">

        <h3> Herzlich wilkommen zu unserem Hotel "Transylvania! </h3>

        <table>

            <tr>

                <td id="leftSide">

                    <img src="Photos/hotel.jpg" alt="hotel" id="hotelImg">

                </td>

                <td id="rghtSide">

                    <div class="ZimmernAnsehen">

                        <button><a href="zimmer_list.php"> Zimmern ansehen</a> </button> 

                        <br>

                        <img src="Photos/zimmer1-1.jpg" alt="" id="zimBeispiel">
                        <img src="Photos/zimmer2-1.jpg" alt="" id="zimBeispiel">
                        <img src="Photos/zimmer3-1.jpg" alt="" id="zimBeispiel">
                        <img src="Photos/zimmer4-1.jpg" alt="" id="zimBeispiel"> 
                        
                        <br>

                    </div>



                </td>

            </tr>

        </table>

    </div>

</body>
</html>