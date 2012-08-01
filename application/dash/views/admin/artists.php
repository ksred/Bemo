<?php $this->load->view("_template/header-admin.php"); ?>

<div class="alert alert-info">Hey <strong><?php if (isset($user)) echo $user ?></strong> bro</div>

<div class="well span2">
    <ul class="nav nav-pills nav-stacked">
        <li>
            <a href="/admin/artist_add">Add artist</a>
        </li>
        <li>
            <a href="/admin/artist_edit">Edit artists</a>
        </li>
        <li>
            <a href="/admin/artist_list">View all artists</a>
        </li>
    </ul>
</div>

<div class="span9">
    <div class="alert">Pick your poison</div>
</div>

<?php $this->load->view("_template/footer.php"); ?>