<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
         <h1> Manage <small>Groups</small></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">  Manage <small>Groups</small></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-md-6 text-left">
          <div class="form-group">
            <input class="btn btn-danger" type="button" id="delete" value='Delete'>
          </div>
        </div>

        <?php if(in_array('createGroup', $user_permission)): ?>
        <div class="col-md-6 text-right">
          <div class="form-group">
          <a class="btn btn-primary" href="<?php echo base_url(); ?>addStudent"><i class="fa fa-plus"></i> Add Group</a>
        </div>
        </div>
        <?php endif; ?>

        <div class="col-md-12">

          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manage Groups</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="groupTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>
                     <div class="icheck-danger d-inline">
                    <input type="checkbox" id="checkall" value='1'>
                      <label for="checkall">
                      </label>
                    </div>
                  </th>
                  <th>Group Name</th>
                  <th>Group Permission</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
      var dataTable;
    $(document).ready(function(){  
     dataTable = $('#groupTable').DataTable({  
              "processing":true,  
              "serverSide":true,  
              "paging":   true,
              fixedHeader: true,
              "order":[],  
              "ajax":{  
                   url: baseURL + 'group/fetch_group',  
                   type:"POST"
              },  
              "columnDefs":[  
                   {  
                        "targets":[0, -1],  
                        "orderable":false,  
                   },  

                   { "width": "10px", "targets": 0 },
                   // { "width": "110px", "targets": 2 },
                   { "width": "110px", "targets": -1 },

              ]  
              // console.log(baseURL);
         });  



    });  
  </script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/deleteGroup.js" charset="utf-8"></script>
