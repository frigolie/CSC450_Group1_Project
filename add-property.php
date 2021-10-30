<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- add-property.php - The form through which a property owner can add a new property listing
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/20/21
      Revisions:   10/29/21 - made edits to form
      -->

      <!-- Page title -->
    <title>Add A Property</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

  <section class="container-fluid initialPageContent yellowMountains pb-5">
      <div class="row pb-5 justify-content-center">

        <div class="col-10 col-md-8 col-lg-6 px-5 py-5 white-bg box-shadow rounded-custom">
          <h2 class="mb-1 text-center">Add a new <span class="dk-orange-text">property listing</span> below. </h2><br>

      <form method="POST" action="index.php">     
            <div class="mb-3">
              <label for="propertyName" class="form-label">Property Name</label>
              <input type="text" class="form-control" id="propInput" aria-describedby="propHelp" placeholder="Enter here" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Give your property a description!</label>
              <textarea rows="4" cols="50" class="form-control" id="textAreaInput" placeholder="Amenities, fun things to do in the area..."></textarea>
           </div>

           <div class="mb-3">
             <label for="bed" class="form-label">How many bedrooms?</label>
             <select id="bedrooms" name="bedrooms" required>
               <option>Studio</option>
               <option>1 Bed</option>
               <option>2 Bed</option>
               <option>3 Bed</option>
               <option>4+ Bed</option>
             </select>
           </div>

           <div class="mb-3">
             <label for="bath" class="form-label">How many bathrooms?</label>

             <!-- offer option for including half bath? -->
             <select id="bathroom" name="bathroom" required>
               <option>1</option>
               <option>2</option>
               <option>3 </option>
               <option>4+</option>
             </select>
           </div>

           <div class="mb-3">
            <label for="bath" class="form-label">Does your property allow...</label><br>
            <input type="checkbox" id="kid" name="kid">
            <label for="kidFriendly">Kids</label><br>
            <input type="checkbox" id="pet" name="pet">
            <label for="petFriendly">Pets</label>
           </div>

           <div class="mb-3">
            <label for="address1" class="form-label">Where is your property located?</label>
            <input type="text" class="form-control" id="address1" placeholder="Enter property address" required>
           </div>

           <div class="mb-3">
            <label for="city" class="form-label">City</label>
             <input type="text" class="form-control" id="city"style="width:250px;" placeholder="Enter city here" required>
           </div>

           <div class="mb-3">
             <label for="state" class="form-label">State</label><br>
             <!-- there just has to be a better way to do this, not sure though -->
              <select name="state" id="state">
                <option value="" selected="selected">Select a State</option>
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
            </div>

           <div class="mb-3">
             <label for="zipCode" class="form-label">Zip Code</label>
             <input type="text" class="form-control" id="zipCode" placeholder="Enter zip code"style="width:250px;" pattern="[0-9]{5}" required>
           </div>
        
           <div class="mb-3">
           <!-- not sure how to make this feature fully functional. ideally, user can select
                how many files to upload, can select more after already selecting 1, and
                all file names display on top of each other -->
            <label for="pics" class="form-label">Add a few pictures of your property</label>
              <input type="file" id="propPicture" name="propPicture" accept="image/png, image/jpeg" multiple>
           </div>

           <!-- allow user to select multiple dates/date range. Is this possible? -->
           <div class="mb-3">
            <label for="availability" class="form-label">When can your property be reserved? (Optional)</label><br>
              <input type="date">
           </div>

          <!-- Looking to have this slider a bit more functional; for example, max range slider should not be able to below min range slider -->
        <div class="mb-3">
           <label for="cost" class="form-label">How much will you charge per night? (Optional)</label><br>
           <input type="range"  min="1" max="1000" oninput="this.nextElementSibling.value = this.value">
              <output>0</output>
           <input type="range"  min="1" max="1000" oninput="this.nextElementSibling.value = this.value">
            <output>0</output>
        </div>
        
          <div class="pt-3 text-center">
            <button type="submit" class="globalButton blueButton" style="height:50px;width:200px;font-size:1.4em;">Add Property</button>
          </div>
        </div>
      </div>
    </form>
  </section>
  <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
