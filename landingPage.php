<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Scheduled Interviews</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">

  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <h2>Scheduled Interviews</h2>
        <p class="lead"></p>
      </div>

      <table class="table" id = "myTable">
        <thead>
          <tr>
            <th scope="col">Job Requisition</th>
            <th scope="col">Candidate</th>
            <th scope="col">Interview Link</th>
            <th scope="col">Analysis Link</th>
          </tr>
        </thead>

        <tbody>

      </table>


      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">
          <div class="start-screen-recording recording-style-red">
            <div>
                <div class="rec-dot"></div>
                <span>Start</span>
            </div>
          </div>
          <script src="record.js" defer></script>
        </p>
        <p class="mb-2">&copy; 2018-2019 Oracle</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"></script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/vendor/holder.min.js"></script>

    <script>
          $(document).ready(function()
          {

              var url = window.localStorage.getItem("myURL");
              var participant = window.localStorage.getItem("myParticipant");
              //var participant = window.localStorage.getItem("myParticipant  ");
              //document.getElementById('myTable').innerHTML = "<tr><th scope="row">1</th><td>Software Engineer</td><td>Palash</td><td><a href = " +  getData.urls[0].url +  " class = "alert-link">Interview 1</a></td><td>URL1</td></tr>";
              var tBody = document.getElementById("myTable").getElementsByTagName("TBODY")[0];

              //Add Row.
              var row = tBody.insertRow(-1);

              //Add Name cell.
              var cell = row.insertCell(-1);
              cell.innerHTML = "Position";

              //Add Country cell.
              cell = row.insertCell(-1);
              cell.innerHTML = participant;

              cell = row.insertCell(-1);
              cell.innerHTML = "<a href = " + url + " >Interview 1</a>";

              cell = row.insertCell(-1);
              cell.innerHTML = "<a href = 'analyse.php' onclick = 'setTimeout(function(){ return false; }, 3000);'>Analyse</a>";

          });

    </script>
  </body>
</html>
