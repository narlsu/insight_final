<h1>Register new account</h1>


<form id="register-form" class="large-4 small-10 medium-6" action="./?page=register.store" method="post">
	<div class="background-travel">
		<div class="row">
			<div class="large-12 medium-12 columns">
				<label class="white middle" for="email">E-Mail address: </label>
				<?php $email = isset($_POST['email']) ? $_POST['email']: '' ?>
				<input type="email" value="<?= $email ?>" name="email" id="email">
				<span class="error-color"><?= isset ($this->data['email'])? $this->data ['email'] : "" ?></span>
			</div>
		</div>

		<div class="row">
			<div class="large-12 medium-12 columns">
				<label class="white middle" for="password">Password (8 character minimum): </label>
				<input type="password" name="password" id="password">
				<span class="error-color"><?= isset ($this->data['password'])? $this->data ['password'] : "" ?></span>
			</div>
		</div>

		<div class="row">
			<div class="large-12 medium-12 columns">
				<label class="white middle" for="password2">Confirm Password: </label>
				<input type="password" name="password2" id="password2">
			</div>
		</div>

		
		<div class="row">
	        <fieldset class="large-12 medium-12 columns">
	              <button class="button" type="submit" name="register" value="Register!">Register!</button>
	        </fieldset>
	    </div>
	</div>
</form>