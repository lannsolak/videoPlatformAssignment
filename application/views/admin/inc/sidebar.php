<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <?php $uri = $this->uri->segment(1); ?>
        <li class="<?php if($uri == "dashboard"){ echo "active"; } ?>">
            <?php echo anchor("dashboard/", '<i class="fa fa-fw fa-dashboard"></i> Dashboard'); ?>
        </li>
        <li class="<?php if($uri == "videomgmnt"){ echo "active"; } ?>">
            <?php echo anchor("videomgmnt/", '<i class="fa fa-fw fa-play-circle"></i> Videos'); ?>
        </li>
        <li class="<?php if($uri == "contestmgmnt"){ echo "active"; } ?>">
            <?php echo anchor("contestmgmnt/", '<i class="fa fa-fw fa-star-half-o"></i> Contests'); ?>
        </li>
        <li class="<?php if($uri == "usermgmnt"){ echo "active"; } ?>">
            <?php echo anchor("usermgmnt/", '<i class="fa fa-fw fa-users"></i> Users'); ?>
        </li>
    </ul>
</div>
