<?php
session_start();
include  "includes/Inc.DBC.php";
if (isset($_SESSION['username']) && isset($_SESSION['admin_id'])) {   ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Admin Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>


    <body>
        <?php include(getcwd() . "/header.php"); ?>
        <section class="container-fluid initialPageContent greenMountains pb-5">

            <div class="container" style="min-height: 100vh">
                <?php if ($_SESSION['role'] == 'admin') { ?>
                  <div class="row w-100 d-flex flex-wrap justify-content-center align-items-start">
                    <!--Admin Users-->
                    <div class="col-3 adminCard py-4 position-sticky white-bg rounded-custom box-shadow">
                        <img src="graphic/admin.png" class="card-img-top" alt="admin image">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-4">
                                <?= $_SESSION['name'] ?>
                            </h5>
                            <a href="/edit-account.php?id=<?= $_SESSION['admin_id'] ?>" class="globalButton blueButton w-100 mt-5">Edit Account</a>
                            <a href="/logout.php" class="globalButton redButton w-100 mt-5">Logout</a>
                        </div>
                    </div>

                    <!-- Admin info table -->
                    <?php include 'includes/admin_user.php';
                      if (mysqli_num_rows($admin_query) > 0) { ?>
                        <div class="col-8 offset-1 p-4 mb-0 rounded-custom white-bg box-shadow adminDashTable" id="adminTable">
                            <h1 class="fs-1 mb-3 text-center text-shadow">Admins</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($admin_query)) { ?>
                                        <tr>
                                            <th scope="row"><?= $rows['admin_id'] ?></th>
                                            <td><?= $rows['name'] ?></td>
                                            <td><?= $rows['username'] ?></td>
                                            <td><?= $rows['role'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                          </div>
                        <?php } ?>
                    <!-- User info table -->
                    <?php include 'includes/user_table.php';
                      if (mysqli_num_rows($user_query) > 0) { ?>
                        <div class="col-8 offset-4 p-4 mb-5 rounded-custom white-bg box-shadow adminDashTable" id="userTable">
                            <h1 class="fs-1 mb-3 text-center text-shadow">Users</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($user_query)) { ?>
                                        <tr>
                                            <th scope="row"><?= $rows['user_id'] ?></th>
                                            <td><?= $rows['fname'] ?></td>
                                            <td><?= $rows['lname'] ?></td>
                                            <td><?= $rows['email'] ?></td>
                                            <td><?= $rows['username'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                          </div>
                        <?php } ?>
                    <!-- Property info table -->
                    <?php include 'includes/property_table.php';
                      if (mysqli_num_rows($prop_query) > 0) { ?>
                        <div class="col-8 offset-4 p-4 mb-5 mt-4 rounded-custom white-bg box-shadow adminDashTable" id="userTable">
                            <h1 class="fs-1 mb-3 text-center text-shadow">Properties</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Owner</th>
                                        <th scope="col">Beds</th>
                                        <th scope="col">Baths</th>
                                        <th scope="col">Pets</th>
                                        <th scope="col">Kids</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($prop_query)) { ?>
                                        <tr>
                                            <th scope="row"><?= $rows['property_id'] ?></th>
                                            <td><?= $rows['name'] ?></td>
                                            <td><?= $rows['address'] ?><br><?= $rows['city'] ?>, <?= $rows['state'] ?> <?= $rows['zip'] ?></td>
                                            <td><?= $rows['username'] ?></td>
                                            <td><?= $rows['bedrooms'] ?></td>
                                            <td><?= $rows['bathrooms'] ?></td>
                                            <td><?php if ($rows['pets'] == 1) { ?>Yes<?php } else { ?>No<?php } ?></td>
                                            <td><?php if ($rows['kids'] == 1) { ?>Yes<?php } else { ?>No<?php } ?></td>
                                            <td>$<?= $rows['price'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                          </div>
                        <?php } ?>
                    <!-- Reservation info table -->
                    <?php include 'includes/res_table.php';
                      if (mysqli_num_rows($res_query) > 0) { ?>
                        <div class="col-8 offset-4 p-4 mb-5 mt-4 rounded-custom white-bg box-shadow adminDashTable" id="userTable">

                            <h1 class="fs-1 mb-3 text-center text-shadow">Reservations</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Property</th>
                                        <th scope="col">Dates</th>
                                        <th scope="col">Adults</th>
                                        <th scope="col">Kids</th>
                                        <th scope="col">Pets</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($res_query)) { ?>
                                        <tr>
                                            <th scope="row"><?= $i // $rows['reservation_id'] ?></th>
                                            <td><?= $rows['fname'] ?></td>
                                            <td><?= $rows['lname'] ?></td>
                                            <td><?= $rows['email'] ?></td>
                                            <td><?= $rows['username'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                          </div>
                        <?php } ?>

                  </div>
                <?php } else { // Display nothing
                } ?>
            </div>
        </section>
        <?php include(getcwd() . "/footer.php"); ?>
    </body>


    </html>
<?php } else {
    header("Location: index.php");
} ?>
