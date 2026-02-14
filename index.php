<?php
// OBLIVION UPLOAD ENGINE v1.0
$target_dir = "uploads/"; // Folder tempat simpen file lu

// Bikin folder 'uploads' otomatis kalau belum ada
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

if(isset($_POST["submitr"])) {
    $file_count = count($_FILES);
    $success = 0;

    for($i=1; $i<=$file_count; $i++) {
        $key = "file_" . $i . "_";
        if(isset($_FILES[$key]) && $_FILES[$key]["error"] == 0) {
            $target_file = $target_dir . basename($_FILES[$key]["name"]);
            if (move_uploaded_file($_FILES[$key]["tmp_name"], $target_file)) {
                $success++;
                echo "<p style='color:cyan;'>[SYSTEM] File " . $_FILES[$key]["name"] . " Berhasil Di-Injeksi!</p>";
            }
        }
    }
    
    if($success > 0) {
        echo "<h2 style='color:white;'>TOTAL DATA CAPTURED: $success</h2>";
        echo "<a href='index.html' style='color:yellow;'>KEMBALI KE DASHBOARD</a>";
    } else {
        echo "<p style='color:red;'>[ERROR] Gagal Upload. Pastikan folder 'uploads' bisa ditulis!</p>";
    }
}
?>
