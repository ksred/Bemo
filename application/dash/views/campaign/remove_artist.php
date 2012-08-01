<?php $this->load->view("_template/header-admin.php"); ?>

<div class="alert alert-info">Hey <strong><?php if (isset($user)) echo $user ?></strong> bro</div>

<?php $this->load->view("submenus/campaigns");?>

<div class="span9">
    <?php if ($success != "null") : ?>
        
        <?php if ($success == "success") : ?>
            <div class="alert alert-success">
            Success!
            </div>
            <?php elseif ($success == "problem") : ?>
            <div class="alert alert-error">
            Not successfull
            </div>
        <?php endif; ?>
    <?php endif; ?>
    
    <div class="alert">Remove artist from campaigns</div>
    <form class="well" method="post" action="/campaign/campaign_remove_artist/" enctype="multipart/form-data">
        <?php if (isset($all_campaigns)) : ?>
        <label for="campaign">Choose campaign</label>
        <select name="campaign">
        <?php foreach ($all_campaigns->result() as $campaign) : ?>
            <option value="<?= $campaign->id?>"><?= $campaign->title ?></option>
        <?php endforeach; ?>
        </select>
        <?php endif; ?>
        <?php if (isset($all_artists)) : ?>
        <label for="artist">Choose artist</label>
        <select name="artist">
        <?php foreach ($all_artists->result() as $artist) : ?>
            <option value="<?= $artist->id?>"><?= $artist->name ?></option>
        <?php endforeach; ?>
        </select>
        <?php endif; ?>
        <br />
        <button type="submit" class="btn">Submit</button>
    </form>
</div>

<?php $this->load->view("_template/footer.php"); ?>