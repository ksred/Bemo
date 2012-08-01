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
    <div class="alert">Add an artist</div>
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
            <form class="well" method="post" action="/artist/add" enctype="multipart/form-data">
                <label>Artist Name</label>
                <input type="text" class="span3" placeholder="Artist Name" name="artist-name" required>
                <label>Artist Description</label>
                <input type="text" class="span3" placeholder="Artist Description" name="artist-desc" required>
                <label>Picture</label>
                <input type="file" name="artist-picture" size="30" required>
                    <br /><br />
                <!-- Social -->
                <h3>Social stuff</h3>
                <label>Artist Lastfm</label>
                <input type="text" class="span3" placeholder="Lastfm" name="artist-social-lf">
                <label>Artist Youtube</label>
                <input type="text" class="span3" placeholder="Youtube" name="artist-social-yt">
                <label>Artist Vimeo</label>
                <input type="text" class="span3" placeholder="Vimeo" name="artist-social-vi">
                <label>Artist Soundcloud</label>
                <input type="text" class="span3" placeholder="Soundcloud" name="artist-social-sc">
                <label>Artist Bandcamp</label>
                <input type="text" class="span3" placeholder="Bandcamp" name="artist-social-bc">
                <label>Artist Facebook</label>
                <input type="text" class="span3" placeholder="Facebook" name="artist-social-fb">
                <label>Artist Twitter</label>
                <input type="text" class="span3" placeholder="Twitter" name="artist-social-tw">
                    <br />
                 <button type="submit" class="btn">Submit</button>
            </form>
    </div>
</div>

<?php $this->load->view("_template/footer.php"); ?>