<?php $this->load->view("_template/header-admin.php"); ?>

<div class="alert alert-info">Hey <strong><?php if (isset($user)) echo $user ?></strong> bro</div>

<?php $this->load->view("submenus/vote.php"); ?>

<table class="span9 table table-striped table-bordered">
    <?php if(isset($total)) : ?>
    <tr>
        <td><strong>Artist</strong></td>
        <td><strong>Campaign</strong></td>
        <td><strong>Votes</strong></td>
    </tr>
        <?php foreach($total as $t) : ?>
            <tr>
                <td><?= $t->name ?></td>
                <td><?= $t->title ?></td>
                <td><?= $t->votes ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>

<?php $this->load->view("_template/footer.php"); ?>