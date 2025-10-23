<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backup extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load database dan dbutil
        $this->load->database();
        $this->load->dbutil();
        // Load helper untuk file dan download
        $this->load->helper(['file', 'download']);
    }

    public function index()
    {
        // Buat backup database
        $backup = $this->dbutil->backup();

        // Nama file backup
        $filename = 'backup-db-' . date('Y-m-d_H-i-s') . '.gz';

        // Tulis file ke folder backup (optional, bisa dilewati)
        // write_file('./backup/' . $filename, $backup);

        // Langsung download file backup
        force_download($filename, $backup);
    }
}
