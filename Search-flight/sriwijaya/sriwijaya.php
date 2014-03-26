<?php
	$cookie = 'cookies.txt';
	
	$ch = curl_init();
	
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1");   
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);     
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);     
    curl_setopt($ch, CURLOPT_URL, "https://booking.sriwijayaair.co.id/b2c/searchpage.jsp"); 
    $show = curl_exec($ch);
	
	$post_data['isReturn'] = 'false';
	$post_data['from'] = 'SUB';
	$post_data['to'] = 'CGK';
	$post_data['departDate1'] = '08';
	$post_data['departDate2'] = 'Apr 2014';
	$post_data['returnDate1'] = '01';
	$post_data['returnDate2'] = 'Mar 2014';
	$post_data['adult'] = '1';
	$post_data['child'] = '0';
	$post_data['infant'] = '0';
	$post_data['returndaterange'] ='0';
	$post_data['Submit'] ='Cari'; 
	
	curl_setopt($ch, CURLOPT_URL,'https://booking.sriwijayaair.co.id/AvailabilityServlet/');
	curl_setopt($ch, CURLOPT_REFERER, 'https://sriwijayaair.co.id/');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($ch, CURLOPT_COOKIEJAR, $cookie);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);;
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$show = curl_exec($ch); 
	
	
	curl_setopt($ch, CURLOPT_URL,'https://booking.sriwijayaair.co.id/b2c/availability.jsp');
	$show = curl_exec($ch);
	
	echo $show;
?>