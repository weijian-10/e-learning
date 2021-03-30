<?php
$caesar = "LZW IMAUC TJGOF XGP BMEHK GNWJ LZW DSRQ VGY GX USWKSJ SFV QGMJ MFAIMW KGDMLAGF AK YASJVHVFAWKV"; 
//对整个字符串循环
for ($shift = 1; $shift < 26; $shift++) {
    //遍历字符串的每个字符
    for ($i = 0; $i < strlen($caesar); $i++) {
        if ($caesar[$i] == ' ') {
            echo(' ');
        }
        else {
            //+32是为了转换为小写，便于观察  
            echo(chr( (ord($caesar[$i])+$shift-ord('A')) %26 + ord('A') + 32));
        }
    }
    echo ("\n");
}
?>
