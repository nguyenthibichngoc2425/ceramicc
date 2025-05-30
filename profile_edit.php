<?php
include 'includes/session.php';

$conn = $pdo->open();

if(isset($_POST['edit'])) {
    // Lấy dữ liệu POST
    $curr_password = $_POST['curr_password'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $address = $_POST['address'] ?? '';
    $photo = $_FILES['photo']['name'] ?? '';

    // Kiểm tra mật khẩu hiện tại
    if(password_verify($curr_password, $user['password'])) {
        // Xử lý ảnh đại diện mới nếu có
        if(!empty($photo)) {
            $ext = pathinfo($photo, PATHINFO_EXTENSION);
            $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
            if(!in_array(strtolower($ext), $allowed_ext)) {
                $_SESSION['error'] = 'Invalid image format.';
                header('location: profile.php');
                exit();
            }
            $filename = uniqid() . '.' . $ext;
            if(!move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $filename)) {
                $_SESSION['error'] = 'eImage loading error.';
                header('location: profile.php');
                exit();
            }
            // Xóa ảnh cũ nếu cần thiết
            if(!empty($user['photo']) && file_exists('images/' . $user['photo'])) {
                unlink('images/' . $user['photo']);
            }
        } else {
            $filename = $user['photo'];
        }

        // Nếu không đổi mật khẩu, giữ nguyên hash cũ
        if(empty($password)) {
            $new_password = $user['password'];
        } else {
            $new_password = password_hash($password, PASSWORD_DEFAULT);
        }

        try {
            $stmt = $conn->prepare("UPDATE users SET email=:email, password=:password, firstname=:firstname, lastname=:lastname, contact_info=:contact, address=:address, photo=:photo WHERE id=:id");
            $stmt->execute([
                ':email' => $email,
                ':password' => $new_password,
                ':firstname' => $firstname,
                ':lastname' => $lastname,
                ':contact' => $contact,
                ':address' => $address,
                ':photo' => $filename,
                ':id' => $user['id']
            ]);

            $_SESSION['success'] = 'suscess';
        } catch(PDOException $e) {
            $_SESSION['error'] = 'error: ' . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = 'failed';
    }
} else {
    $_SESSION['error'] = 'fill all fields';
}

$pdo->close();
header('location: profile.php');
exit();
?>
