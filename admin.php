<?php
session_start();
include  "includes/Inc.DBC.php";
if (isset($_SESSION['username']) && isset($_SESSION['admin_id'])) {   ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>HOME</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>


    <body>
        <?php include(getcwd() . "/header.php"); ?>
        <section class="container-fluid initialPageContent greenMountains pb-5">

            <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
                <?php if ($_SESSION['role'] == 'admin') { ?>
                    <!--Admin Users-->
                    <div class="card" style="width: 18rem;">
                        <img src="graphic/admin.png" class="card-img-top" alt="admin image">
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <?= $_SESSION['name'] ?>
                            </h5>
                            <a href="logout.php" class="globalButton blueButton w-100">Logout</a>
                        </div>
                    </div>
                    <div class="p-3">
                        <?php include 'includes/admin_user.php';
                        if (mysqli_num_rows($res) > 0) { ?>

                            <h1 class="display-4 fs-1">Admins</h1>
                            <table class="table" style="width: 32rem;">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($res)) { ?>
                                        <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <td><?= $rows['name'] ?></td>
                                            <td><?= $rows['username'] ?></td>
                                            <td><?= $rows['role'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                <?php } else { ?>


                <?php } ?>



            </div>
        </section>
        <?php include(getcwd() . "/footer.php"); ?>
    </body>


    </html>
<?php } else {
    header("Location: index.php");
} ?>