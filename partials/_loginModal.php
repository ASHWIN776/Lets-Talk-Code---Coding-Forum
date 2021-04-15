
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center m-auto" id="exampleModalLabel">Login to - Lets Talk Code</h5>
        <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/myForum/partials/_handlelogin.php" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <div class="form-text">We'll never share your password with anyone else.</div>
          </div>
          <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>