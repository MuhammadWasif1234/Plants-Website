<!DOCTYPE html>
<html>

<head>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Open Sans", sans-serif;
}

body {
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-color: #000;
    background-image: url("img/bg-img/2.jpg");
    background-position: center;
    background-size: cover;
    font-family: "Open Sans", sans-serif;
}

.wrapper {
    width: 100%;
    max-width: 400px;
    margin: auto;
    padding: 30px;
    text-align: center;
    border-radius: 8px;
    border: 1px solid rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(9px);
    -webkit-backdrop-filter: blur(9px);
    background-color: rgba(0, 0, 0, 0.5);
}

form {
    display: flex;
    flex-direction: column;
}

h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #fff;
}

.input-field {
    position: relative;
    border-bottom: 2px solid #ccc;
    margin: 15px 0;
}

.input-field label {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    color: #fff;
    font-size: 16px;
    pointer-events: none;
    transition: 0.15s ease;
}

.input-field input {
    width: 100%;
    height: 40px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 16px;
    color: #fff;
}

.input-field input:focus~label,
.input-field input:valid~label {
    font-size: 0.8rem;
    top: 10px;
    transform: translateY(-120%);
}

        .forget {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 25px 0 35px 0;
            color: #fff;
        }

        #remember {
            accent-color: #fff;
        }

        .forget label {
            display: flex;
            align-items: center;
        }

        .forget label p {
            margin-left: 8px;
        }

        .wrapper a {
            color: #efefef;
            text-decoration: none;
        }

        .wrapper a:hover {
            text-decoration: underline;
        }

        button {
            background: #fff;
            color: #000;
            font-weight: 600;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 3px;
            font-size: 16px;
            border: 2px solid transparent;
            transition: 0.3s ease;
        }

        button:hover {
            color: #fff;
            border-color: #fff;
            background: rgba(255, 255, 255, 0.15);
        }

        .register {
            text-align: center;
            margin-top: 30px;
            color: #fff;
        }
        @media screen and (max-width: 600px) {
            .wrapper {
                padding: 15px;
            }
            .input-field input,
            .input-field label {
                font-size: 14px;
            }
            button {
                font-size: 14px;
                padding: 10px 15px;
            }
        }

    </style>
</head>

<body>
    <?php
    include "../config.php";
    session_start();

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Check if the user is logged in
    if (isset($_SESSION["user_name"])) {
        $userName = $_SESSION["user_name"];

        // Retrieve user's information
        $sql = "SELECT * FROM `user` WHERE `usr_name` = '$userName'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Fetch the user's details
            $email = $row["usr_email"];
            $address = $row["usr_adrs"];
            $city = $row["usr_city"];
            $zip_code = $row["usr_zip"];
            $phone_number = $row["usr_cell"];
            // ... (other fields)
        } else {
            echo '<script>alert("User Not Found");</script>';
        }
    } else {
        // User is not logged in, redirect to login page
        header("Location: login.php");
        exit;
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
        // Retrieve edited data from the form
        $newName = $_POST["name"];
        $newEmail = $_POST["email"];
        $newAddress = $_POST["address"];
        $newCity = $_POST["city"];
        $newZipCode = $_POST["zip_code"];
        $newPhoneNumber = $_POST["phone_number"];
        // ... (other fields)

        // Update the user's information in the database
        $updateSql = "UPDATE `user` SET `usr_name`='$newName', `usr_email`='$newEmail', `usr_adrs`='$newAddress', `usr_city`='$newCity', `usr_zip`='$newZipCode', `usr_cell`='$newPhoneNumber' WHERE `usr_name`='$userName'";

        if (mysqli_query($conn, $updateSql)) {
            // Update session with the new name
            $_SESSION["user_name"] = $newName;
            echo '<script>alert("Profile updated successfully!");</script>';
            header("Location: index.php");
        } else {
            echo '<script>alert("Error updating profile: ' . mysqli_error($conn) . '");</script>';
        }
    }

    mysqli_close($conn);
    ?>

    <!-- HTML code for the edit profile form -->
    <div class="wrapper">
        <form method="post">
            <h2>Edit Profile</h2>
            <div class="input-field">
                <input type="text" required name="name" value="<?php echo $userName; ?>">
                <label>Name</label>
            </div>
            <div class="input-field">
                <input type="text" required name="email" value="<?php echo $email; ?>">
                <label>Email</label>
            </div>
            <div class="input-field">
                <input type="text" required name="address" value="<?php echo $address; ?>">
                <label>Address</label>
            </div>
            <div class="input-field">
                <input type="text" required name="city" value="<?php echo $city; ?>">
                <label>City</label>
            </div>
            <div class="input-field">
                <input type="text" required name="zip_code" value="<?php echo $zip_code; ?>">
                <label>Zip Code</label>
            </div>
            <div class="input-field">
                <input type="text" required name="phone_number" value="<?php echo $phone_number; ?>">
                <label>Phone Number</label>
            </div>
            <!-- ... (other fields) -->

            <button type="submit" name="update">Update Profile</button>
        </form>
    </div>

</body>

</html>
