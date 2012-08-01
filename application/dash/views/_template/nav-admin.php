<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="/admin">
                Bemo FM
            </a>
            <ul class="nav">
                <li class="<?php if ($section == 'artist') echo 'active' ?>">
                    <a href="/artist">Artists</a>
                </li>
                <li class="<?php if ($section == 'campaign') echo 'active' ?>">
                    <a href="/campaign">Campaigns</a>
                </li>
                <li class="<?php if ($section == 'payments') echo 'active' ?>">
                    <a href="/payment">Payments</a>
                </li>
                <li class="<?php if ($section == 'votes') echo 'active' ?>">
                    <a href="/vote">Votes</a>
                </li>
                <li class="<?php if ($section == 'reports') echo 'active' ?>">
                    <a href="/report">Reports</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="spacer"></div>