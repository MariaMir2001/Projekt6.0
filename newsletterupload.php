<pre><?php

var_dump($_POST);
echo '<strong>$_FILES:</strong><br />';
var_dump($_FILES);

if (!empty($_FILES['image'])) {
    $tmpName = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmpName, __DIR__ . '//bilder/'. uniqid('', true) .'.jpg');
    move_uploaded_file($tmpName, __DIR__ . '/bilder/newslettertest.jpg');
    @chmod(__DIR__ . '/newslettertest.jpg', 0777);
   
    @chmod(__DIR__ . '//bilder/'. uniqid('', true) .'.jpg',0777);
    
    var_dump("Es wurde eine Datei übertragen.");
}

?></pre>

<form action="newsletterupload.php" method="POST" enctype="multipart/form-data">
   <button class="btn btn-primary">Beitrag verfassen</button>
    <input type="text" name="Beitrag" /><br />
    <input type="file" name="image" />
    <input type="submit" value="Abschicken!"    class="form-control"/>
</form>




<!-- 
    <pre><?php

var_dump($_POST);
echo '<strong>$_FILES:</strong><br />';
var_dump($_FILES);


if (!empty($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

    if ($_FILES['image']['type'] !== 'image/jpeg') {
        die();
    }

    $tmpName = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmpName, __DIR__ . '/' . $_FILES['image']['name']);
    @chmod(__DIR__ . '/' . $_FILES['image']['name'], 0777);
    var_dump("Es wurde eine Datei übertragen.");
}

?>