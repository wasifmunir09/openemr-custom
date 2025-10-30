<?php echo $GLOBALS['webroot']; ?> <?php
// Simple Logo Uploader for SpectrumEHR
$upload_dir = '/home/u3000-yqmyhvguypfd/www/ryanj95.sg-host.com/public_html/openemr/sites/default/images/';
$allowed_extensions = ['png', 'jpg', 'jpeg', 'gif'];
$max_file_size = 5 * 1024 * 1024; // 5MB

$response = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['logo'])) {
    $file = $_FILES['logo'];
    $file_name = basename($file['name']);
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    
    if ($file_size > $max_file_size) {
        $response = "File too large. Maximum size: 5MB";
    } elseif (!in_array($file_ext, $allowed_extensions)) {
        $response = "Invalid file type. Allowed: PNG, JPG, JPEG, GIF";
    } elseif (!is_dir($upload_dir)) {
        $response = "Upload directory doesn't exist: " . $upload_dir;
    } else {
        $old_logo = $upload_dir . 'logo_1.png';
        if (file_exists($old_logo)) {
            copy($old_logo, $upload_dir . 'logo_1.png.backup.' . date('YmdHis'));
        }
        
        $new_logo_path = $upload_dir . 'logo_1.png';
        
        if (move_uploaded_file($file_tmp, $new_logo_path)) {
            chmod($new_logo_path, 0644);
            $response = "Logo uploaded successfully!";
            $success = true;
        } else {
            $response = "Failed to move uploaded file";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>SpectrumEHR Logo Uploader</title>
    <style>
        body { font-family: Arial; background: #f5f5f5; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .container { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.1); max-width: 500px; text-align: center; }
        h1 { color: #333; margin-bottom: 20px; }
        .upload-area { border: 2px dashed #667eea; padding: 30px; border-radius: 8px; cursor: pointer; margin: 20px 0; }
        .upload-area:hover { background: #f9f9f9; }
        input[type="file"] { display: none; }
        .btn { background: #667eea; color: white; padding: 12px 30px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; width: 100%; }
        .btn:hover { background: #764ba2; }
        .message { padding: 15px; margin: 20px 0; border-radius: 5px; }
        .success { background: #d4edda; color: #155724; }
        .error { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <div class="container">
        <h1>SpectrumEHR Logo Uploader</h1>
        <?php if ($response): ?>
            <div class="message <?php echo $success ? 'success' : 'error'; ?>">
                <?php echo $response; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="upload-area" onclick="document.getElementById('logoInput').click()">
                <p>Click to upload logo or drag and drop</p>
                <p style="font-size: 12px; color: #999;">PNG, JPG, JPEG, GIF (Max 5MB)</p>
            </div>
            <input type="file" id="logoInput" name="logo" accept="image/*" onchange="document.forms[0].submit()">
            <button type="submit" class="btn">Upload Logo</button>
        </form>
    </div>
</body>
</html>
