<?php

if (isset($_POST['doc_name'])) {
    include("connect.php");
    $date1 = date("Ymd_His");
    $numrand = (mt_rand());
    $doc_file = (isset($_POST['doc_file']) ? $_POST['doc_file'] : '');
    $upload = $_FILES['doc_file']['name'];

    if ($upload != '') {
        $typefile = strrchr($_FILES['doc_file']['name'], ".");
        if ($typefile == '.pdf') {
            $path = "docs/";
            $newname = 'doc_' . $numrand . $date1 . $typefile;
            $path_copy = $path . $newname;
            move_uploaded_file($_FILES['doc_file']['tmp_name'], $path_copy);
            $doc_name = $_POST['doc_name'];
            $stmt = $conn->prepare("insert into tbl_pdf (doc_name, doc_file) values (:doc_name, '$newname')");
            $stmt->bindParam(':doc_name', $doc_name, PDO::PARAM_STR);
            $result = $stmt->execute();
            $conn = null;
            if ($result) {
                echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "อัพโหลดไฟล์เอกสารสำเร็จ",
                          type: "success"
                      }, function() {
                          window.location = "upload_pdf.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            } else {
                echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "เกิดข้อผิดพลาด",
                          type: "error"
                      }, function() {
                          window.location = "upload_pdf.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            }


        } else {
            echo '<script>
                         setTimeout(function() {
                          swal({
                              title: "คุณอัพโหลดไฟล์ไม่ถูกต้อง",
                              type: "error"
                          }, function() {
                              window.location = "upload_pdf.php"; //หน้าที่ต้องการให้กระโดดไป
                          });
                        }, 1000);
                    </script>';
        }
    }
}

?>