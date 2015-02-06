<?php
    $this->load->view('admin/inc/header');
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <?php
            // $uri = $this->uri->segment(1);
            // if($uri != ""){
            //     $this->load->view("admin/".$uri.'/'.$uri);
            // }else{
                $this->load->view('admin/dashboard/index');
            // }
        ?>
    </div> <!-- .container-fluid -->
</div> <!-- #page-wrapper -->
<?php
    $this->load->view('admin/inc/footer');
?>
