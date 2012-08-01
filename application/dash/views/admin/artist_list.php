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
    <div class="alert">List all artists</div>
    <?php if (isset($all_artists)) : ?>
    <?php foreach ($all_artists->result() as $artist) : ?>
    <div class="span8">
        <div class="span3"><img src="<?= $artist->picture ?>" /></div>
        <div class="span1"><?= $artist->name ?></div>
        <div class="span2"><?= $artist->desc ?></div>
        <div class="btn"><a href="/admin/artist_edit/<?= $artist->id ?>">Edit</a></div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php $this->load->view("_template/footer.php"); ?>