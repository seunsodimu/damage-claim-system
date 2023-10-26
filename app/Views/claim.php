<?= $this->extend("layouts/main") ?>

<?= $this->section("body") ?>
<div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <!-- <h4 class="card-title">Claim Entries</h4> -->
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <!-- <button class="btn btn-sm btn-primary view-more" data-toggle="modal" data-target="#exampleModal">Add new</button> -->
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
                        <form method="POST" action="<?= base_url('claims/update/'.$claim['id']) ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                              <div class="form-row">
                                 <div class="col">
                                    <label for="IssueStatus">Issue Status</label>
                                 <select class="form-control" name="IssueStatus" id="IssueStatus">
                                    <option <?= ($claim['issue_status']=="Open") ? " Selected": "" ?>>Open</option>
                                    <option <?= ($claim['issue_status']=="Closed") ? " Selected": "" ?>>Closed</option>
                                 </select>
                                 </div>
                                 <div class="col">
                                    <?php if(session()->get('userData')['role_id'] == 1): ?>
                                    <label for="ClaimStatus">Claim Status</label>
                                 <select class="form-control" name="ClaimStatus" id="ClaimStatus">
                                    <option <?= ($claim['claim_status']=="Accepted") ? " Selected": "" ?>>Accepted</option>
                                    <option <?= ($claim['claim_status']=="Rejected") ? " Selected": "" ?>>Rejected</option>
                                 </select>
                                 <?php endif; ?>
                                 </div>
                              </div>
                              <div class="form-row mt-3">
                                 <div class="col">
                                    <label for="DamageCause">Cause of Damage</label>
                                 <select class="form-control" name="DamageCause" id="DamageCause">
                                    <option <?= ($claim['damage_cause']=="Holes") ? " Selected": "" ?>>Holes</option>
                                    <option <?= ($claim['damage_cause']=="Breakage") ? " Selected": "" ?>>Breakage</option>
                                 </select>
                                 </div>
                                 <div class="col">
                                    <label for="PartNumber">Part Number</label>
                                 <input type="text" class="form-control" name="PartNumber" id="PartNumber" placeholder="Part #" value="<?= $claim['part_no'] ?>">
                                 </div>
                              </div>
                              <div class="form-row mt-3">
                                 <div class="col">
                                    <label for="ShipmentDate">Shipment Date</label>
                                 <input type="text" onfocus="(this.type='date')" value="<?= $claim['shipment_date'] ?>" class="form-control" name="ShipmentDate" id="ShipmentDate" placeholder="Shipment Date (mm/dd/yyyy)">
                                 </div>
                                 <div class="col">
                                    <label for="LoadedBy">Loaded By</label>
                                 <input type="text" class="form-control" name="LoadedBy" value="<?= $claim['loaded_by'] ?>" id="LoadedBy" placeholder="Loaded By">
                                 </div>
                              </div>
                              <div class="form-row mt-3">
                                 <div class="col">
                                    <label for="LayersLost">Number of Layers Lost</label>
                                 <input type="text" class="form-control" name="LayersLost" value="<?= $claim['layers_lost'] ?>" id="LayersLost" placeholder="Number of Layers Lost">
                                 </div>
                                 <div class="col">
                                    <label for="Diameter">Diameter</label>
                                 <input type="text" class="form-control" name="Diameter" id="Diameter" value="<?= $claim['diameter'] ?>" placeholder="Diameter (in.)">
                                 </div>
                              </div>
                              <div class="form-row mt-3">
                                 <div class="col">
                                    <label for="Length">Length</label>
                                 <input type="text" class="form-control" name="Length" value="<?= $claim['length'] ?>" id="Length" placeholder="Length (ft.)">
                                 </div>
                                 <div class="col">
                                    <label for="Width">Width</label>
                                 <input type="text" class="form-control" name="Width" id="Width" value="<?= $claim['width'] ?>" placeholder="Width (in.)">
                                 </div>
                              </div>
                              <div class="form-row mt-3">
                                 <div class="col">
                                    <label for="BasisWeight">Basis Weight</label>
                                 <input type="text" class="form-control" name="BasisWeight" value="<?= $claim['basis_weight'] ?>" id="BasisWeight" placeholder="Basis Weight (ft.)">
                                 </div>
                                 <div class="col">
                                    <label for="CSF">CSF</label>
                                 <input type="text" class="form-control" name="CSF" value="<?= $claim['csf'] ?>" id="CSF" placeholder="CSF">
                                 </div>
                              </div>
                              <div class="form-row mt-3">
                                 <div class="col">
                                    <label for="Notes">Notes</label>
                                 <textarea class="form-control" id="Notes" rows="3" name="Notes" placeholder="Notes" value="<?= $claim['notes'] ?>"></textarea>
                                 </div>
                                 <div class="col">
                                    <label for="Summary">Summary/Comments</label>
                                 <textarea class="form-control" id="Summary" name="Summary" rows="3" placeholder="Summary/Comments" value="<?= $claim['comments'] ?>"></textarea>
                                 </div>
                              </div>
                              
                              <div class="form-group mt-3">
                                 <div class="col">
                                    <input type="file" class="custom-file-input" id="customFile" name="claim_file">
                                    <label class="custom-file-label" for="customFile">Replace file</label>
                                 </div>
                                 <?php if($claim['file_path'] != ""): ?>
                                 <div class="col">
                                    <a href="<?= base_url('uploads/'.$claim['file_path']) ?>" target="_blank">View file</a>
                                 </div>
                                    <?php endif; ?>
                              </div>
                           
                                    </div>
                                       <input type="submit" class="btn btn-primary" value="Save">
                                    
                                    </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
                           <!-- Modal -->
                           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">New Claim <?= session()->get('userData')['role_id']; ?></h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <form method="POST" action="<?= base_url('claims') ?>">
                                    <div class="modal-body">
                              <div class="form-row">
                                 <div class="col">
                                 <select class="form-control" name="IssueStatus" id="IssueStatus">
                                    <option selected="" disabled="">Issue Status</option>
                                    <option>Open</option>
                                    <option>Closed</option>
                                 </select>
                                 </div>
                                 <div class="col">
                                 <?php if(session()->get('userData')['role_id'] == 1): ?>
                                 <select class="form-control" name="ClaimStatus" id="ClaimStatus">
                                    <option selected="" disabled="">Claim Status</option>
                                    <option>Accepted</option>
                                    <option>Rejected</option>
                                 </select>
                                 <?php endif; ?>
                                 </div>
                              </div>
                              <div class="form-row mt-3">
                                 <div class="col">
                                 <select class="form-control" name="DamageCause" id="DamageCause">
                                    <option selected="" disabled="">Cause of Damage</option>
                                    <option>Holes</option>
                                    <option>Breakage</option>
                                 </select>
                                 </div>
                                 <div class="col">
                                 <input type="text" class="form-control" name="PartNumber" id="PartNumber" placeholder="Part #">
                                 </div>
                              </div>
                              <div class="form-row mt-3">
                                 <div class="col">
                                 <input type="text" onfocus="(this.type='date')" class="form-control" name="ShipmentDate" id="ShipmentDate" placeholder="Shipment Date (mm/dd/yyyy)">
                                 </div>
                                 <div class="col">
                                 <input type="text" class="form-control" name="LoadedBy" id="LoadedBy" placeholder="Loaded By">
                                 </div>
                              </div>
                              <div class="form-row mt-3">
                                 <div class="col">
                                 <input type="text" class="form-control" name="LayersLost" id="LayersLost" placeholder="Number of Layers Lost">
                                 </div>
                                 <div class="col">
                                 <input type="text" class="form-control" name="Diameter" id="Diameter" placeholder="Diameter (in.)">
                                 </div>
                              </div>
                              <div class="form-row mt-3">
                                 <div class="col">
                                 <input type="text" class="form-control" name="Length" id="Length" placeholder="Length (ft.)">
                                 </div>
                                 <div class="col">
                                 <input type="text" class="form-control" name="Width" id="Width" placeholder="Width (in.)">
                                 </div>
                              </div>
                              <div class="form-row mt-3">
                                 <div class="col">
                                 <input type="text" class="form-control" name="BasisWeight" id="BasisWeight" placeholder="Basis Weight (ft.)">
                                 </div>
                                 <div class="col">
                                 <input type="text" class="form-control" name="CSF" id="CSF" placeholder="CSF">
                                 </div>
                              </div>
                              <div class="form-row mt-3">
                                 <div class="col">
                                 <textarea class="form-control" id="Notes" rows="3" name="Notes" placeholder="Notes"></textarea>
                                 </div>
                                 <div class="col">
                                 <textarea class="form-control" id="Summary" name="Summary" rows="3" placeholder="Summary/Comments"></textarea>
                                 </div>
                              </div>
                           
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <input type="submit" class="btn btn-primary" value="Save change">
                                    </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
         <?= $this->endSection() ?>