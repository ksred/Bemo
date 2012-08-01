<?php $this->load->view("_template/header-admin.php"); ?>

<div class="alert alert-info">Hey <strong><?php if (isset($user)) echo $user ?></strong> bro</div>

<?php $this->load->view("submenus/campaigns");?>

<div class="span9">
    <?php if(isset($campaign)) : ?>
    <div class="span8"><h3><?= $campaign[0]->title ?></h3></div>
    <?php endif; ?>
<?php if (isset($all_artists)) : ?>
    <?php foreach ($all_artists->result() as $artist) : ?>
        <div class="span8">
            <div class="span3"><img src="<?= $artist->picture ?>" /></div>
            <div class="span1"><?= $artist->name ?></div>
            <div class="span2"><?= $artist->desc ?></div>
            <div class="btn"><a href="/artist/edit/<?= $artist->id ?>">Edit</a></div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
    
</div>

<?php $this->load->view("_template/footer.php"); ?>