<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ====== Meta Tags and External Resources ====== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/hotel_home.css"> <!-- Link to external CSS file -->
    <script src="jquery/jquery.min.js"></script> <!-- Link to jQuery script -->
    <title>Home page</title> <!-- Page title -->
</head>

<body>

    <!-- ====== Header Section ====== -->
    <header class="header">

        <!-- Logo container -->
        <div id="logo"><img src="Photos/logo.png" alt="Logo"></div>

        <!-- Main navigation -->
        <nav>
            <ul>
                <li><a href="hotel_home.php">Home</a></li>
                <li><a href="zimmer_list.php">Zimmern</a></li>
                <li><a href="buchung_list.php">Buchungen</a></li>
            </ul>
        </nav>

    </header>

    <!-- ====== Main Content Section ====== -->
    <div class="main">

        <!-- Welcome message -->
        <h3>HERZLICH WILLKOMMEN ZU UNSEREM HOTEL TRANSELVANIYA</h3>

        <!-- Table for layout -->
        <table>
            <tr>
                <!-- Left side with hotel image -->
                <td id="leftSide">
                    <img src="Photos/hotel.jpg" alt="hotel" id="hotelImg"> <!-- Hotel image -->
                </td>
                <!-- Right side with room images and button -->
                <td id="rghtSide">
                    <div class="ZimmernAnsehen">
                        <!-- Button to view rooms -->
                        <button><a href="zimmer_list.php"> Zimmern ansehen</a> </button> <br>
                        
                        <!-- Room images -->
                        <img src="Photos/zimmer1-1.jpg" alt="" id="zimBeispiel"> <!-- Room 1 image -->
                        <img src="Photos/zimmer2-1.jpg" alt="" id="zimBeispiel"> <!-- Room 2 image -->
                        <img src="Photos/zimmer3-1.jpg" alt="" id="zimBeispiel"> <!-- Room 3 image -->
                        <img src="Photos/zimmer4-1.jpg" alt="" id="zimBeispiel"> <!-- Room 4 image -->
                    </div>
                </td>
            </tr>
        </table>

    </div>

</body>

</html>
