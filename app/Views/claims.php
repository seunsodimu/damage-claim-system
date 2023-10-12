<?= $this->extend("layouts/main") ?>

<?= $this->section("body") ?>
<div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Claim Entries</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <button class="btn btn-sm btn-primary view-more" data-toggle="modal" data-target="#exampleModal">Add new</button>
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
                              <table class="table table-striped table-bordered" id="claimsTable">
                                 <thead>
                                    <tr>
                                       <th scope="col">Date Created</th>
                                       <th scope="col">Damage Cause</th>
                                       <th scope="col">Part #</th>
                                       <th scope="col">Number of Layers Lost</th>
                                       <th scope="col">Loaded By</th>
                                       <th scope="col">Shipment Date</th>
                                       <th scope="col">Issue Status</th>
                                       <th scope="col">Claim Status</th>
                                       <th scope="col">Created by</th>
                                       <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach ($claims as $claim) : ?>
                                       <tr>
                                          <td>
                                            <a href="<?= base_url('claims/edit/' . $claim['id']) ?>">
                                            <?= date('m/d/y h:i a', strtotime($claim['created_at'])) ?>
                                            </a>
                                        </td>
                                          <td><?= $claim['damage_cause'] ?></td>
                                          <td><?= $claim['part_no'] ?></td>
                                          <td><?= $claim['layers_lost'] ?></td>
                                          <td><?= $claim['loaded_by'] ?></td>
                                          <td><?= $claim['shipment_date'] ?></td>
                                          <td><?= $claim['issue_status'] ?></td>
                                          <td><?= $claim['claim_status'] ?></td>
                                          <td><?= $claim['created_by'] ?></td>
                                          <td></td>
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
         
                           <!-- Modal -->
                           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">New Claim</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <form method="POST" action="<?= base_url('claims') ?>" enctype="multipart/form-data">
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
                                 <select class="form-control" name="ClaimStatus" id="ClaimStatus">
                                    <option selected="" disabled="">Claim Status</option>
                                    <option>Accepted</option>
                                    <option>Rejected</option>
                                 </select>
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
                              
                              <div class="form-group mt-3">
                                 <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="claim_file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                 </div>
                              </div>
                           
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <input type="submit" class="btn btn-primary" value="Save">
                                    </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
         <?= $this->endSection() ?>