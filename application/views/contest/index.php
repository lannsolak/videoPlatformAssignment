<div class="col-md-12">
    <div class="jumbotron hero-spacer">
        <h1>Feature Contest</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <p><a class="btn btn-primary btn-large">Call to action!</a></p>
    </div>
</div>
<div class="col-sm-8">
    <h3>Contest Features</h3>
    <hr />
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
                            <th>CONTEST</th>
                            <th>DEADLINE</th>
                            <th>RESULTS</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if($scheduleContest != null) {
                                foreach($scheduleContest as $sc){
                        ?>
                                    <tr>
                                        <td>CT0<?php echo $sc->id; ?></td>
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
                            <th>TITTLE</th>
                            <th>PRIZE</th>
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
                                <th>Code</th>
                                <th>Visits</th>
                                <th>% New Visits</th>
                                <th>Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>/index.html</td>
                                <td>1265</td>
                                <td>32.3%</td>
                                <td>$321.33</td>
                            </tr>
                            <tr>
                                <td>/about.html</td>
                                <td>261</td>
                                <td>33.3%</td>
                                <td>$234.12</td>
                            </tr>
                            <tr>
                                <td>/sales.html</td>
                                <td>665</td>
                                <td>21.3%</td>
                                <td>$16.34</td>
                            </tr>
                            <tr>
                                <td>/blog.html</td>
                                <td>9516</td>
                                <td>89.3%</td>
                                <td>$1644.43</td>
                            </tr>
                            <tr>
                                <td>/404.html</td>
                                <td>23</td>
                                <td>34.3%</td>
                                <td>$23.52</td>
                            </tr>
                            <tr>
                                <td>/services.html</td>
                                <td>421</td>
                                <td>60.3%</td>
                                <td>$724.32</td>
                            </tr>
                            <tr>
                                <td>/blog/post.html</td>
                                <td>1233</td>
                                <td>93.2%</td>
                                <td>$126.34</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
        