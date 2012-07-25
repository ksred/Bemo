<?php $this->load->view("_template/header.php"); ?>

<form class="well"  action="admin/new_user" method="post">
    <label>Name: </label>
    <input type="text" class="span3" placeholder="Your name" name="name" >
    <label>Password: </label>
    <input type="password" class="span3" placeholder="Password" name="password" >
    <label>Email Address: </label>
    <input type="text" class="span3" placeholder="you@domain.com" name="email" >
    <label>Description: </label>
    <input type="text" class="span3" placeholder="Your best one-liner"  name="description">
    <br />
    <button type="submit" class="btn" name="submit">Submit</button>
</form>

<?php $this->load->view("_template/footer.php"); ?>