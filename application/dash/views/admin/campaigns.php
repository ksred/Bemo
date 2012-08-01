<?php $this->load->view("_template/header-admin.php"); ?>

<div class="alert alert-info">Hey <strong><?php if (isset($user)) echo $user ?></strong> bro</div>

<?php $this->load->view('submenus/campaigns') ?>

<div class="span9">
    <div class="alert">Campaigns</div>
</div>

<?php $this->load->view("_template/footer.php"); ?>