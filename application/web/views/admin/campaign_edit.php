<?php $this->load->view("_template/header-admin.php"); ?>

<div class="alert alert-info">Hey <strong><?php if (isset($user)) echo $user ?></strong> bro</div>

<?php $this->load->view("submenus/campaigns");?>

<div class="span9">
    <div class="alert">Edit a campaign</div>
    
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
    
    <div class="span8">
            <form class="well" method="post" action="/campaign/update/<?= $campaign->campaign_id ?>" enctype="multipart/form-data">
                <label>Campaign Name</label>
                <input type="text" class="span3" value="<?= (isset($campaign->title)) ? $campaign->title : "" ?>" name="campaign-title" required>
                <label>Campaign Description</label>
                <input type="text" class="span3" value="<?= (isset($campaign->desc)) ? $campaign->desc : "" ?>" name="campaign-desc" required>
                <label>Picture</label>
                <input type="file" name="campaign-picture" size="30">
                    <br /><br />
                <select name="campaign-round">
                    <option value="1" <?= ($campaign->round  == 1) ? "selected" : "" ?>>Round 1</option>
                    <option value="2" <?= ($campaign->round  == 2) ? "selected" : "" ?>>Round 2</option>
                    <option value="3" <?= ($campaign->round  == 3) ? "selected" : "" ?>>Round 3</option>
                </select>
                <input type="hidden" value="1" name="campaign-active">
                <input type="hidden" value="<?= $campaign->campaign_id ?>" >                
                    <br /><br />
                 <button type="submit" class="btn">Submit</button>
            </form>
    </div>
</div>

<?php $this->load->view("_template/footer.php"); ?>