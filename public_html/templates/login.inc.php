    <form action="index.php?page=login.try" method="post" id="login-form" class="large-4 small-10 medium-6">
      <div class="background-travel">
          <div class="row">
            <div class="large-12 medium-12 columns">
              <label for="email" class="white middle">Email</label>

              <input id="email" name="email" class="input-foc" type="text" placeholder="Email" />
            </div>
          </div>

          <div class="row">
            <div class="large-12 medium-12 columns">
              <label for="password" class="white middle">Password</label>
              <input id="password" name="password" class="input-foc" type="password" placeholder="Password" />
              <a class="pass-forgot" href="#">Forgotten your password?<b> Click here.</b></a>
            </div>
          </div>
          
          <div class="row">
              <fieldset class="large-12 medium-12 columns">
              <button class="button" type="submit" name="login" value="Log In">Submit
              </button>

                <span class="error-color">
                  <?php if(isset($this->data['login-error'])): ?>
                    <p><?= $this->data['login-error'] ?></p>
                  <?php endif; ?>
                </span>
                
              </fieldset>
          </div>
      </div>
    </form>


    