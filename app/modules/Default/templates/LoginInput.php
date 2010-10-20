<div id="box">
  <h2><?php echo $t['_title']; ?></h2>
  <form id="login" action="<?php echo $ro->gen('login'); ?>" method="post">
    <fieldset>
      <div class="form-row">
        <div class="form-label">
          <label for="login">Username</label>
        </div>
        <div class="form-control">
          <input type="text" id="login" name="login" />
        </div>
      </div>
      <div class="form-row">
        <div class="form-label">
          <label for="password">Password</label>
        </div>
        <div class="form-control">
          <input type="password" id="password" name="password" />
        </div>
      </div>
      <div class="form-row-nolabel">
        <input type="checkbox" id="remember" name="remember" value="remember" />
        <label for="remember">Stay Signed in for a Week</label>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-row-nolabel">
        <input type="submit" name="submit" value="Log in" />
      </div>
    </fieldset>  
  </form>
</div>