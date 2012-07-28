<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="/admin">
                Bemo FM
            </a>
            <ul class="nav">
                <li class="<?php if ($section == 'artist') echo 'active' ?>">
                    <a href="/admin/artists">Artists</a>
                </li>
                <li class="<?php if ($section == 'campaign') echo 'active' ?>">
                    <a href="/admin/campaigns">Campaigns</a>
                </li>
                <li class="<?php if ($section == 'payments') echo 'active' ?>">
                    <a href="/admin/payments">Payments</a>
                </li>
                <li class="<?php if ($section == 'votes') echo 'active' ?>">
                    <a href="/admin/votes">Votes</a>
                </li>
                <li class="<?php if ($section == 'reports') echo 'active' ?>">
                    <a href="/admin/reports">Reports</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="spacer"></div>