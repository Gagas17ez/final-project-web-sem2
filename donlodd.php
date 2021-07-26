<?php 
if (isset($_GET['filename'])) {
    $filename    = basename($_GET['filename']);
    $back_dir    ="file/";
    $file = $back_dir.$filename;
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.$file);
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: public');
            header('Pragma: private');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
    }else {
        echo "File Hilang :((";
    }
}
?>