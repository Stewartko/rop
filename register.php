<?php
    include 'config.php';
    if(!empty($_SESSION["id"])){
        header("Location: index.php");
    }
    if(isset($_POST["submit"])){
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $duplicate = mysqli_query($conn, "SELECT * FROM zakaznik WHERE mobil = '$phone' OR email = '$email'");
        if(mysqli_num_rows($duplicate) > 0){
            echo "<script> alert('Telefónne číslo alebo email je už zaregistrovaný'); </script>";
        }
        else{
            if($password == $confirmpassword){
                $query = "INSERT INTO zakaznik VALUES('','$firstName','$lastName','$email','$phone','$password')";
                mysqli_query($conn, $query);
                echo "<script> alert('Registrácia úspešná'); </script>";
            }
            else{
                echo "<script> alert('Heslá sa nezhodujú'); </script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/header/headerS.css">
    <link rel="stylesheet" href="styles/footer/footer.css">
    <link rel="stylesheet" href="styles/register/register.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Montserrat:wght@400;500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
</head>

<body>
    <?php include 'parts/header.php'; ?>
    <main>
        <section>
            <div class="container">
                <div class="head">
                    <p>Registrácia</p>

                    <div class="underline"></div>
                </div>
                
                <form class="form" action="" method="post" autocomplete="off">

                    
                    <div class="forms">
                        <label for="firstName">Meno</label>
                        <input type="text" name="firstName" id = "firstName" required value="" placeholder="Meno">
                    </div>

                    <div class="forms">
                        <label for="lastName">Priezvisko</label>
                        <input type="text" name="lastName" id = "lastName" required value="" placeholder="Priezvisko">
                    </div>

                    <div class="forms">
                        <label for="email">Email</label>
                        <input type="email" name="email" id = "email" required value="" placeholder="email@gmail.com">
                    </div>

                    <div class="forms">
                        <label for="phone">Tel. číslo</label>
                        <input type="text" name="phone" id = "phone" required value="" placeholder="+421123456789">
                    </div>

                    <div class="forms">
                        <label for="password">Heslo</label>
                        <input type="password" name="password" id = "password" required value="" placeholder="Najmenej 6 znakov">
                    </div>

                    <div class="forms">
                        <label for="confirmpassword">Heslo</label>
                        <input type="password" name="confirmpassword" id = "confirmpassword" required value="" placeholder="Zopakuj heslo">
                    </div>

                    <div class="bt">
                        <button type="submit" name="submit">Register</button>
                    </div>
                    <div class="login">
                        <a class="log" href="login.php">Už máš účet?/Log In</a>
                    </div>
                </form>
            </div>

            <div class="news">
                <div class="check">
                    <input type="checkbox">
                    <h4>Prihlas sa na odber noviniek</h4>
                </div>
                <div class="text">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum aperiam, delectus nisi deserunt explicabo tempora? Ab sit minus inventore amet aliquam quisquam natus perferendis dignissimos laborum, maxime aspernatur, illum, pariatur iste facere impedit saepe vero ex modi voluptatibus debitis? Beatae temporibus facere natus aperiam magni rerum inventore exercitationem dolorum excepturi.</p>
                </div>
            </div>
        </section>

        <section class="textPage">
            <div class="pros">
                <div class="text">
                    <h2>Prečo sa zaregistrovať?</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas odit eum ipsum. Odio esse
                        temporibus culpa? Deleniti unde minus ipsum, ad nihil molestiae explicabo iste doloribus ab
                        fugit? Quibusdam, quis?</p>
                </div>
                <div class="text">
                    <h2>Aké výhody získaš?</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas odit eum ipsum. Odio esse
                        temporibus culpa? Deleniti unde minus ipsum, ad nihil molestiae explicabo iste doloribus ab
                        fugit? Quibusdam, quis?</p>
                </div>
                <div class="text">
                    <h2>Výhodnejšie ponuky</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas odit eum ipsum. Odio esse
                        temporibus culpa? Deleniti unde minus ipsum, ad nihil molestiae explicabo iste doloribus ab
                        fugit? Quibusdam, quis?</p>
                </div>
            </div>
        </section>
    </main>

    <?php include "parts/footer.php"; ?>
</body>

<script src="javascript/main.js"></script>
</html>