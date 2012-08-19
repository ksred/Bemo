<?php $this->load->view("_template/header.php"); ?>

<?php if (isset($campaign)) : ?>
            <div class="span12 home">
                <div class="campaign-lead-home span11" style="background-image:url('<?= $campaign->picture ?>')">
                    <div class="campaign-lead-text">
                        <div class="campaign-lead-title"><?= $campaign->title ?></div>
                        <div class="campaign-lead-desc"><?= $campaign->desc?></div>
                    </div>
                </div>
                <div class="campaign-lead-artists">
                    <?php if(isset($campaign_artist)) : ?>
                        <?php foreach($campaign_artist as $a) : ?>
                            <div class="campaign-artist pull-right" style="background-image: url('<?= $a->picture ?>');">
                                <div class="campaign-artist-text">
                                    <?= $a->name ?>
                                </div>
                                <div class="campaign-artist-share">
                                    
                                </div>
                                <div class="campaign-artist-vote">
                                    <div class="vote-artist" data-artistid="<?= $a->id ?>" data-campaignid="<?= $campaign->campaign_id ?>" data-round="<?= $campaign->round ?>">
                                        Vote!
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                 </div>
        </div>
<?php endif; ?>

<?php $this->load->view("_template/footer.php"); ?>