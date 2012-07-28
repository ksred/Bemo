<?php $this->load->view("_template/header-admin.php"); ?>

<div class="alert alert-info">Hey <strong><?php if (isset($user)) echo $user ?></strong> bro</div>

<div class="well span2">
    <ul class="nav nav-pills nav-stacked">
        <li>
            <a href="/admin/campaign_add">Add campaign</a>
        </li>
        <li>
            <a href="/admin/campaign_edit">Edit campaign</a>
        </li>
        <li>
            <a href="/admin/campaign_add_artist">Add artist to campaign</a>
        </li>
        <li>
            <a href="/admin/campaign_list">View all campaigns</a>
        </li>
    </ul>
</div>

<div class="span9">
    <div class="alert">Campaigns</div>
</div>

<?php $this->load->view("_template/footer.php"); ?>