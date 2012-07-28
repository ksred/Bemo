<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="/admin">
                Bemo FM
            </a>
            <?php $uri = $_SERVER["REQUEST_URI"]; ?>
            <ul class="nav">
                <li class="<?php if ($uri == '/admin/artists') echo 'active' ?>">
                    <a href="/admin/artists">Artists</a>
                </li>
                <li class="<?php if ($uri == '/admin/campaigns') echo 'active' ?>">
                    <a href="/admin/campaigns">Campaigns</a>
                </li>
                <li class="<?php if ($uri == '/admin/payments') echo 'active' ?>">
                    <a href="/admin/payments">Payments</a>
                </li>
                <li class="<?php if ($uri == '/admin/votes') echo 'active' ?>">
                    <a href="/admin/votes">Votes</a>
                </li>
                <li class="<?php if ($uri == '/admin/reports') echo 'active' ?>">
                    <a href="/admin/reports">Reports</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="spacer"></div>