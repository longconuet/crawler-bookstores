<?php 
    include('dbCon.php');
    include('simple_html_dom.php');

    $baseUrl = 'http://diachiso.vn/ha-noi?start=';
    for ($page = 1; $page <= 25; $page++) {
        $url = $baseUrl . $page . '&q=nh%C3%A0%20s%C3%A1ch';

        $html = file_get_html($url);
        $stores = $html->find('.row-item');    

        foreach ($stores as $store) {
            $name = $store->find('.image-box-body .listing-name a', 0)->innertext;
            $address = $store->find('.image-box-body .listing-add', 0)->innertext;
            $phone = ($store->find('.contact-items ul li', 1)) ? $store->find('.contact-items ul li', 1)->plaintext : '';

            echo "<pre>".$name . "</pre><br>";
            echo $address . "<br>";
            echo $phone . "<hr>";

            // $sql = "INSERT INTO stores (name, address, phone)
            //         VALUES ('$name', '$address', '$phone')";

            // if (mysqli_query($conn, $sql)) {
            //     echo "New record created successfully";
            // } else {
            //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            // }
        }
    }

?>
