<?php $this->load->view("_template/header.php"); ?>

<?php if (isset($error)) echo "<span class='alert'>".$error."</span><br />" ?>
Log in: 
<form class="well"  action="/user/login" method="post">
    <label>Name: </label>
    <input type="text" class="span3" placeholder="Your name" name="name" >
    <label>Password: </label>
    <input type="password" class="span3" placeholder="Password" name="password" >
    <br />
    <button type="submit" class="btn" name="submit">Submit</button>
</form>

<?php $this->load->view("_template/footer.php"); ?>