<?php
  $server_name = 'localhost';
  $db_name = 'test';

  // mysqli 的四個參數分別為：伺服器名稱、帳號、密碼、資料庫名稱
  $conn = new mysqli($server_name, $username, $password, $db_name);

  if (!empty($conn->connect_error)) {
    die('資料庫連線錯誤:' . $conn->connect_error);    // die()：終止程序
  }
  $datas = array();
  $anti_list = array();
  // sql語法存在變數中
  $sql = "SELECT * FROM `anti` WHERE 1"; 
  $result = mysqli_query($conn,$sql);
  if ($result) {
    // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
    if (mysqli_num_rows($result)>0) {
        // 取得大於0代表有資料
        // while迴圈會根據資料數量，決定跑的次數
        // mysqli_fetch_assoc方法可取得一筆值
        while ($row = mysqli_fetch_assoc($result)) {
            // 每跑一次迴圈就抓一筆值，最後放進data陣列中
            $datas[] = $row;
        }
    }
    // 釋放資料庫查到的記憶體
    mysqli_free_result($result);
  }
  else {
      echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
  }
  if(!empty($result)){
    // 如果結果不為空，就利用print_r方法印出資料
    //print_r($datas);
    foreach($datas as &$data){
      $anti_list[] = $data['name'];
      $name = $data['name'];
        //echo "<p> $name </p>";
      
    }
}
else {
    // 為空表示沒資料
    echo "查無資料";
}
?>
