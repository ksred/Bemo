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
        <li>
            <a href="/admin/campaign_artists_per">View all artists on campaigns</a>
        </li>
    </ul>
</div>

<div class="span9">
    <div class="alert">Select campaign</div>
    <form class="well" method="post" action="/campaign/all_artists/" enctype="multipart/form-data">
        <?php if (isset($all_campaigns)) : ?>
        <?php foreach ($all_campaigns->result() as $campaign) : ?>
            <span class="span8"><a href="/admin/campaign_list_artists_per/<?= $campaign->id?>"><?= $campaign->title ?></a></span>
        <?php endforeach; ?>
        <?php endif; ?>
    </form>
    
</div>

<?php $this->load->view("_template/footer.php"); ?>