<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" /> -->
<script type="text/javascript">
  
  $(function () {

      $('#fromDate').datetimepicker({ format: 'DD-MM-YYYY' });
      $('#toDate').datetimepicker({ format: 'DD-MM-YYYY' });
  
  });

</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              <i class="fa fa-users"></i> Login History
              <small>track login history</small>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Login History</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">


        <div class="row">
          <div class="col-md-12">
          <form action="<?php echo base_url() ?>login-history" method="POST" id="searchList">

            <div class="row">

            <div class="col-md-3">
              <div class="form-group">
                  <div class="input-group date" id="fromDate" data-target-input="nearest">
                    <input id="fromDate" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control datetimepicker-input" data-target="#fromDate" placeholder="From Date" autocomplete="off" data-toggle="datetimepicker"/>
                   <div class="input-group-append" data-target="#fromDate" data-toggle="datetimepicker">
                       <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                   </div>
                  </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                  <div class="input-group date" id="toDate" data-target-input="nearest">
                    <input id="toDate" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control datetimepicker-input" data-target="#toDate" placeholder="From Date" autocomplete="off" data-toggle="datetimepicker"/>
                   <div class="input-group-append" data-target="#toDate" data-toggle="datetimepicker">
                       <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                   </div>
                  </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
              <input id="searchText" type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control" placeholder="Search Text"/>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 form-group">
              <button type="submit" class="btn btn-md btn-primary btn-block searchList pull-right"><i class="fa fa-search" aria-hidden="true"></i></button> 
            </div>
            <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 form-group">
              <button class="btn btn-md btn-default btn-block pull-right resetFilters"><i class="fas fa-sync-alt"></i></button>
            </div>
          </form>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= !empty($userInfo) ? $userInfo->name." : ".$userInfo->email : "All users" ?></h3>
                    <div class="card-tools">
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive no-padding">
                  <table class="table table-hover table-striped">
                    <tr>
                      <th>Session Data</th>
                      <th>IP Address</th>
                      <th>User Agent</th>
                      <th>Agent Full String</th>
                      <th>Platform</th>
                      <th>Date-Time</th>
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->sessionData ?></td>
                      <td><?php echo $record->machineIp ?></td>
                      <td><?php echo $record->userAgent ?></td>
                      <td><?php echo $record->agentString ?></td>
                      <td><?php echo $record->platform ?></td>
                      <td><?php echo $record->createdDtm ?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.card-body -->
                <div class="card-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.card -->
            </div>
        </div>
      </div>
     </div>
    </div>
</div>
<!-- <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
<script type="text/javascript">

    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;
            jQuery("#searchList").attr("action", link);
            jQuery("#searchList").submit();
        });
        jQuery('.resetFilters').click(function(){
          $(this).closest('form').find("input[type=text]").val("");
        })
    });
</script>
