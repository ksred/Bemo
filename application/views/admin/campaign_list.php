<?php $this->load->view("_template/header-admin.php"); ?>

<div class="alert alert-info">Hey <strong><?php if (isset($user)) echo $user ?></strong> bro</div>

<?php $this->load->view("submenus/campaigns");?>

<div class="span9">
    <div class="alert">List all campaigns</div>
    <?php if (isset($all_campaigns)) : ?>
    <?php foreach ($all_campaigns->result() as $campaign) : ?>
    <div class="span8">
        <div class="span3"><img src="<?= $campaign->picture ?>" /></div>
        <div class="span1"><?= $campaign->title ?></div>
        <div class="span2"><?= $campaign->desc ?></div>
        <div class="btn"><a href="/admin/campaign_edit/<?= $campaign->id ?>">Edit</a></div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php $this->load->view("_template/footer.php"); ?>