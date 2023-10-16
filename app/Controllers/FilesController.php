<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Files\File;



class FilesController extends Controller
{
    public function displayFile($filename)
{
    $filePath = WRITEPATH . 'uploads/' . $filename;

    if (!file_exists($filePath)) {
        // File doesn't exist, send a 404 response.
        return $this->response->setStatusCode(404, 'File not found');
    }

    // Determine the file type to set the Content-Type header correctly
    $fileInstance = new File($filePath);
    $mimeType = $fileInstance->getMimeType();

    // Set headers and output the file
    return $this->response->setHeader('Content-Type', $mimeType)
                          ->setBody(file_get_contents($filePath));
}
}
