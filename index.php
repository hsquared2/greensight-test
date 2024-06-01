<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
  <div class="container">
    <h1 class="mt-4">Registration form</h1>
    <hr>
    <div id="response"></div>
    <form class="col-md-5 mt-4" id="registrationForm">
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="firstName" class="form-label">First Name</label>
          <input type="text" class="form-control" id="firstName" name="firstName">
        </div>
        <div class="col-md-6">
          <label for="lastName" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lastName" name="lastName">
        </div>
      </div>
      <div class="row mb-3">
        <div>
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" id="email" name="email">
          <div class="email-err text-danger"></div>
        </div>
      </div>
      <div class="row mb-3">
        <div>
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
      </div>
      <div class="row mb-3">
        <div>
          <label for="passwordRpt" class="form-label">Repeat password</label>
          <input type="password" class="form-control" name="passwordRpt" id="passwordRpt">
          <div class="password-err text-danger"></div>
        </div>
      </div>
      <div class="fields-empty-err text-danger"></div>
      <button type="submit" class="btn btn-success mt-3 col-md-3 offset-md-9">Submit</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>
</html>