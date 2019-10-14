
<form enctype="multipart/form-data" action="upload.php" method="post">
    <label>Image ou pdf :</label>
    <input type="file" name="img_or_pdf"/>
    <input type="submit" value="upload" />
</form>

<?php
if ($dir = opendir("./images")) {
    echo 'IMAGES :<br/>';
    echo '<ul>';
    while($file = readdir($dir)) {
        if (!($file == '.' || $file == '..')) echo '<li><a onmouseover="this.textContent=<img src="images/'.$file.'"> href="images/'.$file . '">'.$file.'</a>';
    }
    echo '</ul>';
    echo '<br/>';
    closedir($dir);
}

if ($dir = opendir("./pdf")) {
    echo 'PDF :<br/>';
    echo '<ul>';
    while($file = readdir($dir)) {
        if (!($file == '.' || $file == '..')) echo '<li><a href="pdf/'.$file . '">'.$file.'</a>';
    }
    echo '</ul>';
    closedir($dir);
}

?>
<script>

</script>

