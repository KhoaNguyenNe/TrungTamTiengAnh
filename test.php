<html>
    <head>
        <title>Test QR</title>
    </head>
    <body>
        <?php
        if($_POST['ziller']) {
        $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://bio.ziller.vn/api/qr/add",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 2,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer 0f88bcc5320a390efc4ec202793befd0",
                    "Content-Type: application/json",
                ),
                CURLOPT_POSTFIELDS => json_encode(
                        array (
                            'type' => 'text',
                            'data' => ' 2|99|0817120130|Bui Khanh Dang||0|0|'.$_POST['ST'].'|'.$_POST['ND'].'|tranfer_myqr',
                            'background' => 'rgb(255,255,255)',
                            'foreground' => 'rgb(0,0,0)',
                            'logo' => 'https://img.ziller.vn/ib/C4IW2iAqc9.png',
                        )
                    ),
                )
            );
            
            $response = curl_exec($curl);
            curl_close($curl);

            //var_dump($response);
    $dan = json_decode($response);
    echo $dan->link;
        }
        ?>
        <form action="#" method="post">
            <label for="ST">Số tiền: </label>
            <input type="text" name="ST" id="">

            <label for="ND">Nội Dung: </label>
            <input type="text" name="ND" id="">

            <button type="submit" name="ziller" value="Tạo QR">Tạo QR </button>
        </form>
    </body>
    <img src="<?=$dan->link;?>" alt="Image">
</html>