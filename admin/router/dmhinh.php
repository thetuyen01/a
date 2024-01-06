<?php 
    include_once 'controller/dmhinh/dmhinh.php';
    $dmhinh = new Dmhinh();
    // thêm menu
    if (isset($_GET['method'])&& $_GET['method']=="add"){
        if (isset($_POST['dang'])) {
            $tendmmenu = $_POST['tendmhinh'];
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
                    $dmhinh->createDmhinh($tendmmenu, $file_image);
                } else {
                    echo "Không thể di chuyển file.";
                }
            } else {
                echo "Lỗi khi upload file.";
            }
        }
        else{
            include_once "view/dmhinh/add_dmhinh.php";
        };
    // lấy danh sách menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="get"){
        $dmhinh->showDmhinh();
    // chỉnh sửa menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="edit"){
        if(isset($_GET['id_dmhinh'])){
            if (isset($_POST['capnhat'])){
                $tendmhinh = $_POST['tendmhinh'];
                $file_image = $_FILES['image'];
                $id_dmmenu = $_GET['id_dmhinh'];
                $dmhinh ->edit($id_dmmenu, $tendmhinh,$file_image);
            }else{
                $dmhinh -> showOne_dmhinh((int)$_GET['id_dmhinh']);
            }
        }
    //xóa menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="delete"&&$_GET['id_dmhinh']){
       $dmhinh ->delete((int)$_GET['id_dmhinh']);
    }
?>