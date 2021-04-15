<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title m-auto" id="exampleModalLabel">Create an Account</h5>
        <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/myForum/partials/_handlesignup.php" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
        <input type="texts" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
          <label for="confPassword" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="confPassword" name="confPassword">
          <div class="form-text">Please input the same password here</div>
        </div>
        <button type="submit" class="btn btn-primary" name="signup">Signup</button>
      </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>