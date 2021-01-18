
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="view/css/bootstrap.css" rel="stylesheet" >
    <title>Forma</title>
</head>
<body>
<div class="container">

        <?php if (isset($_POST['send'])):?>


            <?php

            if (!preg_match('/[A-Z]./',$_POST['name'])){
                $validation[] = 'Neįvedete vardo';}
           if (!preg_match('/[A-Z]./',$_POST['lastname'])){
               $validation[] = 'Neįvedete pavardės';}
           if ($_POST["departaments"] == "Pasirinkite departamentą"||!preg_match('/./',$_POST["departaments"])){
               $validation[] = 'Nepasirinkote departamento';}
            if (!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/',$_POST['email'])){
                $validation[] = 'Neįvestas el. paštas';}
            if (!preg_match('/^\w{1,200}$/',$_POST['message'])){
                $validation[] = 'Neįvedėte žinutės arba viršijote simbolių kiekį';}
            ?>

            <?php endif ?>
    <?php if (isset($_POST['send']) & empty($validation)):?>
    <section>
        <h2>Formos duomenys</h2>
        <ul>
        <?php foreach ($_POST as $duomenys => $value):?>
        <?php if($duomenys != "send"):?>


      <li><span><?=htmlspecialchars($duomenys);?>:  <?=htmlspecialchars(ucfirst($value));?></li>
        <?php endif;?>
        <?php endforeach;?>
        </ul>
    </section>


<?php else:?>
    <?php foreach ($validation as $error):?>
    <div class="alert alert-danger" role="alert">
    <?=$error;?>
</div>
<?php endforeach;?>

    <form method="post">
        <div class="form-group">
            <label for="name">Vardas</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">Įveskite vardą</small>
        </div>
        <div class="form-group">
            <label for="lastname">Pavardė</label>
            <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastNameHelp">
            <small id="lastNameHelp" class="form-text text-muted">Įveskite pavardę</small>
        </div>

        <select class="form-group" name="departaments" aria-label="Default select example">
            <option selected>Pasirinkite departamentą</option>
            <?php foreach ($skyriai as $dep):?>
            <option name="name"  id="name" name="name" value=<?=$dep;?>><?=$dep;?></option>
            <?php endforeach?>
        </select>
        <div class="form-group">
            <label for="InputEmail1">El. paštas</label>
            <input type="email" class="form-control" id="InputEmail1" name= "email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Jūsų el. pašto adresas</small>
        </div>
        <div class="form-group">
            <label for="message">Žinutė</label>
            <textarea class="form-control" id="message" rows="3" name="message" ></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="send">Siųsti</button>
    </form>



</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
</body>
</html>
<?php endif;?>