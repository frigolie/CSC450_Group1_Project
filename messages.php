<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

      <!-- messages.php - The page to contain all messaging functionality
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/20/21
      Revisions:
      -->

      <!-- Page title -->
    <title>Message Center</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent fireTower pb-5">
      <div class="row pb-5 justify-content-center">

        <div class="col-12 px-5 py-5 pt-3">
          <h1 class="mb-4 text-left text-shadow">Messages</h1>

          <button class="globalButton blueButton mb-2 me-2 d-md-inline-block">
            Create New
          </button>

          <button class="globalButton orangeButton mb-2 me-2 d-md-inline-block">
            Select All
          </button>

          <button class="globalButton redButton mb-2 me-2 d-md-inline-block">
            Delete
          </button>

          <div class="mt-5 p-4 white-bg box-shadow rounded-custom">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">From</th>
                  <th scope="col">Date</th>
                  <th scope="col">Subject</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"><input type="checkbox" id="msg1" name="msg1" value=""></th>
                  <td>sender@test.com</td>
                  <td>03/04/21</td>
                  <td>Test Subject 01</td>
                </tr>
                <tr>
                  <th scope="row"><input type="checkbox" id="msg2" name="msg2" value=""></th>
                  <td>test@email.com</td>
                  <td>07/12/21</td>
                  <td>Testing Another Subject</td>
                </tr>
                <tr>
                  <th scope="row"><input type="checkbox" id="msg3" name="msg3" value=""></th>
                  <td>email@testing.com</td>
                  <td>09/28/21</td>
                  <td>Hello!</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
