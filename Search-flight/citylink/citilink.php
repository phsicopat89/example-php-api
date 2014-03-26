<?php
	$ch = curl_init();
	
	
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1");   
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);     
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);     
    curl_setopt($ch, CURLOPT_URL, "https://book.citilink.co.id/Search.aspx"); 
    $show = curl_exec($ch);
		
	$day1 = '31'; 
	$tanggal1 =  '2014-03-31' ;
	$bulan1 = '2014-03';
	$day2 = '25';
	$tanggal2 =  '2014-03-25' ;
	$bulan2 = '2014-25';
	$tujuan1 = 'SUB';
	$tujuan2 = 'CGK';
	$ret1 = '';
	$ret2 = '';
	$dewasa = '1';
	$bayi = '0';
	$tua = '0';

	$cari = '__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE=%2FwEPDwUBMGRkBsrCYiDYbQKCOcoq%2FUTudEf14vk%3D&pageToken=&AvailabilitySearchInputSearchVieworiginStation1=SUB&AvailabilitySearchInputSearchView%24TextBoxMarketOrigin1=SUB&AvailabilitySearchInputSearchViewdestinationStation1=CGK&AvailabilitySearchInputSearchView%24TextBoxMarketDestination1=CGK&AvailabilitySearchInputSearchVieworiginStation2=&AvailabilitySearchInputSearchView%24TextBoxMarketOrigin2=&AvailabilitySearchInputSearchViewdestinationStation2=&AvailabilitySearchInputSearchView%24TextBoxMarketDestination2=&AvailabilitySearchInputSearchView%24DropDownListMarketDay1=30&AvailabilitySearchInputSearchView%24DropDownListMarketMonth1=2014-03&date_picker=2014-03-30&AvailabilitySearchInputSearchView%24DropDownListMarketDay2=25&AvailabilitySearchInputSearchView%24DropDownListMarketMonth2=2014-03&date_picker=2014-03-25&AvailabilitySearchInputSearchView%24RadioButtonMarketStructure=OneWay&AvailabilitySearchInputSearchView%24DropDownListPassengerType_ADT=1&AvailabilitySearchInputSearchView%24DropDownListPassengerType_CHD=0&AvailabilitySearchInputSearchView%24DropDownListPassengerType_INFANT=0&AvailabilitySearchInputSearchView%24DdlCurrencyDynamic=IDR&AvailabilitySearchInputSearchView%24DropDownListSearchBy=columnView&AvailabilitySearchInputSearchView%24ButtonSubmit=Find+Flights';
	
	$cookie = 'cookies.txt';
	
	

	

	curl_setopt($ch, CURLOPT_URL,'https://book.citilink.co.id/Search.aspx');
	curl_setopt($ch, CURLOPT_REFERER, 'https://book.citilink.co.id');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $cari);
	curl_setopt ($ch, CURLOPT_COOKIEJAR, $cookie);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);;
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$show = curl_exec($ch);  	
	
	curl_setopt($ch, CURLOPT_URL,'https://book.citilink.co.id/ScheduleSelect.aspx');
	$show = curl_exec($ch); 
	
	
	############################  Regex dom ################
	include "simplehtmldom/simple_html_dom.php";
	
	$html = new simple_html_dom();
	/*
	$html->load($show, true, false);
	
	
	foreach($html->find('td[class="fareCol2"]') as $ganjil)
	
	
	
	foreach($html->find('td[class="center"]') as $genap=>$nil)
	
		
			echo $nil->innertext();
	*/	
	
	
	 //$genap->innertext();
	
	//echo $show; <input id="ControlGroupScheduleSelectView_AvailabilityInputScheduleSelectView_RadioButtonMkt1Fare4" type="radio" name="ControlGroupScheduleSelectView$AvailabilityInputScheduleSelectView$market1" value="0~R~~R~RGFR~~1~X|QG~ 816~ ~~SUB~03/30/2014 05:05~CGK~03/30/2014 06:35~">
	
	
	preg_match_all('/<tr class="altRowItem">.*?<\/tr>/sim',$show,$hasil);
	
	
	for($a = 0; $a <=4; $a++)
	{
		$tampil =  $hasil[0][$a];
		
		echo $tampil;
	}
	
	
	
	
	
	
	

?>