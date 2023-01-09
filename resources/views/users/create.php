
<div class="d-flex flex-column justify-content-center align-items-center gap-5">

<h1>Create User</h1>

<form action="/users/store" method="POST" class="w-50">
    <div class="mb-3">
        <label for="display-name" class="form-label">Display Name</label>
        <input type="text" class="form-control" id="display-name" name="display_name">
    </div>
    <div class="mb-3">
        <label for="user-email" class="form-label">Email</label>
        <input type="email" class="form-control" id="user-email" name="email">
    </div>
    <div class="mb-3">
        <label for="user-username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username-email" name="username">
    </div>
     <div class="mb-3">
        <label for="user-password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password-email" name="password">
    </div> 
    

    <div class="mb-3">
        <label for="user-role" class="form-label">Role</label>
        <select class="form-select" aria-label="Role" name="role">
            <option value="admin">Admin</option>
            <option value="seller">seller</option>
            <option value="procurement">procurement</option>
            <option value="accountant">accountant</option>
        </select>
    </div>

      <!-- <div class="mb-3 d-flex flex-column gap-3 ">
          <input type="file" class="form-control" name="newPicture">
          <input type='submit' name='action' value='Upload Image' class='btn btn-primary' />
          </div>  -->

          
    <button type="submit" class="btn btn-success mt-4" >Create</button>
    <a href="/users" class="btn btn-danger ms-3 mt-4">Cancel</a>

</form>