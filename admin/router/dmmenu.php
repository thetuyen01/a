<?php 
    include_once 'controller/dmmenu/dmmenu.php';
    $dmmenu = new Dmmenu();
    // thêm menu
    if (isset($_GET['method'])&& $_GET['method']=="add"){
        if (isset($_POST['dang'])) {
            $menu = $_POST['menu'];
            $tendmmenu = $_POST['tendmmenu'];
            $file_image = basename($_FILES['image']['name']);
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/project/public/media/upload_img/";
            $target_file = $target_dir . $file_image;
            if (file_exists($target_file)) {
                $dot_position = strrpos($file_image, '.');
                if ($dot_position !== false) {
                    // Chia tên file thành phần trước và sau dấu chấm
                    $file_name_before_dot = substr($file_image, 0, $dot_position);
                    $file_name_after_dot = substr($file_image, $dot_position);
                    // Lấy chuỗi ngày tháng năm giờ phút giây
                    $current_datetime = date('YmdHis');
                    // Tạo tên file mới với số (1) được chèn sau dấu chấm
                    $new_file_name = $file_name_before_dot . $current_datetime . $file_name_after_dot;
                
                    $file_image = $new_file_name;
                    $target_file = $target_dir . $file_image;
                } 
            }
            // Kiểm tra lỗi khi upload
            if ($_FILES["image"]["error"] == 0) {
                // Di chuyển file từ thư mục tạm sang thư mục lưu trữ
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // Gọi hàm để tạo dữ liệu
                    $dmmenu->createDmmenu($tendmmenu, (int) $menu, $file_image);
                } else {
                    echo "Không thể di chuyển file.";
                }
            } else {
                echo "Lỗi khi upload file.";
            }
        }
        else{
            $dmmenu -> show_add_dmmenu();
        };
    // lấy danh sách menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="get"){
        if (isset($_GET['search'])){
            
        }else{
            $dmmenu->showDmmenu();
        }
    // chỉnh sửa menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="edit"){
        if(isset($_GET['id_dmmenu'])){
            if (isset($_POST['capnhat'])){
                $tendmmenu = $_POST['tendmmenu'];
                $menu = $_POST['menu'];
                $file_image = $_FILES['image'];
                $id_dmmenu = $_GET['id_dmmenu'];
                $dmmenu ->edit($id_dmmenu, $tendmmenu, $menu, $file_image);
            }else{
                $dmmenu -> showOne_dmmenu((int)$_GET['id_dmmenu']);
            }
        }
    //xóa menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="delete"&&$_GET['id_dmmenu']){
       $dmmenu ->delete((int)$_GET['id_dmmenu']);
    }
?>