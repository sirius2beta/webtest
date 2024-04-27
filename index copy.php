<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <?php include 'query.php';?>
    <title>AntiCal</title>
</head>
<body>
    <h1>Anti calculator</h1>
    <div class="main">
        <div class="crclBlock">
            <div class="crclPanel">
                <div class="ant-opt">
                    <label for="age">Age</label>
                    <input type="text" name="age" placeholder="輸入年齡" id="age" value="<?php echo $_GET['age'];?>">
                </div>
                <div class="ant-opt">
                    <label>Gender</label>
                    <select name="gender" id="gender">
                        <option value="male">男</option>
                        <option value="female">女</option>
                        
                    </select>
                </div>
                <div class="ant-opt">
                    <label for="weight">Weight</label>
                    <input type="text" name="weight" placeholder="輸入體重" id="weight" value="<?php echo $_GET['weight'];?>">
                </div>
                <div class="ant-opt">
                    <label for="cr">Cr</label>
                    <input type="text" name="cr" placeholder="輸入cr" id="cr" value="<?php echo $_GET['cr'];?>">
                </div>
            </div>
            <div class="resultPanel">
                <p>Result</p>
                <p class="p-align-rt" id="crcl">CrCl: 請填入上方欄位</p>
            </div>
        </div>
        <div id="antiPanel" class="antiPanel">
            <h2 class="dose">建議劑量:</h2>
            <div class="ant-opt">
                <label>Anti</label>
                <select class="dev" name="anti" id="anti">
                    <?php
                        $antis = array('brosym', 'baktar', 'neomycin');
                        $anti_selected = '';
                        foreach($datas as &$data){
                            
                            $selected = '';
                            $anti = $data['name'];
                            if($_GET['anti'] == $anti){
                                $selected = 'selected';
                                $anti_selected = $data;
                            }
                            echo "<option value ='$anti' $selected>$anti</option>";
                        }
                    ?>
                </select>
            </div>
            
            <p class="p-note">*under development</p>
            
            <div class="dosage_suggest">
                <p><?php
                    echo $anti_selected['adult_dose'];
                ?></p>
            </div>
            <form action="index.php" id="anti_form" method="get" hidden>
                <input type="text" name="crcl" value="0" id="crcl_form">
                <input type="text" id="anti_type" value="0" name="anti">
            </form>
        </div>
    </div>
    
    
    <div class="footer-wrap" hidden>
        <footer>
            &copy; Copyright 2024 TPECHRebuildProject
        </footer>
    </div>
    <script src="index.js"></script>
</body>

</html>