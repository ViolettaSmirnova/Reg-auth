<?php
    session_start();
        if(!isset($_SESSION['id']) or $_SESSION['isAdmin'] == 0) {
            header("Location: lk.php");
        }
    $title = "Панель администратора";
    require_once("components/header.php");
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center">Панель администратора</h1>
            </div>
            <div class="col-6">
                <table border="1">
                    <tr>
                        <td>ID</td>
                        <td>Login</td>
                        <td>Имя</td>
                        <td>Фамилия</td>
                        <td>Дата рождения</td>
                    </tr>
                    <?php
                    require_once("components/db.php");
                    $result = $mysqli->query("SELECT * FROM `users` WHERE 1");
                    /*$users = [];

                    while($row = $result->fetch_assoc()) {
                        //array_push($users, $row);
                        $users[] = $row;
                    }
                        var_dump($users);*/
                    for($users = []; $row = $result->fetch_assoc(); $users[] = $row);
                    foreach($users as $user) :

                    ?>
                     <tr>
                        <td><?php echo $user['id'] ?></td>
                        <td><?php echo $user['login'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['lastname'] ?></td>
                        <td><?= $user['birthday'] ?></td>
                        <td class="p-2"><a href="admin_obr.php?id=<?= $user['id'] ?>" class="btn btn-danger">Удалить</a></td>
                      </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
<?php
    require_once("components/footer.php");
?>