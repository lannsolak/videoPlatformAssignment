<div class="table-responsive">
    <?php if($this->session->userdata("success")) { ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <?php
                echo $this->session->userdata("success");
                $this->session->unset_userdata("success");
            ?>
        </div>
    <?php } ?>
    <?php if($this->session->userdata("problem")) { ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <?php
                echo $this->session->userdata("problem");
                $this->session->unset_userdata("problem");
            ?>
        </div>
    <?php } ?>
    <div style="clear:both;">&nbsp;</div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Country</th>
                <th>City</th>
                <th>Skill</th>
                <th>Interest</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if($userList->num_rows() > 0){
                foreach($userList->result() as $user) {
        ?>
                    <tr>
                        <td><?php echo $user->id; ?></td>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->phone; ?></td>
                        <td><?php echo $user->country; ?></td>
                        <td><?php echo $user->city; ?></td>
                        <td><?php echo $user->skill; ?></td>
                        <td><?php echo $user->interest; ?></td>
                        <td>
                            <?php echo anchor("usermgmnt/useredit/".$user->id , '<i class="fa fa-fw fa-pencil-square-o"></i>'); ?>
                             |
                            <?php echo anchor("usermgmnt/userdelete/".$user->id , '<i class="fa fa-fw fa-trash-o"></i>'); ?>
                            <?php
                                if($user->status == "new"){
                                    echo " | ".anchor("usermgmnt/userstatus/".$user->id , '<i class="fa fa-fw fa-flag"></i>');
                                }
                            ?>
                        </td>
                    </tr>
        <?php
                }
            } else {

            }
        ?>
        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            <?php echo $pagination; ?>
        </ul>
    </nav>
</div>
