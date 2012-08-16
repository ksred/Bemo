<?php $this->load->view("_template/header-admin.php"); ?>

<div class="alert alert-info">Hey <strong><?php if (isset($user)) echo $user ?></strong> bro</div>

<?php $this->load->view('submenus/campaigns') ?>

<div class="span8 well">
    <div class="alert">Select campaign</div>
        <?php if (isset($all_campaigns)) : ?>
        <?php foreach ($all_campaigns->result() as $campaign) : ?>
            <span class="span7" style="margin: 5px 0px">
                <span class="btn btn-primary disabled"><?= $campaign->title ?></span>
                <a href="/campaign/list_artists_per/<?= $campaign->campaign_id?>/3" class="btn btn-primary pull-right">Round Three</a>
                <a href="/campaign/list_artists_per/<?= $campaign->campaign_id?>/2" class="btn btn-primary pull-right">Round Two</a>
                <a href="/campaign/list_artists_per/<?= $campaign->campaign_id?>/1" class="btn btn-primary pull-right">Round One</a>
            </span>
        <?php endforeach; ?>
        <?php endif; ?>
    
</div>
<?php $this->load->view("_template/footer.php"); ?>