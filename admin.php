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
        <section class="container-fluid initialPageContent greenMountains p-0">

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
                                        <tr user-id="<?= $rows['user_id'] ?>" first-name="<?= $rows['fname'] ?>" last-name="<?= $rows['lname'] ?>" email="<?= $rows['email'] ?>" username="<?= $rows['username'] ?>" class="popup-row user-row">
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
                            <div class="w-100 py-3 text-center">
                              <a class="globalButton blueButton mt-3 mb-2 popup-button" href="#" popup-form="add-user">Add New User</a>
                            </div>
                          </div>
                        <?php } ?>
                    <!-- Property info table -->
                    <?php include 'includes/property_table.php';
                      if (mysqli_num_rows($prop_query) > 0) { ?>
                        <div class="col-8 offset-4 p-4 mb-5 mt-4 rounded-custom white-bg box-shadow adminDashTable" id="propertyTable">
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
                            <div class="w-100 py-3 text-center">
                              <a class="globalButton blueButton mt-3 mb-2 popup-button" href="#" popup-form="add-property">Add New Property</a>
                            </div>
                          </div>
                        <?php } ?>
                    <!-- Reservation info table -->
                    <?php include 'includes/res_table.php';
                      if (mysqli_num_rows($res_query) > 0) { ?>
                        <div class="col-8 offset-4 p-4 mb-5 mt-4 rounded-custom white-bg box-shadow adminDashTable" id="reservationTable">

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
                            <div class="w-100 py-3 text-center">
                              <a class="globalButton blueButton mt-3 mb-2 popup-button" href="#" popup-form="add-reservation">Add New Reservation</a>
                            </div>
                          </div>
                        <?php } ?>

                  </div>
                <?php } else { // Display nothing
                } ?>
            </div>

            <div id="black-overlay" class= "hide w-100 p-5 align-items-center justify-content-center position-fixed top-0">
              <div class="p-4 rounded-custom white-bg box-shadow popup-container d-flex flex-wrap justify-content-end">
                <span class="close-btn"><i class="bi bi-x-circle"></i></span>

                <div id="add-user" class="hide popup-form w-100">
                  <h3 class="mb-3">Add New User</h3>
                  <form method="POST" action="includes/inc.adminCreateUser.php" enctype="multipart/form-data">
                    <div class="form-field-container d-flex">
                      <input type="hidden" name="userID" readonly>
                      <input type="text" class="form-control me-3" name="fname" placeholder="First Name" required>
                      <input type="text" class="form-control me-3" name="lname" placeholder="Last Name" required>
                      <input type="text" class="form-control me-3" name="username" placeholder="Username" required>
                      <input type="email" class="form-control me-3" name="email" placeholder="email@address.com" required>
                      <input type="password" class="form-control me-3" placeholder="Password" name="password" autocomplete="new-password" required>
                      <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required>
                    </div>
                    <div class="pt-3 text-center">
                      <button type="submit" name="submit" class="globalButton orangeButton">Create User</button>
                    </div>
                  </form>
                </div>

                <div id="edit-user" class="hide popup-form w-100">
                  <h3 class="mb-3">Update User</h3>
                  <form method="POST" action="includes/inc.adminUpdateUser.php" enctype="multipart/form-data">
                    <div class="form-field-container d-flex">
                      <input type="hidden" name="userID" readonly>
                      <input type="text" class="form-control me-3" name="fName" placeholder="First Name" required>
                      <input type="text" class="form-control me-3" name="lName" placeholder="Last Name" required>
                      <input type="text" class="form-control me-3" name="username" placeholder="Username" required>
                      <input type="email" class="form-control me-3" name="email" placeholder="email@address.com" required>
                      <input type="password" class="form-control me-3" placeholder="New Password" name="password" autocomplete="new-password">
                      <input type="password" class="form-control" placeholder="Confirm New Password" name="confirmpassword" autocomplete="new-password">
                    </div>
                    <div class="pt-3">
                      <button type="submit" name="submit" class="globalButton orangeButton me-3">Update User</button>
                      <button type="delete" name="delete" class="globalButton redButton">Delete User</button>
                    </div>
                  </form>
                </div>

                <div id="add-property" class="hide popup-form w-100">
                  <h3 class="mb-3">Add Property</h3>
                  <form method="POST" action="includes/inc.adminCreateProperty.php" enctype="multipart/form-data" class="d-flex flex-wrap">
                    <div class="mb-3 w-100 d-flex align-items-start justify-content-between">
                      <input type="text" class="form-control me-3" name="propName" aria-describedby="propHelp" placeholder="Property Name" required>
                      <textarea rows="1" cols="50" class="form-control" name="propDescription" placeholder="Amenities, fun things to do in the area..."></textarea>
                    </div>
                    <div class="mb-3 w-100">
                      <select name="bedrooms" class="me-3" required>
                         <option value="Studio">Studio</option>
                         <option value="1">1 Bed</option>
                         <option value="2">2 Beds</option>
                         <option value="3">3 Beds</option>
                         <option value="4+">4+ Beds</option>
                       </select>
                      <select name="bathrooms" class="me-3" required>
                         <option value=".5">.5 Bath</option>
                         <option value="1">1 Bath</option>
                         <option value="1.5">1.5 Bath</option>
                         <option value="2">2 Bath</option>
                         <option value="2.5">2.5 Bath</option>
                         <option value="3">3 Bath</option>
                         <option value="3.5">3.5 Bath</option>
                         <option value="4+">4+ Bath</option>
                       </select>
                      <input name="kidFriendly" type="hidden" value="0">
                      <input type="checkbox" name="kidFriendly" value="1">
                      <label for="kidFriendly" class="me-3">Kids Allowed</label>
                      <input name="petFriendly" type="hidden" value="0">
                      <input type="checkbox" name="petFriendly" value="1">
                      <label for="petFriendly">Pets Allowed</label>
                    </div>
                    <div class="mb-3 w-100 d-flex justify-content-between align-items-center">
                      <input type="text" class="form-control me-3" name="address1" placeholder="Street Address" required>
                      <input type="text" class="form-control me-3" name="city" placeholder="City" required>
                      <select name="state" class="me-3" required>
                          <option value="" selected="selected" disabled>State</option>
                          <option value="AL">AL</option>
                          <option value="AK">AK</option>
                          <option value="AZ">AZ</option>
                          <option value="AR">AR</option>
                          <option value="CA">CA</option>
                          <option value="CO">CO</option>
                          <option value="CT">CT</option>
                          <option value="DE">DE</option>
                          <option value="DC">D.C.</option>
                          <option value="FL">FL</option>
                          <option value="GA">GA</option>
                          <option value="HI">HI</option>
                          <option value="ID">ID</option>
                          <option value="IL">IL</option>
                          <option value="IN">IN</option>
                          <option value="IA">IA</option>
                          <option value="KS">KS</option>
                          <option value="KY">KY</option>
                          <option value="LA">LA</option>
                          <option value="ME">ME</option>
                          <option value="MD">MD</option>
                          <option value="MA">MA</option>
                          <option value="MI">MI</option>
                          <option value="MN">MN</option>
                          <option value="MS">MS</option>
                          <option value="MO">MO</option>
                          <option value="MT">MT</option>
                          <option value="NE">NE</option>
                          <option value="NV">NV</option>
                          <option value="NH">NH</option>
                          <option value="NJ">NJ</option>
                          <option value="NM">NM</option>
                          <option value="NY">NY</option>
                          <option value="NC">NC</option>
                          <option value="ND">ND</option>
                          <option value="OH">OH</option>
                          <option value="OK">OK</option>
                          <option value="OR">OR</option>
                          <option value="PA">PA</option>
                          <option value="RI">RI</option>
                          <option value="SC">SC</option>
                          <option value="SD">SD</option>
                          <option value="TN">TN</option>
                          <option value="TX">TX</option>
                          <option value="UT">UT</option>
                          <option value="VT">VT</option>
                          <option value="VA">VA</option>
                          <option value="WA">WA</option>
                          <option value="WV">WV</option>
                          <option value="WI">WI</option>
                          <option value="WY">WY</option>
                        </select>
                      <input type="text" class="form-control me-3" name="zipCode" placeholder="Zip Code" pattern="[0-9]{5}" required />
                      $ <input type="number" class="ms-1" step="0.01" name="price" placeholder="Price" required/>
                    </div>
                    <div class="pt-3 text-center">
                      <button type="submit" value="Add Property" name="submit"  class="globalButton blueButton">Add Property</button>
                    </div>
                    </div>
                  </form>
                </div>

                <div id="edit-property" class="hide popup-form w-100">
                  edit property form here
                </div>

                <div id="add-reservation" class="hide popup-form w-100">
                  add reservation form here
                </div>

                <div id="edit-reservation" class="hide popup-form w-100">
                  edit reservation form here
                </div>

              </div>
            </div>
        </section>
        <?php include(getcwd() . "/footer.php"); ?>
    </body>


    </html>
    <script>
      $( document ).ready(function() {
        $('.close-btn i').click(function(e){
          e.preventDefault();
          $('#black-overlay').fadeTo( 200, 0,function(){
              $('#black-overlay').addClass('hide');
              $('#black-overlay').find('.popup-form').addClass('hide');
            });
        });

        $('.popup-button').click(function(e){
          var displayForm = "#" + $(this).attr('popup-form') + "";
          e.preventDefault();
          $('#black-overlay').removeClass('hide');
          $(displayForm).removeClass('hide');
          $('#black-overlay').fadeTo( 200, 1.0 );
        });

        $('.user-row').click(function(e){
          e.preventDefault();
          $('#black-overlay').removeClass('hide');
          $('#edit-user').removeClass('hide');
          var user_id = $(this).attr('user-id');
          var fname = $(this).attr('first-name');
          var lname = $(this).attr('last-name');
          var email = $(this).attr('email');
          var username = $(this).attr('username');

          $('#edit-user').find('input[name="userID"]').val(user_id);
          $('#edit-user').find('input[name="fName"]').val(fname);
          $('#edit-user').find('input[name="lName"]').val(lname);
          $('#edit-user').find('input[name="email"]').val(email);
          $('#edit-user').find('input[name="username"]').val(username);

          $('#black-overlay').fadeTo( 200, 1.0 );
        });

      });
    </script>
<?php } else {
    header("Location: index.php");
} ?>
