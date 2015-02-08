<div class="col-md-12">
    <div class="jumbotron hero-spacer">
        <h1>Feature Contest</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <p><a class="btn btn-primary btn-large">Call to action!</a></p>
    </div>
</div>
<div class="col-sm-8">
    <h3 class="h3">Contest Features</h3>
    <hr />
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-orange">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo anchor("/contest/newcontest/", "Up Coming"); ?></h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <?php 
                            if($newContest != null) {
                                foreach($newContest as $nc){
                                    $id = $nc->id;
                                    echo anchor("/contest/details/$id", ucfirst($nc->title), 'class="list-group-item"');
                                }
                            }else{
                                echo "No New Contest Available";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="panel panel-orange">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo anchor("/contest/schedule/", "Schedules"); ?></h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Contest</th>
                                <th>Deadline</th>
                                <th>Result</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if($scheduleContest != null) {
                                    foreach($scheduleContest as $sc){
                            ?>
                                        <tr>
                                            <td>CT0<?php echo $sc->cid; ?></td>
                                            <td><?php echo $sc->title; ?></td>
                                            <td><?php echo date ( "d M Y", strtotime($sc->enddate)); ?></td>
                                            <td><?php echo date ( "d M Y", strtotime($sc->resultdate)); ?></td>
                                            <td><?php $id = $sc->id; echo anchor("/contest/details/$id", "Detail"); ?></td>
                                        </tr>                                
                            <?php
                                    }
                                }else{
                                    echo "<tr><td colspan='5'>No Record Was Found !!!</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-orange">
                <div class="panel-heading">
                    <h3 class="panel-title">Progressing</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Prize</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if($progressContest != null) {
                                    foreach($progressContest as $pc){
                            ?>
                                        <tr>
                                            <td>CT0<?php echo $pc->id; ?></td>
                                            <td><?php echo $pc->title; ?></td>
                                            <td><?php echo $pc->prize; ?></td>
                                            <td>
                                                <?php 
                                                    $id = $pc->id; 
                                                    echo anchor("/contest/details/$id", "Detail"); 
                                                ?>
                                            </td>
                                        </tr>                                
                            <?php
                                    }
                                }else{
                                    echo "<tr><td colspan='4'>No Record Was Found !!!</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-orange">
                <div class="panel-heading">
                    <h3 class="panel-title">Winner</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Winner</th>
                                <th>Contests</th>
                                <th>Videos</th>
                                <th>Prize</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if($winnerContest != null) {
                                    foreach($winnerContest as $wc){
                            ?>
                                        <tr>
                                            <td><?php echo anchor("user/preview/".$wc->name, $wc->name); ?></td>
                                            <td><?php echo anchor("contest/details/".$wc->contests_id, $wc->ctitle); ?></td>
                                            <td><?php echo anchor("video/play/".$wc->videos_id, $wc->vtitle); ?></td>
                                            <td><?php echo $wc->prize; ?></td>
                                            <td>
                                                <?php 
                                                    $id = $wc->ecid; 
                                                    echo anchor("/contest/winnerdetail/$id", "Detail"); 
                                                ?>
                                            </td>
                                        </tr>                                
                            <?php
                                    }
                                }else{
                                    echo "<tr><td colspan='4'>No Record Was Found !!!</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        