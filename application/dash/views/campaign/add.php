<?php $this->load->view("_template/header-admin.php"); ?>

<div class="alert alert-info">Hey <strong><?php if (isset($user)) echo $user ?></strong> bro</div>

<?php $this->load->view("submenus/campaigns");?>

<div class="span9">
    <div class="alert">Edit an artist</div>
    
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
            <form class="well" method="post" action="/campaign/campaign_add/" enctype="multipart/form-data">
                <label>Campaign Title</label>
                <input type="text" class="span3" placeholder="Campaign Name" name="campaign-title" required>
                <label>Campaign Description</label>
                <input type="text" class="span3" placeholder="Description" name="campaign-desc" required>
                <label>Campaign Picture</label>
                <input type="file" name="campaign-picture" size="30">
                <input type="text" name="round" value="1" readonly>
                <input type="text" name="active" value="1" readonly>
                <br /><br />
                <button type="submit" class="btn">Submit</button>
            </form>
    </div>
</div>

<?php $this->load->view("_template/footer.php"); ?>