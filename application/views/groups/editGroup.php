<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
         <h1> Edit <small>Groups</small></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">  Edit <small>Groups</small></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
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

          <div class="row">
              <div class="col-md-12">
                  <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
              </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Group</h3>
            </div>
            <form role="form" action="<?php echo base_url() ?>editOldGroup" method="post">
              <div class="card-body">


                <div class="form-group">
                  <label for="group_name">Group Name</label>
                  <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" value="<?php echo $group_data['group_name']; ?>">
                  <input type="hidden" class="form-control" id="group_id" name="group_id" value="<?php echo $group_data['group_id']; ?>">
                </div>
                <div class="form-group">
                  <label for="permission">Permission</label>

          <?php    $serialize_permission = unserialize($group_data['permission']);     ?>

           <div class="table-responsive"> 
                 <table class="table table-striped table-sm">
                 <thead class="thead-light">
                  <tr>
                    <th>Permission For</th>
                    <th>Create</th>
                    <th>Update</th>
                    <th>View</th>
                    <th>Delete</th>
                  </tr>
                    <tbody>
                      <tr>
                        <td>Users</td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="permission[]" id="createUser" value="createUser" class="custom-control-input" <?php if($serialize_permission) {
                              if(in_array('createUser', $serialize_permission)) { echo "checked"; }
                            } ?> >
                            <label for="createUser" class="custom-control-label"></label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="permission[]" id="updateUser" value="updateUser" class="custom-control-input" <?php if($serialize_permission) {
                              if(in_array('updateUser', $serialize_permission)) { echo "checked"; }
                            } ?> >
                            <label for="updateUser" class="custom-control-label"></label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="permission[]" id="viewUser" value="viewUser" class="custom-control-input" <?php if($serialize_permission) {
                              if(in_array('viewUser', $serialize_permission)) { echo "checked"; }
                            } ?> >
                            <label for="viewUser" class="custom-control-label"></label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="permission[]" id="deleteUser" value="deleteUser" class="custom-control-input" <?php if($serialize_permission) {
                              if(in_array('deleteUser', $serialize_permission)) { echo "checked"; }
                            } ?> >
                            <label for="deleteUser" class="custom-control-label"></label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Groups</td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="permission[]" id="createGroup" value="createGroup" class="custom-control-input" <?php if($serialize_permission) {
                              if(in_array('createGroup', $serialize_permission)) { echo "checked"; }
                            } ?> >
                            <label for="createGroup" class="custom-control-label"></label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="permission[]" id="updateGroup" value="updateGroup" class="custom-control-input" <?php if($serialize_permission) {
                              if(in_array('updateGroup', $serialize_permission)) { echo "checked"; }
                            } ?> >
                            <label for="updateGroup" class="custom-control-label"></label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="permission[]" id="viewGroup" value="viewGroup" class="custom-control-input" <?php if($serialize_permission) {
                              if(in_array('viewGroup', $serialize_permission)) { echo "checked"; }
                            } ?> >
                            <label for="viewGroup" class="custom-control-label"></label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="permission[]" id="deleteGroup" value="deleteGroup" class="custom-control-input" <?php if($serialize_permission) {
                              if(in_array('deleteGroup', $serialize_permission)) { echo "checked"; }
                            } ?> >
                            <label for="deleteGroup" class="custom-control-label"></label>
                          </div>
                        </td>
                      </tr>


                      <tr>
                        <td>Profile</td>
                        <td> - </td>
                        <td> - </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="permission[]" id="viewProfile" value="viewProfile" class="custom-control-input" <?php if($serialize_permission) {
                          if(in_array('viewProfile', $serialize_permission)) { echo "checked"; }
                        } ?> >
                            <label for="viewProfile" class="custom-control-label"></label>
                          </div>
                        </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Setting</td>
                        <td>-</td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="permission[]" id="updateSetting" value="updateSetting" class="custom-control-input" <?php if($serialize_permission) {
                          if(in_array('updateSetting', $serialize_permission)) { echo "checked"; }
                        } ?> >
                            <label for="updateSetting" class="custom-control-label"></label>
                          </div>
                        </td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Login History</td>
                        <td> - </td>
                        <td> - </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="permission[]" id="viewLoginHistory" value="viewLoginHistory" class="custom-control-input" <?php if($serialize_permission) {
                          if(in_array('viewLoginHistory', $serialize_permission)) { echo "checked"; }
                        } ?> >
                            <label for="viewLoginHistory" class="custom-control-label"></label>
                          </div>
                        </td>
                        <td> - </td>
                      </tr>
                    </tbody>
                  </table>

                </div>
               </div>
              </div>
              <!-- /.box-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Changes</button>
                <a href="<?php echo base_url('groupListing') ?>" class="btn btn-warning">Back</a>
              </div>
            </form>
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
