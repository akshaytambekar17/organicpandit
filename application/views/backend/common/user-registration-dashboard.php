<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">User Registration</li>
        </ol>
    </section>
    
        <!-- Small boxes (Stat box) -->
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Info Boxes Style 2 -->
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Users</span>
                        <span class="info-box-number"><?= count( $userList ) ?></span>

<!--                        <div class="progress">
                            <div class="progress-bar" style="width: 50%"></div>
                        </div>-->
<!--                        <span class="progress-description">
                            
                        </span>-->
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php
                $i = 1;
                foreach( $userTypeList as $valueType ) {   
                    $count = 0;
                    if( 6 == $i ){
                        $i = 1;
                    }
                    foreach( $userList as $valueUser ) {
                        if( $valueType['id'] == $valueUser['user_type_id'] ) {
                            $count++;
                        }
                    }
                    switch( $i ) { 
                        case 1:
                            $boxColor = 'bg-aqua';
                            break;
                        case 2:
                            $boxColor = 'bg-green';
                            break;
                        case 3:
                            $boxColor = 'bg-yellow';
                            break;
                        case 4:
                            $boxColor = 'bg-red';
                            break;
                        case 5:
                            $boxColor = 'bg-fuchsia';
                            break;
                        default :
                            $boxColor = 'bg-info';
                            break;
                    }
                    $i++;
            ?>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box <?= $boxColor; ?> ">
                        <div class="inner">
                            <h3><?= $count?></h3>
                            <p><?= $valueType['name'] ?></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <?php
                            $paramter = '?partner_type_id='.$valueType['id'];
                            if( ADMINUSERNAME == $userSessionData['username'] ) {
                                $paramter = '?user_type_id='.$valueType['id'];
                            }
                            
                        ?>
                        <a href="<?= base_url()?>admin/user/user-list<?= $paramter; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->