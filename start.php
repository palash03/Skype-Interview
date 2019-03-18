<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Interview Scheduler</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <h2>Welcome</h2>
        <p class="lead">Please select the following options and schedule an interview for the candidate.</p>
      </div>

      <div class="row" style = "margin-left:13%">
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Scheduling Interviews</h4>
          <br>



            <div class="row" style = "margin-left:0%">
              <div class="col-md-5 mb-4">
                <label for="country">Position</label>
                <select class="custom-select d-block w-100" id = "position" required>
                  <option value="">Choose...</option>
                  <option>Analyst</option>
                  <option>Software Engineer</option>
                </select>
              </div>

              <div class="col-md-6 mb-4">
                <label for="state">Candidate Emails</label>
                <select class="custom-select d-block w-100" id = "email" required>
                  <option value="">Choose...</option>
                  <option>test.case1230@gmail.com</option>
                  <option>testcase2@gmail.com</option>
                  <option>needemailid@gmail.com</option>
                  <option>getalife@gmail.com</option>
                </select>
              </div>

              <div class="col-md-5 mb-4">
                  <label for="example-date-input" >Date</label>
                  <input class="form-control" type="date" id = "date1">
              </div>

              <div class="col-md-5 mb-4">
                  <label for="example-time-input" >Time</label>
                  <input class="form-control" type="time" id = "time">
              </div>

              <div class="col-md-5 mb-4">
                <label for="state">Provider</label>
                <select class="custom-select d-block w-100" id = "provider" required>
                  <option value="">Choose...</option>
                  <option>Skype</option>
                  <option>Zoom</option>
                </select>
              </div>

              <div class="col-md-3 mb-4">
                <label for="duration">Duration</label>
                <div class="input-group-prepend">
                </div>
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id = "duration">
              </div>

            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" style = "width:95%" id = "schedule" onclick = "generateResponse()">Schedule</button>
          </form>
        </div>
      </div>
      </div>
      <p id = "res"></p>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"></script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/vendor/holder.min.js"></script>

    <script src = "http://kjur.github.io/jsrsasign/jsrsasign-latest-all-min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type = "text/javascript">
      var x,token,xhr;
      function generateJWTToken()
      {
          var md7 = new KJUR.crypto.MessageDigest({"alg": "sha256", "prov": "cryptojs"});
          hashRequestBody = md7.digestString('{ "participants" : [ { "email": "' + document.getElementById('email').value + '", "role": "candidate" }, { "email": "test.case1230@gmail.com", "role": "interviewer" } ], "scheduling" : { "start": "' + document.getElementById('date1').value + ' ' + document.getElementById('time').value + '", "duration": ' + document.getElementById('duration').value + ', "dateproposing": "interviewer" } }'); //body message for scheduling an interview
          //console.log(hashRequestBody);
          pHeader = {};
          pHeader.alg = "HS256";
          pHeader.cty = "JWT";
          pPayload = {};
          pPayload.jti = "123456789";
          pPayload.iss = "011fd508-1418-a0b9-4c91-04ba8c343b9d";  //Interview Scheduler API key ---> https://interviews.skype.com/en/dashboard?flow=start#
          pPayload.sub = hashRequestBody; // SHA256 hash request body
          pPayload.iat = Math.floor(Date.now()/1000);
          pPayload.exp = Math.floor(Date.now()/1000) + 20;

          sJWS = KJUR.jws.JWS.sign(null, pHeader, pPayload, "1a257b34-7032-5e8c-ecb0-f971596b2b9d");    //Interview Scheduler secret key ---> https://interviews.skype.com/en/dashboard?flow=start#
          //document.getElementById('paste').innerHTML = "<p>" + sJWS + "</p>";
          return sJWS;
      }

      function generateResponse()
      {
            token = generateJWTToken();
            var body = '{ "participants" : [ { "email": "' + document.getElementById('email').value + '", "role": "candidate" }, { "email": "test.case1230@gmail.com", "role": "interviewer" } ], "scheduling" : { "start": "' + document.getElementById('date1').value + ' ' + document.getElementById('time').value + '", "duration": ' + document.getElementById('duration').value + ', "dateproposing": "interviewer" } }';
            $.ajax(
            {
                url: 'https://interviews.skype.com/api/interviews',
                type: 'post',
                data: body,
                headers: {
                    "Authorization": 'Bearer ' + token,   //If your header name has spaces or any other char not appropriate
                    "Content-Type": 'application/json'  //for object property name, use quoted notation shown in second
                },
                dataType: 'json',
                success: function (data)
                {
                    //document.getElementById('schedule').innerHTML = '<a href = "' + data.urls[0].url; + '">Start Interview</a>';
                    window.localStorage.setItem("myURL",data.urls[1].url);
                    window.localStorage.setItem("myParticipant",data.participants[0].email);
                    window.location = 'landingPage.php';
                }
            });
      }
    </script>
  </body>
</html>
