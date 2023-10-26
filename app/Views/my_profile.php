<?= $this->extend("layouts/main") ?>

<?= $this->section("body") ?>
<div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
               <div class="col-lg-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">My Profile</h4>
                           </div>
                        </div>
                    
<?php if (session()->has('errors')): ?>
    <ul>
        <?php foreach (session('errors') as $error): ?>
            <li class="red"><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php if (session()->has('success')): ?>
    <div class="alert alert-success">
        <?= session('success') ?>
    </div>
<?php endif; ?>
<div class="iq-card-body">
   <form method="POST" action="<?= base_url('update-profile') ?>">
                            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">    
                                   
                                    <div class="row">
                                       <div class="form-group col-md-6">
                                          <label for="fname">First Name:</label>
                                          <input type="text" class="form-control" id="fname" name="FirstName" value="<?= $user['first_name'] ?>" placeholder="First Name">
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label for="lname">Last Name:</label>
                                          <input type="text" class="form-control" id="lname" name="LastName" value="<?= $user['last_name'] ?>" placeholder="Last Name">
                                       </div>
                                       
                                       
                                    </div>
                                    <hr>
                                    <div class="row">
                                       <div class="form-group col-md-6">
                                          <label for="pass">Password:</label>
                                          <input type="password" class="form-control" name="Password" id="pass" placeholder="Password" autocomplete="off">
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label for="rpass">Repeat Password:</label>
                                          <input type="password" class="form-control" id="rpass" name="Password_confirm" placeholder="Repeat Password" autocomplete="off">
                                       </div>
                                    </div>
                                    <div>
                                    <div id="button" class="btn1 btn btn-primary" onclick="genPassword()">Generate</div>
                                    <a  id="button" class="btn2 btn btn-danger" onclick="copyPassword()">Copy</a>
                                    </div>
                                   <div class="row mt-3">
                                   <input type="submit" class="btn btn-info" value="Update profile">
                                   </div>
                                 
                                          
                                          </form>
                                          
                                             
</div>


                       
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
         
                   
         <?= $this->endSection() ?>