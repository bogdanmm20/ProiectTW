<?php echo form_open(site_url('register')); ?>

<?php echo validation_errors(); ?>

<label>Username</label><br>
<input type="text" name="username" value="<?php echo set_value('username'); ?>"><br><br>

<label>Email</label><br>
<input type="text" name="email" value="<?php echo set_value('email'); ?>"><br><br>

<label>Password</label><br>
<input type="password" name="password" value="<?php echo set_value('password'); ?>"><br><br>

<input type="submit">

<?php echo form_close(); ?>