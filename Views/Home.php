<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcas Exclusivas - Homepage</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?=media();?>images/favicon.ico" />
       
    <title>Home</title>
</head>
<body>
    <h1>Página principal Home</h1>
    <p>Nombre página: <?= $data['page_title'] ?> </p>
    <p>
        <?php
            dep($data);
        ?>
    </p>
</body>
</html>
