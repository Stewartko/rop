<?php
    include("config.php");
    $id = $_SESSION["id"];

    $result = mysqli_query($conn, "SELECT * FROM zakaznik WHERE idZakaznika = $id");

    while($res = mysqli_fetch_array($result)) {
        $name = $res["meno"];
        $surname = $res["priezvisko"];
        $email = $res["email"];
        $phone = $res["mobil"];
        $idZakaznika = $res["idZakaznika"];
        $heslo = $res["heslo"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<link rel="stylesheet" href="styles/footer/footer.css">
	<link rel="stylesheet" href="styles/header/headerS.css">
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="styles/edit/edit.css">
	<link rel="stylesheet" href="styles/register/register.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<title>Document</title>
</head>
<body>
	<?php include("parts/header.php") ?>


	<section>
            <div class="container">
                <form name="form1" method="post" action="procesData.php">
                    <div class="head">
                        <p>Úprava profilu</p>

                        <div class="underline"></div>
                    </div>
                    
                    <div class="forms">
                        <label for="name">Meno</label>
                        <input type="text" name="name" value="<?php echo $name;?>" required pattern="<?php echo $patternInput; ?>" title="Meno môže obsahovať znaky slovenskej abecedy a nesmie obsahovať viac ako 30 znakov.">
                    </div>

                    <div class="forms">
                        <label for="surname">Priezvisko</label>
						<input type="text" name="surname" value="<?php echo $surname;?>" required pattern="<?php echo $patternInput; ?>" title="Priezvisko môže obsahovať znaky slovenskej abecedy.">
                    </div>

					<div class="forms">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="<?php echo $email;?>" required pattern="<?php echo $patternEmail; ?>" title="Formát emailu.">
                    </div>

                    <div class="forms">
                        <label for="phone">Cislo</label>
						<input type="text" name="phone" value="<?php echo $phone;?>" required pattern="<?php echo $patternPhone; ?>" title="Telefónne číslo musí obsahovať slovenskú alebo českú predvoľbu.">
                    </div>

                    <div class="forms">
                        <label for="phone">Staré heslo</label>
						<input type="password" name="oldPass" value="" required pattern="<?php echo $patternPass; ?>" title="Heslo musí obsahovať najmenej 6 znakov.">
                    </div>

                    <div class="forms">
                        <label for="phone">Nové heslo</label>
						<input type="password" name="newPass" value="" required pattern="<?php echo $patternPass; ?>" title="Heslo musí obsahovať najmenej 6 znakov.">
                    </div>

                    <div class="bt">
						<input type="hidden" name="id" value=<?php echo $idZakaznika;?>>
                        <input type="hidden" name="password" value=<?php echo $heslo;?>>
						<button type="submit" name="update" value="Update">Uložiť zmeny</button>
                    </div>
                </form>
            </div>
        </section>
	<?php include("parts/footer.php") ?>
</body>
</html>