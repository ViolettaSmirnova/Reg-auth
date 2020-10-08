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
                    <table border="1" class="users-table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Login</th>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Дата рождения</th>
                            <th>Удалить</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <!--<script>
     getallusers();
        function getallusers() {
            fetch("getallusers.php")
            .then(function(response) {return response.json()})
            .then(function(result) {
                let users = result;
                let tbody = document.querySelector(".users-table tbody");
                for (let user of users) {
                    let row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${user.id}</td>
                        <td>${user.login}</td>
                        <td>${user.name}</td>
                        <td>${user.lastname}</td>
                        <td>${user.birthday}</td>
                        <td class ='p-2'><button class='btn btn-danger'>Удалить</button></td>
                    `;
                    tbody.append(row);
                    let deleteButton = row.querySelector("button");
                    deleteButton.onclick = function() {
                        deleteUser(user.id, row);
                    }
                }
            });
        }
        function deleteUser(id, rowElement) {
            fetch("admin_obr.php?id=" + id)
            .then(function(response) {return response.text()})
            .then(function(result) {
                if(result == "ok") {
                    rowElement.remove();
                } else {
                    alert(result);  
                }
                
            })
        }
    </script>-->
    <script>
    class UserRow {
        constructor(id, login, name, lastname, birthday) {
            this.id = id;
            this.login = login;
            this.name = name;
            this.lastname = lastname;
            this.birthday = birthday;
            this.elem = document.createElement("tr");
            this.elem.innerHTML = `
                        <td>${this.id}</td>
                        <td>${this.login}</td>
                        <td>${this.name}</td>
                        <td>${this.lastname}</td>
                        <td>${this.birthday}</td>
                        <td class ='p-2'><button class='btn btn-danger'>Удалить</button></td>
            `;
            let tbody = document.querySelector(".users-table tbody");
            tbody.append(this.elem);
            let deleteButton = this.elem.querySelector("button");
            deleteButton.onclick = this.deleteUser.bind(this); 
            //метод bind - привязывает this к функции deleteUser, чтобы вместо самого элемента кнопки возвращался объект UserRow
            
        }

        deleteUser() {
            let userRow = this;
            fetch("admin_obr.php?id=" + userRow.id)
            .then(function(response) {return response.text()})
            .then(function(result) {
                if(result == "ok") {
                    userRow.elem.remove();
                } else {
                    alert(result);  
                }
            })
        }
    }

    getAllUsers();
    function getAllUsers() {
        fetch("getallusers.php")
            .then(function(response) {return response.json()})
            .then(function(result) {
                let users = result;
                for(let user of users) {
                    let userRow = new UserRow(user.id, user.login, user.name, user.lastname, user.birthday);
            }
        })
    }
    /*let userRow1 = new UserRow("1", "login123", "Пётр", "Васильев", "01-05-1991");
    let userRow2 = new UserRow("2", "yaroslav", "Ярослав", "Мудров", "03-11-1971")
    console.log(userRow1);
    console.log(userRow1.name);
    userRow1.name = "Сергей";
    console.log(userRow1.name);*/

    
    /*let x = 25;
    let y = 15;
    let z = x - y;
z = 10 && console.log(z);//тернарные операторы*/
    </script>
<?php
    require_once("components/footer.php");
?>