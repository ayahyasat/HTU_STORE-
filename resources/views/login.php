

    <form class="" method="POST" action="/authenticate">

        <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
            <div class='alert alert-danger mb-3' role='alert'>
                <?= $_SESSION['error'] ?>
            </div>
        <?php
            $_SESSION['error'] = null;
        endif; ?>

       <!--  <div class="mb-3">
            <label for="admin-username" class="form-label">Username</label>
            <input type="text" class="form-control" id="admin-username" name="username">
        </div>
        <div class="mb-3">
            <label for="admin-password" class="form-label">Password</label>
            <input type="password" class="form-control" id="admin-password" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember-me" name="remember_me">
            <label class="form-check-label" for="remember-me">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
 -->


<section class='login' id='login'>
  <div class='head'>
  <h2 class='company'>Login Page</h2>
  </div>
  <p class='msg'>Welcome back</p>
  <div class='form'>
    <form>
  <input type="text" placeholder='Username' class='text' id="admin-username" name="username"><br>
  <input type="password" placeholder='password' class='password' id="admin-password" name="password"><br>
  <div class='msg'>
  <input type="checkbox" placeholder='checkbox' class="checkbox" id="remember-me" name="remember_me">
  <label class="form-check-label" for="remember-me">Remember Me</label>
  <button type="submit" class='btn-login'>Login</button>
    </form>
  </div></div>

</section>







    </form>
</div>