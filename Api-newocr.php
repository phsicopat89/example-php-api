<?php
	###################################################### ADD IMAGES #############################################################
	
	$inputnya = realpath('./CaptchaGenerator.aspx');   //example images	
	
	
	
	
	####################################################### open url ##############################################################
	
	$ch = curl_init();
	
	$header1[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
	$header1[] = 'Accept-Encoding: gzip, deflate';
	$header1[] = 'Accept-Language: en-US,en;q=0.5';
	$header1[] = 'Cache-Control: max-age=0';
	$header1[] = 'Connection: keep-alive';
	$header1[] = 'Host: www.newocr.com';
	$header1[] = 'User-Agent: Mozilla/5.0  (X11; Windows; U; Windows NT 5.1; en-US; Ubuntu; Linux i686; rv:26.0) Gecko/20100101 Firefox/26.0 ';
	$header1[] = 'x-insight: activate';
	
	$cookie1[] = '__utma=90949509.993409455.1392491829.1393356120.1393360279.4';
	$cookie1[] = '__utmz=90949509.1392491829.1.1.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided)';	
	$cookie1[] = '__atuvc=14%7C8%2C3%7C9';
	$cookie1[] = 'PHPSESSID=0beavrvv80r3v9vivtbcralr66';
	$cookie1[] = '__utmc=90949509';
	$cookie1[] = '__utmb=90949509.2.10.1393360279';
	
	$target = 'http://www.newocr.com';
	     	
	curl_setopt($ch, CURLOPT_URL,'http://www.newocr.com');
	curl_setopt($ch, CURLOPT_REFERER, 'http://www.newocr.com/');
	curl_setopt($ch, CURLOPT_HEADER,$header1);
	
	curl_setopt($ch, CURLOPT_COOKIE, $cookie1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
	$show = curl_exec($ch);
	
	#################################################################### UPLOAD DATA ###########################################
	

	$post_params['userfile'] = '@'.$inputnya;
	$post_params['url'] = '';
	$post_params['l'] = 'ind';
	$post_params['preview'] = '1';
	curl_setopt($ch, CURLOPT_URL,'http://www.newocr.com');
	curl_setopt($ch, CURLOPT_REFERER, 'http://www.newocr.com/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_params);
	 	
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0); 
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$show = curl_exec($ch);
	
	curl_setopt($ch, CURLOPT_URL,$target);
	curl_setopt($ch, CURLOPT_REFERER, $target."/");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
	$show = curl_exec($ch);
	

	
	curl_setopt($ch, CURLOPT_URL,'http://www.newocr.com');
	curl_setopt($ch, CURLOPT_REFERER, 'http://www.newocr.com/');

	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
	$show = curl_exec($ch);
	
	############################################################ DYNAMIC CHANGE HEADER ##################################################
	
	preg_match('/<footer>.*?<\/footer>/si',$show,$tampil);
	preg_match_all('/<p>.*?<\/p>/si',$tampil[0],$tampil2);
	$nilaiu = strip_tags($tampil2[0][1]);
	$nilaibnr = explode("http://newocr.com/newocr/uploads/",$nilaiu);
	//echo $nilaibnr[1];
	

	
	$inputlagi['l'] = 'ind';
	$inputlagi['r'] = '0';
	$inputlagi['psm'] = '6';
	$inputlagi['u'] =  $nilaibnr[1];
	$inputlagi['x1'] = '29';
	$inputlagi['x2'] = '89';
	$inputlagi['y1'] = '14';
	$inputlagi['y2'] = '38';
	$inputlagi['ocr'] = '1';
	
	curl_setopt($ch, CURLOPT_URL,'http://www.newocr.com');
	curl_setopt($ch, CURLOPT_REFERER, 'http://www.newocr.com/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $inputlagi);
	
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0); 
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
	$show = curl_exec($ch);
	
	
	preg_match_all('/<textarea id="ocr-result" rows="10" style="width:100%;white-space:nowrap;">.*?<\/textarea>/si',$show,$asli);
	
	$outputimg = strip_tags($asli[0][0]);
	
	
	######################################################### OUTPUT IMAGES AFTER CONVERT ############################################
	
	
	echo $outputimg;
	
	######################################################### enjoy it ###############################################################
?>
