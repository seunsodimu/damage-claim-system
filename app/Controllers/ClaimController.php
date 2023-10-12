<?php namespace App\Controllers;

use App\Models\ClaimModel;
use App\ThirdParty\EmailService;

class ClaimController extends BaseController
{
    public function index()
    {
        // List all claims
        $claims = new ClaimModel();
        $data['claims'] = $claims->getClaims();
        $data['title'] = 'Claims';
        return view('claims', $data);
    }

    public function create()
    {
        // handle uploaded file
        $file = $this->request->getFile('claim_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $path = "../writeable/uploads/";
            $file->move($path, $newName);  // Adjust the path as needed

            // Optionally, store the file name in the database with the claim
             $claimData['file_path'] = $newName;

        }else{
            $newName = "";
        }

        // store new claim
        $user_id = session()->get('userData')['id'];
        $claimModel = new ClaimModel();
        $claimModel->save([
            'user_id' => $user_id,
            'claim_status' => $this->request->getVar('ClaimStatus'),
            'issue_status' => $this->request->getVar('IssueStatus'),
            'shipment_date' => $this->request->getVar('ShipmentDate'),
            'loaded_by' => $this->request->getVar('LoadedBy'),
            'layers_lost' => $this->request->getVar('LayersLost'),
            'diameter' => $this->request->getVar('Diameter'),
            'length' => $this->request->getVar('Length'),
            'width' => $this->request->getVar('Width'),
            'basis_weight' => $this->request->getVar('BasisWeight'),
            'csf' => $this->request->getVar('CSF'),
            'notes' => $this->request->getVar('Notes'),
            'comments' => $this->request->getVar('Summary'),
            'damage_cause' => $this->request->getVar('DamageCause'),
            'part_no' => $this->request->getVar('PartNumber'),
            'file_path' => $newName
        ]);
        //send details in email
        $emailService = new EmailService();
        $body = "<html><body><h1>New Claim</h1><p>Claim details</p>
        <p>Claim Status: " . $this->request->getVar('ClaimStatus') . "</p>
        <p>Issue Status: " . $this->request->getVar('IssueStatus') . "</p>
        <p>Damage Cause: " . $this->request->getVar('DamageCause') . "</p>
        <p>Part Number: " . $this->request->getVar('PartNumber') . "</p>
        <p>Shipment Date: " . $this->request->getVar('ShipmentDate') . "</p>
        <p>Loaded By: " . $this->request->getVar('LoadedBy') . "</p>
        <p>Layers Lost: " . $this->request->getVar('LayersLost') . "</p>
        <p>Diameter: " . $this->request->getVar('Diameter') . "</p>
        <p>Length: " . $this->request->getVar('Length') . "</p>
        <p>Width: " . $this->request->getVar('Width') . "</p>
        <p>Basis Weight: " . $this->request->getVar('BasisWeight') . "</p>
        <p>CSF: " . $this->request->getVar('CSF') . "</p>
        <p>Notes: " . $this->request->getVar('Notes') . "</p>
        <p>Summary: " . $this->request->getVar('Summary') . "</p>
        <p>Created by: " . session()->get('userData')['first_name'] ." ".session()->get('userData')['last_name'] . "</p>
        </body></html>";
        $subject = "New Claim";
        $from = array("email" =>"reports@dawson-reports.com", "name" => "Dawson Reports");
        $to = array("email" => "seun.sodimu@gmail.com", "name" => "Seun");
        $emailService->sendEmail($from, $to, $subject, $body);

        return redirect()->to(base_url('claims'))->with('success', 'Claim created successfully with '.$newName);
    }

    public function store()
    {
        // Store new claim
    }

    public function edit($id)
    {
        // Display claim edit form
        $claimModel = new ClaimModel();
        $data['claim'] = $claimModel->getClaim($id);
        $data['title'] = 'Edit Claim';
        return view('claim', $data);
    }

    public function update($id)
    {
        // Update claim
        $claimModel = new ClaimModel();
        $claimData = $claimModel->getClaim($id);
        //check if file uploaded
        $file = $this->request->getFile('claim_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $path = "../writeable/uploads/";
            $file->move($path, $newName);  // Adjust the path as needed

            // Optionally, store the file name in the database with the claim
            $claimData['file_path'] = $newName;
        }

        $claimModel->save([
            'id' => $id,
            'claim_status' => $this->request->getVar('ClaimStatus'),
            'issue_status' => $this->request->getVar('IssueStatus'),
            'shipment_date' => $this->request->getVar('ShipmentDate'),
            'loaded_by' => $this->request->getVar('LoadedBy'),
            'layers_lost' => $this->request->getVar('LayersLost'),
            'diameter' => $this->request->getVar('Diameter'),
            'length' => $this->request->getVar('Length'),
            'width' => $this->request->getVar('Width'),
            'basis_weight' => $this->request->getVar('BasisWeight'),
            'csf' => $this->request->getVar('CSF'),
            'notes' => $this->request->getVar('Notes'),
            'comments' => $this->request->getVar('Summary'),
            'damage_cause' => $this->request->getVar('DamageCause'),
            'part_no' => $this->request->getVar('PartNumber'),
            'file_path' => $claimData['file_path']
        ]);
        return redirect()->to(base_url('claims/edit/'.$id))->with('success', 'Claim updated successfully');
    }

    public function delete($id)
    {
        // Delete claim
    }

    public function display($filename)
    {
        $filePath = 'writable/uploads/' . $filename;

        if (!file_exists($filePath)) {
            // File doesn't exist, send a 404 response
            return $this->response->setStatusCode(404, 'File not found');
        }

        // Determine the file type (MIME type) for the response header
        $mimeType = mime_content_type($filePath);

        // Set headers and output the file
        return $this->response->setHeader('Content-Type', $mimeType)
                              ->setBody(file_get_contents($filePath));
    }
}
