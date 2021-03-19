<?php
    include('db.php');
    if(isset($_POST['name']) && isset($_POST['author'])) {
        
        $nameFilter = htmlspecialchars($_POST ['name'], ENT_QUOTES, 'UTF-8');
        $authorFilter = htmlspecialchars($_POST ['author'], ENT_QUOTES, 'UTF-8');

        $name = $nameFilter;
        $author = $authorFilter;

        $query = "INSERT INTO music VALUES(null, '$name', '$author')";
        $mysqli->query($query);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>music</title>
</head>
<body>
    <div class="col-lg-6 col-lg-push-3 field">
        <form action="player.php" method="post" class="form-group">
            <legend>Исполнители / Песни</legend>
            <input type="text" name="name" placeholder="Название">
            <input type="text" name="author" placeholder="Автор">
            <button type="submit" class="btn">Отправить</button>
        </form>
        <table class="table table-striped ">
            <?php $querry = $mysqli->query('SELECT * FROM music'); ?>
            <?php if($querry): ?>
                <?php while ($row = mysqli_fetch_assoc($querry)): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </table>
    </div>
    <?php
        $mysqli->close();
    ?>
</body>
</html>