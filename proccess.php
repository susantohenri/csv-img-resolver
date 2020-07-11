<?php

class csvImg
{

    private $html = '';
    private $error = false;
    private $zip_input_name = 'upload_here';
    private $uploadedFile = false;
    private $savedZipSource = './savedZipSource.zip';
    private $sourceDir = false;
    private $csvFile = false;

    function __construct()
    {
        if ($_FILES && isset($_FILES[$this->zip_input_name])) {
            $this->uploadedFile = $_FILES[$this->zip_input_name];
            $this->validateZip();
            if (!$this->error) {
                $this->moveUploadedIntoTemporaryZip();
                $this->extractTemporaryZip();
                $this->deleteZipSource();
                $this->html = 'done';
            }
        } else $this->letUserUploadZip();
    }

    function letUserUploadZip()
    {
        $this->html = "
            <form enctype='multipart/form-data' method='post' action=''>
                <label>Upload Zip:</label>
                <input type='file' name='{$this->zip_input_name}' />
                <input type='submit' name='submit' value='Upload' />
            </form>
        ";
    }

    function validateZip()
    {
        if (!in_array($this->uploadedFile['type'], array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed'))) {
            $this->error = 'wrong file type';
        }
    }

    function moveUploadedIntoTemporaryZip()
    {
        $uploadedFile = $this->uploadedFile;
        move_uploaded_file($uploadedFile['tmp_name'], $this->savedZipSource);
    }

    function extractTemporaryZip()
    {
        $zip = new ZipArchive();
        if ($zip->open($this->savedZipSource)) {
            $this->sourceDir = './' . time();
            mkdir ($this->sourceDir);
            $zip->extractTo($this->sourceDir);
            $zip->close();
        } else $this->error = 'could not open zip file';
    }

    function deleteZipSource()
    {
        unlink($this->savedZipSource);
    }

    function locateCsv()
    {
    }

    function readCSv()
    {
    }

    function letMemberDefineArticleAndImgColumn()
    {
    }

    function loopLines()
    {
    }

    function compressDirToTemporary()
    {
    }

    function streamZipResult()
    {
    }

    function deleteUserDirectory()
    {
    }

    function deleteZipResult()
    {
    }

    function getHTML()
    {
        return $this->error ? $this->error : $this->html;
    }
}
