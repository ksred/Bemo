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
            <form class="well" method="post" action="/artist/update/<?= $artist->id ?>" enctype="multipart/form-data">
                <label>Artist Name</label>
                <input type="text" class="span3" value="<?= (isset($artist->name)) ? $artist->name : "" ?>" name="artist-name" required>
                <label>Artist Description</label>
                <input type="text" class="span3" value="<?= (isset($artist->desc)) ? $artist->desc : "" ?>" name="artist-desc" required>
                <label>Picture</label>
                <input type="file" name="artist-picture" size="30">
                    <br /><br />
                <!-- Social -->
                <h3>Social stuff</h3>
                <label>Artist Lastfm</label>
                <input type="text" class="span3" value="<?= (isset($artist->social_lastfm)) ? $artist->social_lastfm : "" ?>" name="artist-social-lf">
                <label>Artist Youtube</label>
                <input type="text" class="span3" value="<?= (isset($artist->social_youtube)) ? $artist->social_youtube : "" ?>" name="artist-social-yt">
                <label>Artist Vimeo</label>
                <input type="text" class="span3" value="<?= (isset($artist->social_vimeo)) ? $artist->social_vimeo : "" ?>" name="artist-social-vi">
                <label>Artist Soundcloud</label>
                <input type="text" class="span3" value="<?= (isset($artist->social_soundcloud)) ? $artist->social_soundcloud : "" ?>" name="artist-social-sc">
                <label>Artist Bandcamp</label>
                <input type="text" class="span3" value="<?= (isset($artist->social_bandcamp)) ? $artist->social_bandcamp : "" ?>" name="artist-social-bc">
                <label>Artist Facebook</label>
                <input type="text" class="span3" value="<?= (isset($artist->social_facebook)) ? $artist->social_facebook : "" ?>" name="artist-social-fb">
                <label>Artist Twitter</label>
                <input type="text" class="span3" value="<?= (isset($artist->social_twitter)) ? $artist->social_twitter : "" ?>" name="artist-social-tw">
                    <br />
                 <button type="submit" class="btn">Submit</button>
            </form>
    </div>
</div>

<?php $this->load->view("_template/footer.php"); ?>