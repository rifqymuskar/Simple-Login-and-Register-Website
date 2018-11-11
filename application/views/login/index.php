<div class="login">
	<div class="login-1 box">
		<form class="login-3" data-table="users" data-action="check" autocomplete="off">
			<h4 class="login-2 center-align">Login</h4>
			<span class="helper-text"><?=isset($status) ? $status : '' ?></span>
			<div class="input-field">

	          <input required autofocus placeholder="Please input your username" id="first_name" name="username" type="text" class="validate">
	          <label for="first_name">First Name</label>
	        </div>
	        <div class="input-field">
	          <input required placeholder="Please input you password" id="password" type="password" name="password" class="validate">
	          <label for="password">Password</label>
	        </div>
	        <button type="Submit" class="btn login-4">Login</button>
	        <p class="login-5 center-align">or login with</p>

	        <div class="login-6">
	        	<div class="login-7 facebook">
	        		<i class="fab fa-facebook-f"></i>
	        	</div>
	        	<div class="login-7 twitter">
	        		<i class="fab fa-twitter"></i>
	        	</div>
	        	<div class="login-7 google">
	        		<i class="fab fa-google"></i>
	        	</div>
	        </div>
	        <div class="center-align login-8">
	        	<p>Have not account yet ?</p>
	        	<p class="login-9 signup modal-trigger" data-target="signup">SIGN UP NOW</p>
	    	</div>
		</form>
	</div>
</div>

  <!-- Modal Structure -->
  <div id="signup" class="modal signup">
    <div class="modal-content center-align">
      <h4>Register</h4>

      <form class="login-3 register" data-table="users" data-action="insert" autocomplete="off">
			<div class="input-field">
	          <input autofocus required placeholder="Input your full name" name="fullname" id="fullname" type="text" onchange="keyup(this)" onmouseleave="keyup(this)">
	          <label for="fullname">Full Name</label>
	          <span class="helper-text fullname"></span>
	        </div>
	        <div class="input-field">
	          <input required placeholder="Use active email, for confirmation your account" name="email" id="email" type="email" onchange="keyup(this)" onmouseleave="keyup(this)">
	          <label for="email">E-mail</label>
	          <span class="helper-text email"></span>
	        </div>
	        <div class="input-field">
	          <input required placeholder="Input your username for login" id="user" name="username" type="text" onchange="keyup(this)" onmouseleave="keyup(this)">
	          <label for="user">User Name</label>
	          <span class="helper-text user"></span>
	        </div>
	        <div class="input-field">
	          <input required placeholder="Input your password for login" id="pass" name="password" type="password" onchange="keyup(this)" onmouseleave="keyup(this)">
	          <label for="pass">Password</label>
	          <span class="helper-text pass"></span>
	        </div>
	        <div class="input-field">
	          <input required placeholder="Input your confirm password" id="cpassword" name="passconf" type="password" onchange="keyup(this)" onmouseleave="keyup(this)">
	          <label for="cpassword">Confirm Password</label>
	          <span class="helper-text cpassword"></span>
	        </div>
	        <button type="Submit" class="btn login-4">Login</button>
      </form>
    </div>
  </div>