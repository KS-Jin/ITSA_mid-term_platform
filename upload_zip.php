<?php

set_time_limit(0);
$pic_name = array();//上傳後,所有圖片檔名
$uploads_dir = 'zips';//存放上傳檔案資料夾
foreach ($_FILES["ff"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["ff"]["tmp_name"][$key];
        $name = $_FILES["ff"]["name"][$key];
        $dir_name = pathinfo($name, PATHINFO_DIRNAME);
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        if($ext !== 'zip' && $ext !== '7z' && $ext !== 'tar' && $ext !== 'rar'){
            continue;
        }
        $new_name = preg_replace('/[^\w]/', '', $name); // 接收到的檔名,只留英文和數字字元
        $new_name = $name ;
        $res = move_uploaded_file($tmp_name, "$uploads_dir/$new_name");
        if($res){
            $pic_name[] = $new_name;
        }
        
    }
}

echo json_encode($pic_name); // 檔名以 JSON 輸出
?>
