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
                                    $user_array = [];
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($user_query)) {
                                      $user_array[] = array($rows['user_id'], $rows['username']);
                                      ?>
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
                                    $property_array = [];
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($prop_query)) {
                                      $property_array[] = array($rows['property_id'], $rows['name']);?>
                                        <tr class="popup-row property-row"
                                            property-id="<?= $rows['property_id'] ?>"
                                            property-name="<?= $rows['name'] ?>"
                                            property-description="<?= $rows['description'] ?>"
                                            property-address="<?= $rows['address'] ?>"
                                            property-city="<?= $rows['city'] ?>"
                                            property-state="<?= $rows['state'] ?>"
                                            property-zip="<?= $rows['zip'] ?>"
                                            property-bedrooms="<?= $rows['bedrooms'] ?>"
                                            property-bathrooms="<?= $rows['bathrooms'] ?>"
                                            property-kids="<?= $rows['kids'] ?>"
                                            property-pets="<?= $rows['pets'] ?>"
                                            property-price="<?= $rows['price'] ?>"
                                        >
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

                <!-- Profile Avatar table -->
                <?php include 'includes/avatar_table.php';
                  if (mysqli_num_rows($prop_query) > 0) { ?>
                    <div class="col-8 offset-4 p-4 mb-5 mt-4 rounded-custom white-bg box-shadow adminDashTable" id="avatarTable">
                        <h1 class="fs-1 mb-3 text-center text-shadow">Profile Avatars</h1>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">File</th>
                                <th scope="col">User</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($rows = mysqli_fetch_assoc($prop_query)) { ?>
                                    <tr class="popup-row avatar-row"
                                        avatar-id="<?= $rows['avatar_id'] ?>"
                                        avatar-user-id="<?= $rows['user_id'] ?>"
                                    >
                                        <th scope="row"><?= $rows['avatar_id'] ?></th>
                                        <td><img class="table-image" src="/graphic/uploads/users/<?= $rows['filename'] ?>"></td>
                                        <td><?= $rows['username'] ?></td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                        <div class="w-100 py-3 text-center">
                          <a class="globalButton blueButton mt-3 mb-2 popup-button" href="#" popup-form="add-avatar">Add New Profile Avatar</a>
                        </div>
                      </div>
                    <?php } ?>

                    <!-- Property Image table -->
                    <?php include 'includes/image_table.php';
                      if (mysqli_num_rows($prop_query) > 0) { ?>
                        <div class="col-8 offset-4 p-4 mb-5 mt-4 rounded-custom white-bg box-shadow adminDashTable" id="imageTable">
                            <h1 class="fs-1 mb-3 text-center text-shadow">Property Images</h1>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Property</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($prop_query)) { ?>
                                        <tr class="popup-row image-row"
                                            image-id="<?= $rows['image_id'] ?>"
                                            image-property-id="<?= $rows['property_id'] ?>"
                                        >
                                            <th scope="row"><?= $rows['image_id'] ?></th>
                                            <td><img class="table-image" src="/graphic/uploads/<?= $rows['filename'] ?>"></td>
                                            <td><?= $rows['name'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                            <div class="w-100 py-3 text-center">
                              <a class="globalButton blueButton mt-3 mb-2 popup-button" href="#" popup-form="add-image">Add New Property Image</a>
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
                  <h3 class="mb-3">Add A New User</h3>
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
                    <div class="pt-3">
                      <button type="submit" name="submit" class="globalButton blueButton">Create User</button>
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
                  <h3 class="mb-3">Add A New Property</h3>
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
                         <option value="1.5">1.5 Baths</option>
                         <option value="2">2 Baths</option>
                         <option value="2.5">2.5 Baths</option>
                         <option value="3">3 Baths</option>
                         <option value="3.5">3.5 Baths</option>
                         <option value="4+">4+ Baths</option>
                       </select>
                      <input name="kidFriendly" type="hidden" value="0">
                      <input type="checkbox" name="kidFriendly" class="me-1" value="1">
                      <label for="kidFriendly" class="me-3">Kids Allowed</label>
                      <input name="petFriendly" type="hidden" value="0">
                      <input type="checkbox" name="petFriendly" class="me-1" value="1">
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
                  </form>
                </div>

                <div id="edit-property" class="hide popup-form w-100">
                  <h3 class="mb-3">Update Property Information</h3>
                  <form method="POST" action="includes/inc.adminUpdateProperty.php" enctype="multipart/form-data" class="d-flex flex-wrap">
                    <div class="mb-3 w-100 d-flex align-items-start justify-content-between">
                      <input type="text" class="form-control me-3" name="propName" aria-describedby="propHelp" required>
                      <textarea rows="1" cols="50" class="form-control" name="propDescription"></textarea>
                    </div>

                    <div class="mb-3 w-100 d-flex align-items-center justify-content-start">
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
                         <option value="1.5">1.5 Baths</option>
                         <option value="2">2 Baths</option>
                         <option value="2.5">2.5 Baths</option>
                         <option value="3">3 Baths</option>
                         <option value="3.5">3.5 Baths</option>
                         <option value="4+">4+ Baths</option>
                       </select>

                      <input type="checkbox" name="kidFriendly" class="me-1" value="1">
                      <label for="kidFriendly" class="me-3">Kids Allowed</label><br>
                      <input type="checkbox" name="petFriendly" class="me-1" value="1">
                      <label for="petFriendly">Pets Allowed</label>

                    </div>

                    <div class="mb-3 w-100 d-flex align-items-center justify-content-between">
                      <input type="text" class="form-control me-3" name="address1" required />
                      <input type="text" class="form-control me-3" name="city" required />
                      <select name="state" class="me-3">
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
                      <input type="text" class="form-control me-3" name="zipCode" pattern="[0-9]{5}" required />
                      $<input type="number" step="0.01" name="price" class="ms-1" required />
                    </div>

                    <input type="hidden" name="propertyID" readonly>

                    <div class="pt-3 text-center">
                      <button type="submit" value="Update" name="submit"  class="globalButton orangeButton me-3">Update Property</button>
                      <button type="delete" name="delete" class="globalButton redButton">Delete Property</button>
                    </div>
                 </form>
                </div>

                <div id="add-reservation" class="hide popup-form w-100">
                  add reservation form here
                </div>

                <div id="edit-reservation" class="hide popup-form w-100">
                  edit reservation form here
                </div>

                <div id="add-avatar" class="hide popup-form w-100">
                  add profile avatar form here
                  needs file upload, select dropdown of users to pull id
                  user is required, file is required.
                  <select class="userSelect"><option>Test Option</option></select>
                </div>

                <div id="edit-avatar" class="hide popup-form w-100">
                  edit profile avatar form here
                  needs hidden avatar id, file upload, select dropdown of users to pull id, delete button
                  user is required, if file is empty, no change.
                  <select class="userSelect"></select>
                </div>

                <div id="add-image" class="hide popup-form w-100">
                  add property image form here
                  needs file upload, select dropdown of properties to pull id
                  property is required, file is required.
                  <select class="propertySelect"><option>Test Option</option></select>
                </div>

                <div id="edit-image" class="hide popup-form w-100">
                  edit property image form here
                  needs hidden image id, file upload, select dropdown of property to pull id, delete button
                  property is required, if file is empty, no change.
                  <select class="propertySelect"></select>
                </div>

              </div>
            </div>
        </section>
        <?php include(getcwd() . "/footer.php"); ?>
    </body>


    </html>
    <script>
    // Access the user array
    var userArray = <?php echo json_encode($user_array); ?>;
    var propertyArray = <?php echo json_encode($property_array); ?>;

    function generateDynamicSelect(array, className){
      var $el = $("." + className);
      $el.empty(); // remove old options
      for(var i = 0; i < array.length; i++){
        $el.append($("<option></option>")
           .attr("value", array[i][0]).text(array[i][1]));
      }
    }

      $( document ).ready(function() {
        generateDynamicSelect(userArray, 'userSelect');
        generateDynamicSelect(propertyArray, 'propertySelect');
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

        $('.property-row').click(function(e){
          e.preventDefault();
          $('#black-overlay').removeClass('hide');
          $('#edit-property').removeClass('hide');
          var prop_id = $(this).attr('property-id');
          var prop_name = $(this).attr('property-name');
          var prop_descrip = $(this).attr('property-description');
          var prop_address = $(this).attr('property-address');
          var prop_city = $(this).attr('property-city');
          var prop_state = $(this).attr('property-state');
          var prop_zip = $(this).attr('property-zip');
          var prop_br = $(this).attr('property-bedrooms');
          var prop_ba = $(this).attr('property-bathrooms');
          var prop_kids = $(this).attr('property-kids');
          var prop_pets = $(this).attr('property-pets');
          var prop_price = $(this).attr('property-price');

          $('#edit-property').find('input[name="propName"]').val(prop_name);
          $('#edit-property').find('[name="propDescription"]').val(prop_descrip);
          $('#edit-property').find('input[name="address1"]').val(prop_address);
          $('#edit-property').find('input[name="city"]').val(prop_city);
          $('#edit-property').find('select[name="state"]').val(prop_state);
          $('#edit-property').find('input[name="zipCode"]').val(prop_zip);
          $('#edit-property').find('select[name="bedrooms"]').val(prop_br);
          $('#edit-property').find('select[name="bathrooms"]').val(prop_ba);
          $('#edit-property').find('input[name="price"]').val(prop_price);
          $('#edit-property').find('input[name="propertyID"]').val(prop_id);

          if(prop_kids == 1) {
            $('#edit-property').find('input[name="kidFriendly"]').prop( "checked", true );
          } else {
            $('#edit-property').find('input[name="kidFriendly"]').prop( "checked", false );
          }

          if(prop_pets == 1) {
            $('#edit-property').find('input[name="petFriendly"]').prop( "checked", true );
          } else {
            $('#edit-property').find('input[name="petFriendly"]').prop( "checked", false );
          }

          $('#black-overlay').fadeTo( 200, 1.0 );
        });

        $('.avatar-row').click(function(e){
          e.preventDefault();
          $('#black-overlay').removeClass('hide');
          $('#edit-avatar').removeClass('hide');
          var user_id = $(this).attr('avatar-user-id');
          var user_array = $(this).attr('all-users');
          var avatar_id = $(this).attr('avatar-id');

          $('#edit-avatar').find('select[name="userID"]').val(user_id);
          $('#edit-avatar').find('input[name="avatarID"]').val(avatar_id);

          $('#black-overlay').fadeTo( 200, 1.0 );
        });

        $('.image-row').click(function(e){
          e.preventDefault();
          $('#black-overlay').removeClass('hide');
          $('#edit-image').removeClass('hide');
          var user_id = $(this).attr('image-user-id');
          var user_array = $(this).attr('all-users');
          var image_id = $(this).attr('image-id');

          $('#edit-image').find('select[name="userID"]').val(user_id);
          $('#edit-image').find('input[name="imageID"]').val(image_id);

          $('#black-overlay').fadeTo( 200, 1.0 );
        });

      });
    </script>
<?php } else {
    header("Location: index.php");
} ?>
