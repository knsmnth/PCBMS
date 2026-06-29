<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PCBMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet" />
  
    <style>
        body {
            background-image: url('../images/vsu-art.png');
            background-size: cover;
            font-family: 'Montserrat', sans-serif;
        }

        .container {
            margin-top: 8%;
        }

        .login-form {
            width: 400px;
            margin: 20px auto;
            font-size: 15px;
            margin-bottom: 20px;
            background: rgba(255, 255, 255, 0.8); /* Updated: Set the background color to 20% transparent */
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .text-center {
            text-align: center;
        }

        .login-form h2 {
            margin: 10px 2px 15px;
            font-size: 24px; /* Updated: Adjust the header font size */
        }

        .h2 {
            color: #000000;
            margin-top: 25px;
            margin-bottom: 30px;
            font-size: 18px; /* Updated: Adjust the header font size */
        }

        .form-control,
        .btn {
            min-height: 50px;
            border-radius: 5px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
            background-color: #2196f3;
            border-color: #2196f3;
            color: #fff;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .icon {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row h-50 align-items-center">
            <div class="text-center">
                <img src="images/vsu-logo.png" class="image">
                <h2 class="h2">PASALUBONG CENTER BUSINESS MANAGEMENT</h2>
            </div>
            <form class="login-form" action="login/UserLogin.php" method="post">
                <h2 class="text-center">Login</h2>
                <?php
                if (@$_GET['Invalid'] == 1) {
                    ?>
                    <div class="mdi mdi-do-not-disturb mr-1 alert alert-danger text-center my-3" role="alert">
                        Incorrect email and/or password.
                    </div>
                    <?php
                }
                ?>
                <?php
                if (@$_GET['Invalid'] == 2) {
                    ?>
                    <div class="mdi mdi-do-not-disturb mr-1 alert alert-danger text-center my-3" role="alert">
                        Role is incorrect, please try again.
                    </div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="" disabled selected>Select a role</option>
                    <option value="Personnel">Personnel</option>
                    <option value="Cashier">Cashier</option>
                    <option value="Manager">Manager</option>
                </select>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Log in</button>
                </div>
            </form>
        </div>

        <?php include "footers/footer.php"; ?>
    </div>
</body>

</html>
