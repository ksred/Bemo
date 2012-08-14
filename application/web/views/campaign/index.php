<?php $this->load->view("_template/header.php"); ?>

<?php if (isset($campaigns)) : ?>
    <?php $count = 0; ?>
    <?php foreach ($campaigns as $campaign) : ?>
        <?php if($count==0) : ?>
            <div class="span10">
                <div class="campaign-lead-img">
                    <img src="<?= $campaign->picture ?>" />
                </div>
                <?php if(isset($campaign_artist)) : ?>
                    <?php foreach($campaign_artist as $a) : ?>
                        <div class="campaign-artist span3">
                            <div class="campaign-artist-pic">
                                <img src="<?= $a->picture ?>" />
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php else : ?>
            <div class="span5">
                <div class="campaign-other-img">
                    <img src="<?= $campaign->picture ?>" />
                </div>
            </div>
        <?php endif; ?>
        <?php $count++ ?>
    <?php endforeach; ?>
<?php endif; ?>

<?php $this->load->view("_template/footer.php"); ?>