<html>
<head>
    <style>
        * {
            font-family: sans-serif;
        }

        body {
            background-color: #333;
            color: white;
        }

        form input,
        form button {
            display: block;
            margin: 5px;
        }
        button{
            padd
        }

        body {
            overflow-x: hidden;
        }
        main{
        }

    </style>
</head>

<body>

    <?php
    require 'db.php';

    $users = [];
    $usersquery = $conn->prepare("Select * from users");
    $usersquery->execute();

    $res = $usersquery->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($usersquery->fetchAll()  as $k => $v) {
        $users[] = $v;
    }

    ?>
    <main class="">

    <h1>Register</h1>
    <form action="/insertuser.php" method="POST">
        <input type="text" placeholder="Cedula" name="cedula" />
        <input type="text" placeholder="Name" name="name" />
        <input type="email" placeholder="Email" name="email" />
        <input type="password" placeholder="Password" name="password" />
        <input type="password" placeholder="Confirm Password" name="confirm_password" />
        <button>Crear</button>
    </form>
    <table>
        <thead>
            <tr>
                <?php
                unset($users[0]["password"]);
                foreach ($users[0] as $key => $value) {
                ?>
                    <th><?= $key ?></th>
                <?php
                }
                ?>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($users as $user) {
                unset($user["password"]);
            ?>
                <tr>
                    <?php
                    foreach ($user as $key => $value) {
                    ?>
                        <td><?= $value ?></td>
                    <?php
                    }
                    ?>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </main>
    <footer class="">
        <div class=""></div>
        <div class="hola"></div>    
    </footer>
</body>
</html>
