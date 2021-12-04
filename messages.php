<?php
session_start();
if (isset($_SESSION['username'])) {
?>

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
      Revisions:   12/02/21 - Adding message database integration with the forms
      -->

      <!-- Page title -->
    <title>Message Center</title>
  </head>
  <body>
  <?php include(getcwd( ) . "/header.php"); ?>

    <section class="container-fluid initialPageContent fireTower pb-5">
      <div class="row pb-5 justify-content-center">

        <div class="col-12 px-5 py-5 pt-3 mx-auto" id="messages">
          <h1 class="mb-4 text-left text-shadow">Messages</h1>

          <div class="inbox-visible">
            <a class="globalButton blueButton mb-2 me-2 d-md-inline-block new-message-btn">
              Create New
            </a>

            <a class="globalButton orangeButton mb-2 me-2 d-md-inline-block" id="select-all">
              Select All
            </a>

            <a class="globalButton redButton mb-2 me-2 d-md-inline-block">
              Delete
            </a>
          </div>

          <div class="mt-5 p-4 white-bg box-shadow rounded-custom message-container">

            <div class="w-100 inbox-visible" id="inbox-container">
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
                  <?php include 'messagingLogic';
                  listMessages(); ?><!--- get all messages from database -->
                </tbody>
              </table>
            </div>

            <!--- NEW MESSAGE FORM -->
            <div class="w-100 new-msg-visible pt-2 px-3" id="new-message-container">
                <h3 class="text-center mb-4">Compose New Message</h3>
                <form id="new-message" class="row" action="sendMessage.php" method="POST">
                  <div class="col-3 col-md-2 mb-4 d-flex align-items-center">
                    <label for="recipient"><h4 class="mb-0">To:</h4></label>
                  </div>
                  <div class="col-9 col-md-10 mb-4">
                    <select class="form-select" id="recipient" name="recipient" required>
                      <option selected>--Select A User--</option>
                      <?php 
                      include 'messagingLogic.php';
                      getUsers(); 
                      ?><!--- get all users from database -->
                    </select>
                  </div>

                  <div class="col-3 col-md-2 mb-4 d-flex align-items-center">
                    <label for="subject"><h4 class="mb-0">Subject:</h4></label>
                  </div>
                  <div class="col-9 col-md-10 mb-4">
                    <input class="form-control" type="text" id="subject" name="subject" required>
                  </div>

                  <div class="col-12">
                    <label for="message-text"><h4>Enter Message Here:</h4></label>
                  </div>
                  <div class="col-12 mb-4">
                    <textarea class="form-control p-3" id="message-text" name="content" rows="5" required></textarea>
                  </div>

                  <div class="col-12 mb-3">
                    <button class="globalButton blueButton mb-2 me-2 d-md-inline-block inbox-btn" type="submit">
                      Send
                    </button>
                    <a class="globalButton redButton mb-2 me-2 d-md-inline-block inbox-btn">
                      Cancel
                    </a>
                  </div>
                </form>
            </div>

            <div class="w-100 open-msg-visible pt-2 px-3" id="open-message-container">
              <div class="row">
                <div class="col-3 col-md-2 mb-4 d-flex align-items-center">
                  <h4 class="mb-0">From:</h4>
                </div>
                <div class="col-9 col-md-10 mb-4">
                  <p class="form-control mb-0">sender@email.com</p>
                </div>

                <div class="col-3 col-md-2 mb-4 d-flex align-items-center">
                  <h4 class="mb-0">Subject:</h4>
                </div>
                <div class="col-9 col-md-10 mb-4">
                  <p class="form-control mb-0">Sample Subject Line</p>
                </div>

                <div class="col-12 mb-4">
                  <textarea class="w-100 p-3" rows="5" disabled>Var alma caila terpellië nó, engë nurtalom timpinen ar tol. Ollo rangwë caimasan hos nó, vá nurmë lissë hérincë fum. Hen to laurëa racinë, nú cuilë celayur valinor war, má óla manwa laurëa tengwo. Nu luhta lucië nainanyéna axa. Cíla yávë aráto sú ran. Hwarma lindelëa pel sí, hérë hravan lis oi. Írë né nénar sindar. Rin nessa atalantëa up, yulmë fairë axa et.
                  </textarea>
                </div>

                <div class="col-12 mb-3">
                  <a class="globalButton blueButton mb-2 me-2 d-md-inline-block new-message-btn">
                    Reply
                  </a>
                  <a class="globalButton redButton mb-2 me-2 d-md-inline-block inbox-btn">
                    Delete
                  </a>
                  <a class="globalButton orangeButton mb-2 me-2 d-md-inline-block inbox-btn">
                    Return to Inbox
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
        jQuery(function($) {
          $( document ).ready(function() {
            $('.new-msg-visible').hide();
            $('.open-msg-visible').hide();
          });

          $('.new-message-btn').click(function(){
            $('.inbox-visible').hide();
            $('.open-msg-visible').hide();
            $('.new-msg-visible').show();
          });

          $('.open-message-btn').click(function(){
            $('.inbox-visible').hide();
            $('.new-msg-visible').hide();
            $('.open-msg-visible').show();

            //keep value from hyperlink
            
          });

          $('.inbox-btn').click(function(){
            $('.new-msg-visible').hide();
            $('.open-msg-visible').hide();
            $('.inbox-visible').show();
          });

          $('#select-all').click(function(){
            $(this).toggleClass('selected');

            if($(this).hasClass('selected')) {
              $('input[type="checkbox"]').prop('checked', true);
              $(this).text('Deselect All');
            } else {
              $('input[type="checkbox"]').prop('checked', false);
              $(this).text('Select All');
            }
          });
        });
    </script>

    <?php include(getcwd( ) . "/footer.php"); ?>
  </body>
</html>
<?php } else {
    header("Location: /login.php");
} ?>