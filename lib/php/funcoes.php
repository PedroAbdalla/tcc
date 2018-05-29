<?php
function msg($msg, $tipo)
{
	?>
    <div class="row">
        <div class="col-xs-10 col-sm-6 col-xs-offset-1 col-sm-offset-3 div-msg div-msg-<?= $tipo_msg ?>">
            <div class="text-right">
                <span class="glyphicon glyphicon-remove-circle" onclick="fecharMsg()"></span>
            </div>
            <h4 class="text-center <?= $tipo ?> "><?= $msg ?></h4>
        </div>
    </div>

    <?php
    unset($_SESSION['msg']);
    unset($_SESSION['tipo_msg']);
}

/**
 * Recursively copy files from one directory to another
 * 
 * @param String $src - Source of files being moved
 * @param String $dest - Destination of files being moved
 */
function rcopy($src, $dest){

    // If source is not a directory stop processing
    if(!is_dir($src)) false;

    // If the destination directory does not exist create it
    if(!is_dir($dest)) { 
        if(!mkdir($dest)) {
            // If the destination directory could not be created stop processing
            return false;
        }    
    }

    // Open the source directory to read in files
    $i = new DirectoryIterator($src);
    foreach($i as $f) {
        if($f->isFile()) {
            copy($f->getRealPath(), "$dest/" . $f->getFilename());
        } else if(!$f->isDot() && $f->isDir()) {
            rcopy($f->getRealPath(), "$dest/$f");
        }
    }
}