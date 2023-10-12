<?= $this->extend("layouts/main") ?>

<?= $this->section("body") ?>
<div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
               <div class="col-lg-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Add new user</h4>
                           </div>
                        </div>
                    
<?php if (session()->has('errors')): ?>
    <ul>
        <?php foreach (session('errors') as $error): ?>
            <li class="red"><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<div class="iq-card-body">
<form method="POST" action="<?= base_url('register') ?>">
                                    
                                   
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="fname">First Name:</label>
                                    <input type="text" class="form-control" id="fname" name="FirstName" placeholder="First Name">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" name="LastName" placeholder="Last Name">
                                 </div>
                                 
                                 
                              </div>
                              <hr>
                             
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="Role">Role:</label>
                                    <select class="form-control" id="Role" name="Role">
                                       <option value="2">Standard</option>
                                       <option value="1">Admin</option>
                                    </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="uname">User Name:</label>
                                    <input type="text" class="form-control" id="uname" name="Username" placeholder="User Name">
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="pass">Password:</label>
                                    <input type="password" class="form-control" name="Password" id="pass" placeholder="Password">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="rpass">Repeat Password:</label>
                                    <input type="password" class="form-control" id="rpass" name="Password_confirm" placeholder="Repeat Password ">
                                 </div>
                              </div>
                              <div>
                              <div id="button" class="btn1 btn btn-primary" onclick="genPassword()">Generate</div>
                              <a  id="button" class="btn2 btn btn-danger" onclick="copyPassword()">Copy</a>
                              </div>
                             <div class="row mt-3">
                             <input type="submit" class="btn btn-info" value="Add user">
                             </div>
                           
                                    
                                    </form>
</div>


                       
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                           <a name="list"></a>
                           <div class="iq-header-title">
                              <h4 class="card-title">Users</h4>
                           </div>
                        </div>
                        <?php if (session()->has('error')): ?>
    <div class="alert alert-danger">
        <?= session('error') ?>
    </div>
<?php endif; ?>
<?php if (session()->has('success')): ?>
    <div class="alert alert-success">
        <?= session('success') ?>
    </div>
<?php endif; ?>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="table mb-0 table-borderless">
                                 <thead>
                                    <tr>
                                       <th scope="col">Name</th>
                                       <th scope="col">Username</th>
                                       <th scope="col">Role</th>
                                       <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach ($users as $user) : ?>
                                       <tr>
                                          <td><?= $user['first_name']." ".$user['last_name'] ?></td>
                                          <td><?= $user['username'] ?></td>
                                          <td><?= $user['role_id'] == 1 ? 'Admin' : 'Standard' ?></td>
                                          <td>
                                       <div class="flex align-items-center list-user-action">
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                          <a class="iq-bg-primary rmv-user" data-usid="<?= $user['id'] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="javascript:void(0)"><i class="ri-delete-bin-line"></i></a>
                                       </div>
                                    </td>
                                       </tr>
                                    <?php endforeach; ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
                   
         <?= $this->endSection() ?>