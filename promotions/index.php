<?php
error_reporting(E_ALL);
date_default_timezone_set('America/Los_Angeles');
?>
<?php
function isUserAtKALX ($stringip) {
    $longip = ip2long($stringip);
    if ($longip == -1 || $longip === FALSE) {
        return false;
    } else {
        if ($longip >= ip2long('169.229.148.84') and $longip <= ip2long('169.229.148.89')) {
            return true;
        } else {
            return false;
        }
    }
}

function showHeader () {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--

Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Title      : Mr. Techie
Version    : 1.0
Released   : 20070822
Description: Three-column blog design with the third column allocated for ads. Features Web 2.0 design ideal for 1024x768 resolutions.

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>KALX Staff : Promotions : Create A Promotion</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../common/default.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" language="javascript">
    function makeRequest(url,postFields) {
        var httpRequest;

        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
            httpRequest = new XMLHttpRequest();
            if (httpRequest.overrideMimeType) {
                httpRequest.overrideMimeType('text/xml');
            }
        } 
        else if (window.ActiveXObject) { // IE
            try {
                httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
                } 
                catch (e) {
                           try {
                                httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                               } 
                             catch (e) {}
                          }
                                       }

        if (!httpRequest) {
            alert('Giving up :( Cannot create an XMLHTTP instance');
            return false;
        }
        httpRequest.onreadystatechange = function() { processResponse(httpRequest); };
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.open('POST', url, true);
        httpRequest.send(postFields);
    }

    function processResponse(httpRequest) {

        if (httpRequest.readyState == 4) {
            if (httpRequest.status == 200) {
                alert(httpRequest.responseText);
            } else {
                alert('There was a problem with the request.');
            }
        }

    }
    function showDJTicketPairs(){
        for (i=1;i<=5;i++)
        {
            elem = document.getElementById("numberOfTickets" + i);
            if (i<=(+document.createPromotion.tickets.value))
            {
                elem.style.display = "block";
            }
            else
            {
                elem.style.display = "none";
                elemDate = document.getElementById("djDate" + i);
                elemName = document.getElementById("djName" + i);
                elemDate.value="";
                elemName.value="";
            }
        }
    }
    function validateForm(thisform){
        with (thisform){
            if (isDate(date)==false){
                date.focus()
                return false;
            }
            if (isTime(time)==false){
                time.focus()
                return false
            }
        }
        for (i=1;i<=(+thisform.tickets.value);i++)
        {
            elemDate = document.getElementById("djDate" + i)
            if (elemDate.value!="ANY" && isDate(elemDate)==false){
                elemDate.focus()
                return false;
            }
        }
    }
    function isDate(input){
        var re = /^(\d{1,2})\/(\d{1,2})\/(\d{2,4})$/; //Basic check for format validity
        var retval=false
        if(input.value != '') {
            if(regs = input.value.match(re)) {
                if (regs[3].length == 2) {
                    regs[3]="20"+regs[3]
                }
                var dayobj = new Date(regs[3], regs[1]-1, regs[2])
                if ((dayobj.getMonth()+1==regs[1])&&(dayobj.getDate()==regs[2])&&(dayobj.getFullYear()==regs[3]))
                    retval=true
            }
        } else {
            retval=true
        }
        if (retval==false) {
            input.select()
            alert("Incorrect date format. Use something like 2/27/07")
        }
        return retval
    }

    function isTime(input)
    {
        // regular expression to match required time format
        re = /^(\d{1,2}):(\d{2})(:00)? ?([apAP][mM])?$/;
        var retval=false

        if(input.value != '') {
            if(regs = input.value.match(re)) {
                if(regs[4]) {
                    // 12-hour time format with am/pm
                    if(regs[1] >= 1 && regs[1] <= 12) {
                        retval=true
                    }
                } else {
                    // 24-hour time format
                    if(regs[1] <= 23) {
                        retval=true
                    }
                }
                if(retval==true && regs[2] <= 59) {
                    retval=true
                }
            }
        } else {
            retval=true
        }

        if (retval==false) {
            input.select()
            alert("Incorrect time format. Use something like 9:00 PM");
        }
        return retval
    }
</script>
</head>
<body onload="showDJTicketPairs();">
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="#">KALX Staff</a></h1>
		<p>Promotions</a></p>
	</div>
<!--
	<div id="rss"><a href="#">Subscribe to RSS Feed</a></div>
	<div id="search">
		<form id="searchform" method="get" action="">
			<fieldset>
				<input type="text" name="s" id="s" size="15" value="" />
				<input type="submit" id="x" value="Search" />
			</fieldset>
		</form>
	</div>
-->
</div>
<!-- end header -->
<!-- star menu -->
<div id="menu">
	<ul>
		<li><a href="#">Home</a></li>
		<li class="current_page_item"><a href="../promotions/index.php?action=createPromotion">Promotions</a></li>
		<li><a href="#">Production</a></li>
		<li><a href="#">Special Events</a></li>
		<li><a href="#">Publicity</a></li>
		<li><a href="#">Music</a></li>
	</ul>
</div>
<!-- end menu -->
<!-- start page -->
<div id="page">
	<!-- start ads -->
<!--
	<div id="ads"><a href="#"><img src="images/ad160x600.gif" alt="" width="160" height="600" /></a></div>
-->
	<!-- end ads -->
	<!-- start content -->
	<div id="content">
		<div class="post">
			<div class="title">
				<h2><a href="#">Create A Promotion</a></h2>
			</div>
			<div class="entry">
<?php
}
function showFooter () {
?>
			</div>
		</div>
	</div>
	<!-- end content -->
</form>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
<!--
	<p class="legal">
		&copy;2007 Mr. Techie. All Rights Reserved.
		&nbsp;&nbsp;&bull;&nbsp;&nbsp;
		Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>
		&nbsp;&nbsp;&bull;&nbsp;&nbsp;
		Icons by <a href="http://famfamfam.com/">FAMFAMFAM</a>. </p>
-->
	<p class="links">
		<a href="http://validator.w3.org/check/referer" class="xhtml" title="This page validates as XHTML">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a>
		&nbsp;&bull;&nbsp;
		<a href="http://jigsaw.w3.org/css-validator/check/referer" class="css" title="This page validates as CSS">Valid <abbr title="Cascading Style Sheets">CSS</abbr></a>
	</p>
</div>
<!-- end footer -->
</body>
</html>
<?php
}
function showFormPage1 () {
?>


<form method="POST" name="createPromotion" action="<?php $_SERVER['PHP_SELF']?>" onsubmit="return validateForm(this)" target="pdf">
<input type="hidden" name="action" value="createPromotion" />
<label for="eventNameLine1">Event Name :</label>
<input type="text" size="60" name="eventNameLine1" id="eventNameLine1" value="<?php if (isset($_POST['eventNameLine1'])) {echo $_POST['eventNameLine1'];}?>" /><br />
<input type="text" size="60" name="eventNameLine2" id="eventNameLine2" value="<?php if (isset($_POST['eventNameLine2'])) {echo $_POST['eventNameLine2'];}?>" /><br />
<input type="text" size="60" name="eventNameLine3" id="eventNameLine3" value="<?php if (isset($_POST['eventNameLine3'])) {echo $_POST['eventNameLine3'];}?>" /><br />

<label for="eventDescription">Event Genre / Description :</label>
<input type="text" size="60" name="eventDescription" id="eventDescription" value="<?php if (isset($_POST['eventDescription'])) {echo $_POST['eventDescription'];}?>" /><br />

<label for="venue">Venue Name :</label>
<input type="text" size="60" name="venue" id="venue" value="<?php if (isset($_POST['venue'])) {echo $_POST['venue'];}?>" /><br />

<label for="address">Venue Address :</label>
<input type="text" size="60" name="address" id="address" value="<?php if (isset($_POST['address'])) {echo $_POST['address'];}?>" /><br />

<label for="date">Date :</label>
<input type="text" size="10" name="date" id="date" value="<?php if (isset($_POST['date'])) {echo $_POST['date'];}?>" /><br />

<label for="time">Time :</label>
<input type="text" size="8" name="time" id="time" value="<?php if (isset($_POST['time'])) {echo $_POST['time'];}?>" /><br />

<label for="instructions">Special Instructions :</label>
<input type="text" size="60" name="instructions" id="instructions" value="<?php if (isset($_POST['instructions'])) {echo $_POST['instructions'];}?>" /><br />

<label for="age">Age Restrictions :</label>
<select title="Please choose the age restriction for the event" name="age" id="age">
<option <?php if (isset($_POST['age']) && $_POST['age'] == '21+') {echo 'selected="selected"';}?> value="21+">21+</option>
<option <?php if (isset($_POST['age']) && $_POST['age'] == '18+') {echo 'selected="selected"';}?> value="18+">18+</option>
<option <?php if (isset($_POST['age']) && $_POST['age'] == 'All Ages') {echo 'selected="selected"';}?> value="All Ages">All Ages</option>
</select><br />

<label for="wheelchair">Wheelchair Accessible?</label>
<input type="checkbox" <?php if (isset($_POST['wheelchair']) && $_POST['wheelchair'] == 'Yes') {echo 'checked="checked"';}?> title="Select if the event is wheelchair accessible or not" name="wheelchair" id="wheelchair" value="Yes" /><br />

<label for="tickets">How many pairs of tickets would you like to give away?</label>
<select title="How many pairs of tickets would you like to give away?" name="tickets" id="tickets" onChange="showDJTicketPairs()">
<option <?php if (isset($_POST['tickets']) && $_POST['tickets'] == '1') {echo 'selected="selected"';}?> value="1">1</option>
<option <?php if (isset($_POST['tickets']) && $_POST['tickets'] == '2') {echo 'selected="selected"';}?> value="2">2</option>
<option <?php if (isset($_POST['tickets']) && $_POST['tickets'] == '3') {echo 'selected="selected"';}?> value="3">3</option>
<option <?php if (isset($_POST['tickets']) && $_POST['tickets'] == '4') {echo 'selected="selected"';}?> value="4">4</option>
<option <?php if (isset($_POST['tickets']) && $_POST['tickets'] == '5') {echo 'selected="selected"';}?> value="5">5</option>
</select><br />

<label for="promotionsRep">KALX Promotions Contact Person :</label>
<input type="text" size="60" name="promotionsRep" id="promotionsRep" value="<?php if (isset($_POST['promotionsRep'])) {echo $_POST['promotionsRep'];}?>" /><br />

<!--
<label for="venueRep">Venue Contact Person :</label>
<input type="text" size="60" name="venueRep" id="venueRep" value="<?php if (isset($_POST['venueRep'])) {echo $_POST['venueRep'];}?>" /><br />

<label for="venuePhone">Venue Phone Number :</label>
<input type="text" size="60" name="venuePhone" id="venuePhone" value="<?php if (isset($_POST['venuePhone'])) {echo $_POST['venuePhone'];}?>" /><br />
-->
<label for="promotionsRepPhone">Contact Phone Number :</label>
<input type="text" size="60" name="promotionsRepPhone" id="promotionsRepPhone" value="<?php if (isset($_POST['promotionsRepPhone'])) {echo $_POST['promotionsRepPhone'];}?>" /><br />

<hr />
<p>Enter the names and show dates of any DJ's that you would like to assign tickets to.
You're not required to assign tickets to DJ's. You can find DJ's show schedules <a href="http://kalx.berkeley.edu/schedule">here</a>.
You can either enter "ANY" or leave the fields blank if you don't want to assign tickets.
</p>
<div id="numberOfTickets1" style="display: none;">
1 : <label for="djDate1">Show date : </label>
<input type="text" size="10" name="djDate1" id="djDate1" value="<?php if (isset($_POST['djDate1'])) {echo $_POST['djDate1'];}?>" /><br />
<label for="djName1">DJ Name : </label>
<input type="text" size="30" name="djName1" id="djName1" value="<?php if (isset($_POST['djName1'])) {echo $_POST['djName1'];}?>" /><br />
</div>

<div id="numberOfTickets2" style="display: none;">
2 : <label for="djDate1">Show date : </label>
<input type="text" size="10" name="djDate2" id="djDate2" value="<?php if (isset($_POST['djDate2'])) {echo $_POST['djDate2'];}?>" /><br />
<label for="djName2">DJ Name : </label>
<input type="text" size="30" name="djName2" id="djName2" value="<?php if (isset($_POST['djName2'])) {echo $_POST['djName2'];}?>" /><br />
</div>

<div id="numberOfTickets3" style="display: none;">
3 : <label for="djDate1">Show date : </label>
<input type="text" size="10" name="djDate3" id="djDate3" value="<?php if (isset($_POST['djDate3'])) {echo $_POST['djDate3'];}?>" /><br />
<label for="djName3">DJ Name : </label>
<input type="text" size="30" name="djName3" id="djName3" value="<?php if (isset($_POST['djName3'])) {echo $_POST['djName3'];}?>" /><br />
</div>

<div id="numberOfTickets4" style="display: none;">
4 : <label for="djDate1">Show date : </label>
<input type="text" size="10" name="djDate4" id="djDate4" value="<?php if (isset($_POST['djDate4'])) {echo $_POST['djDate4'];}?>" /><br />
<label for="djName4">DJ Name : </label>
<input type="text" size="30" name="djName4" id="djName4" value="<?php if (isset($_POST['djName4'])) {echo $_POST['djName4'];}?>" /><br />
</div>

<div id="numberOfTickets5" style="display: none;">
5 : <label for="djDate1">Show date : </label>
<input type="text" size="10" name="djDate5" id="djDate5" value="<?php if (isset($_POST['djDate5'])) {echo $_POST['djDate5'];}?>" /><br />
<label for="djName5">DJ Name : </label>
<input type="text" size="30" name="djName5" id="djName5" value="<?php if (isset($_POST['djName5'])) {echo $_POST['djName5'];}?>" /><br />
</div>

<input type="hidden" name="action" value="createPromotion" />
<input type="submit" name="submit" id="submit" value="Submit" />

<?php
}

if (!isset($_POST['submit'])) {
    showHeader();
    showFormPage1();
    showFooter();
// #####################################################################################################
} elseif (isset($_POST['submit'])) { 
    if (FALSE) {
        foreach ($_POST as $var => $val) {
            $_POST[$var]=stripslashes($val);
        }
    }

    // Validate input
    $errorText = '';
    $error=FALSE;

    foreach ($_POST as $key => $val) {
        if ($val == '') {unset($_POST[$key]);}
    }
    if (isset($_POST['date']) && strtotime($_POST['date']) < 0) {
        $errorText .= '<div style="background-color: #FF857F; border-style: dashed;">';
        $errorText .= "Incorrect date format of {$_POST['date']}. Use something like 2/27/07";
        $errorText .= '</div>';
        unset($_POST['date']);
        $error=TRUE;
    }
    if (isset($_POST['time']) && strtotime($_POST['time']) < 0) {
        $errorText .= '<div style="background-color: #FF857F; border-style: dashed;">';
        $errorText .= "Incorrect time format of {$_POST['time']}. Use something like 9:00 PM";
        $errorText .= '</div>';
        unset($_POST['time']);
        $error=TRUE;
    }

    for ($i = 1; $i <= $_POST['tickets']; $i++) {
        if (isset($_POST['djDate'.$i]) && strcmp($_POST['djDate'.$i],'ANY') && strtotime($_POST['djDate'.$i]) < 0) {
            $errorText .= '<div style="background-color: #FF857F; border-style: dashed;">';
            $errorText .= "Incorrect date format of {$_POST['djDate'.$i]}. Use something like 2/27/07";
            $errorText .= '</div>';
            unset($_POST['djDate'.$i]);
            $error=TRUE;
        }
    }
    if ($error) {
        showHeader();
        echo $errorText;
        showFooter();
    } else {
require('../common/fpdf/fpdf.php');

function indentStringWidth($string) {
    global $pdf;
    $pdf->SetX($pdf->GetX() + $pdf->GetStringWidth($string));
}

$eventDay='        ';$eventDate='           ';$eventTime='             ';
if (isset($_POST['date'])) {
	$eventDay=date('l',strtotime($_POST['date']));
	$eventDate=date('F jS',strtotime($_POST['date']));
}
if (isset($_POST['time'])) {
	$eventTime=date('g:i A',strtotime($_POST['time']));
}
if (!isset($_POST['wheelchair']) OR $_POST['wheelchair'] != 'Yes') {
    $_POST['wheelchair'] = 'No';
}

foreach ($_POST as $var => $val) {
	$_POST[$var]=iconv('UTF-8', 'windows-1252', $val);
}

$style['heading']=array('font'=>28,'line'=>40);
$style['xl']=array('font'=>22,'line'=>24);
$style['large']=array('font'=>18,'line'=>20);
$style['medium']=array('font'=>14,'line'=>18);
$style['fine']=array('font'=>12,'line'=>16);
$style['xfine']=array('font'=>8,'line'=>12);

$unit='pt';
$pdf=new FPDF('P',$unit,'Letter');
$pdf->AddPage();
$leftMargin=36;
$topMargin=72;
$rightMargin=36;
$pdf->SetMargins($leftMargin,$topMargin,$rightMargin);
$pdf->SetAutoPageBreak(TRUE,36);
$pdf->SetFont('Arial','B');

$pdf->SetFontSize($style['large']['font']);
$line='KALX Contest Sheet';
$pdf->MultiCell(0,$style['large']['line'],$line,0,'C');

$pdf->SetFontSize($style['xfine']['font']);
$line='Ticket giveaways must be value neutral. Give only factual information regarding shows and don\'t offer any "opinions" on shows.';
$pdf->MultiCell(0,$style['xfine']['line'],$line,0,'C');
//$pdf->Ln();

$eventName='';
if (isset($_POST['eventNameLine1'])) {$eventName=$_POST['eventNameLine1'];}
if (isset($_POST['eventNameLine2'])) {$eventName.="\n" . $_POST['eventNameLine2'];}
if (isset($_POST['eventNameLine3'])) {$eventName.="\n" . $_POST['eventNameLine3'];}


$pdf->SetFontSize($style['heading']['font']);
$pdf->SetFont('','IB');
$pdf->MultiCell(0,$style['heading']['line'],$eventName,0,'C');

if (isset($_POST['eventDescription'])) {

    $pdf->SetFont('','I');
    $pdf->SetFontSize($style['medium']['font']);
    $line1='EVENT GENRE / DESCRIPTION:';
    $line2=$_POST['eventDescription'];
    $pdf->SetFillColor(235,235,235);
    $pdf->MultiCell(0,
        $style['medium']['line'],$line1 . "\n" . $line2,1,'C',true);
    $pdf->Ln();
}

$pdf->SetFont('','B');
$pdf->SetFontSize($style['medium']['font']);
$line='Place : ';
$pdf->Write($style['medium']['line'],$line);
$pdf->SetFont('','IB');
$pdf->SetFontSize($style['large']['font']);
if (isset($_POST['venue'])) {$pdf->Write($style['large']['line'],$_POST['venue']);}
$pdf->Ln();

$pdf->SetFontSize($style['medium']['font']);
indentStringWidth($line);
$pdf->SetFont('','I');
$pdf->SetFontSize($style['large']['font']);
if (isset($_POST['address'])) {$pdf->Write($style['large']['line'],$_POST['address']);}
$pdf->Ln();
$pdf->Ln($style['medium']['font']);

$cell['label']=array('Day : ','Date : ','Time : ');
$cell['value']=array($eventDay,$eventDate,$eventTime);
for ($i = 0; $i <= 2; $i++) {
    $pdf->SetFontSize($style['medium']['font']);
    $cell['labelwidth'][]=$pdf->GetStringWidth($cell['label'][$i]);
    $pdf->SetFontSize($style['large']['font']);
    $cell['valuewidth'][]=$pdf->GetStringWidth($cell['value'][$i]);
    $cell['width'][]=$cell['labelwidth'][$i] + $cell['valuewidth'][$i];
}

// $centerColumnLeadingSpace=($pdf->wPt - $pdf->lMargin - $pdf->rMargin - $cell['width'][0] - $cell['width'][1] - $cell['width'][2]) / 2;
if($unit=='pt')
    $k = 1;

$centerColumnLeadingSpace=(($k * $pdf->GetPageWidth()) - $leftMargin - $rightMargin - $cell['width'][0] - $cell['width'][1] - $cell['width'][2]) / 2;


$pdf->SetFont('','B');
$pdf->SetFontSize($style['medium']['font']);
$pdf->Cell($cell['labelwidth'][0], $style['medium']['line'],$cell['label'][0]);
$pdf->SetFont('','IB');
$pdf->SetFontSize($style['large']['font']);
$pdf->Cell($cell['valuewidth'][0]+$centerColumnLeadingSpace, $style['large']['line'],$cell['value'][0]);

$pdf->SetFont('','B');
$pdf->SetFontSize($style['medium']['font']);
$pdf->Cell($cell['labelwidth'][1], $style['medium']['line'],$cell['label'][1]);
$pdf->SetFont('','IB');
$pdf->SetFontSize($style['large']['font']);
$pdf->Cell($cell['valuewidth'][1]+$centerColumnLeadingSpace, $style['large']['line'],$cell['value'][1]);

$pdf->SetFont('','B');
$pdf->SetFontSize($style['medium']['font']);
$pdf->Cell($cell['labelwidth'][2], $style['medium']['line'],$cell['label'][2]);
$pdf->SetFont('','IB');
$pdf->SetFontSize($style['large']['font']);
$pdf->Cell($cell['valuewidth'][2], $style['large']['line'],$cell['value'][2]);

$pdf->Ln();
$pdf->Ln($style['medium']['font']);

$pdf->SetFont('','B');
$pdf->SetFontSize($style['medium']['font']);
$line='Special Instructions : ';
$pdf->Write($style['medium']['line'],$line);
$pdf->SetFont('','I');
if (isset($_POST['instructions'])) {$pdf->Write($style['medium']['line'],$_POST['instructions']);}
$pdf->Ln();
$pdf->Ln($style['medium']['font']);

$pdf->SetFont('','');

function writeCheckbox($variable,$value) {
    global $pdf,$style;
    $pdf->SetFontSize($style['medium']['font']);
    $pdf->Write($style['medium']['line'],$value . ' : ');
    if (isset($_POST[$variable]) AND $_POST[$variable] == $value) {
        $pdf->Image('../common/images/checkbox-checked.png',$pdf->GetX(),$pdf->GetY());
        $pdf->SetX($pdf->GetX() + 16);
    } else {
        $pdf->Image('../common/images/checkbox-empty.png',$pdf->GetX(),$pdf->GetY());
        $pdf->SetX($pdf->GetX() + 16);
    }
}
writeCheckbox('age','21+');
$pdf->SetX($pdf->GetX() + 72);
writeCheckbox('age','18+');
$pdf->SetX($pdf->GetX() + 72);
writeCheckbox('age','All Ages');
$pdf->Ln();

$pdf->SetFont('','');
$pdf->SetFontSize($style['medium']['font']);
$line='Is this venue wheelchair accessible? : ';
$pdf->Write($style['medium']['line'],$line);

writeCheckbox('wheelchair','Yes');
$pdf->SetX($pdf->GetX() + 72);
writeCheckbox('wheelchair','No');
$pdf->Ln();

for ($i = 1; $i <= $_POST['tickets']; $i++) {
    $total_line_length = 0;
    $pdf->SetFont('','');
    $pdf->SetFontSize($style['medium']['font']);
    $pdf->Ln($style['fine']['font']);
    $line="$i.  ";
    $total_line_length += $pdf->GetStringWidth($line);
    $pdf->Write($style['medium']['line'],$line);
    $pdf->SetFont('Times','IB');
    $pdf->SetFontSize($style['medium']['font']);
    $blankDJDate='    ANY    ';
    $DJDateLength=$pdf->GetStringWidth($blankDJDate);
    $total_line_length += $DJDateLength;

	if (!isset($_POST['djDate'.$i])) {
		$DJDate=$blankDJDate;
	} elseif (strcmp($_POST['djDate'.$i],'ANY')) {
		$DJDate=date('n/j/y',strtotime($_POST['djDate'.$i]));
	} else {
		$DJDate=$blankDJDate;
	}
    $pdf->Cell($DJDateLength,$style['medium']['line'],$DJDate);

    $pdf->SetFont('Arial','');
    $pdf->SetFontSize($style['medium']['font']);
    $line="DJ : ";
    $total_line_length += $pdf->GetStringWidth($line);
    $pdf->Write($style['medium']['line'],$line);
    $pdf->SetFont('Times','IB');
    $pdf->SetFontSize($style['medium']['font']);
    $blankDJName='                       ANY                        ';
    $DJNameLength=$pdf->GetStringWidth($blankDJName);
    $total_line_length += $DJNameLength;
	if (!isset($_POST['djName'.$i])) {$_POST['djName'.$i]='';}
    if (isset($_POST['djName'.$i]) and strlen($_POST['djName'.$i]) > 0) {
        $pdf->SetFont('','IB');
        while ($pdf->GetStringWidth($_POST['djName'.$i]) > $DJNameLength) {
            $_POST['djName'.$i] = substr($_POST['djName'.$i],0,strlen($_POST['djName'.$i]) - 1);
        }
        $pdf->Cell($DJNameLength,$style['medium']['line'],$_POST['djName'.$i]);
    } else {
        $pdf->Cell($DJNameLength,$style['medium']['line'],$blankDJName);
    }

    $pdf->SetFont('Arial','');
    $pdf->SetFontSize($style['medium']['font']);
    $line="DJ Initials : ";
    $total_line_length += $pdf->GetStringWidth($line);
    $pdf->SetFillColor(235,235,235);
    $pdf->Cell($pdf->GetStringWidth($line),$style['medium']['line'],$line,0,0,'L',true);
    #$pdf->Write($style['medium']['line'],$line);
    $pdf->SetFont('','U');
    $line='         ';
    $total_line_length += $pdf->GetStringWidth($line);
    $pdf->Cell($pdf->GetStringWidth($line),$style['medium']['line'],$line,0,0,'L',true);
    #$pdf->Write($style['medium']['line'],$line);

    $pdf->SetFont('','');
    $line=" Date Won : ";
    $total_line_length += $pdf->GetStringWidth($line);
    $pdf->Cell($pdf->GetStringWidth($line),$style['medium']['line'],$line,0,0,'L',true);
    #$pdf->Write($style['medium']['line'],$line);
    $pdf->SetFont('','U');
    $line='            ';
    $total_line_length += $pdf->GetStringWidth($line);
    $pdf->Cell($pdf->GetStringWidth($line) + 5,$style['medium']['line'],$line,0,0,'L',true);
    #$pdf->Write($style['medium']['line'],$line);

    $pdf->Ln();
    $pdf->SetFont('','');
    $line='Tried : ';
    $line_space='            ';
    $pdf->Cell($total_line_length - $pdf->GetStringWidth($line . $line_space),$style['medium']['line'],'');
    $pdf->Cell($pdf->GetStringWidth($line),$style['medium']['line'],$line,0,0,'L',false);
    #$pdf->Write($style['medium']['line'],$line);
    $pdf->SetFont('','U');
    $pdf->Cell($pdf->GetStringWidth($line_space) + 5,$style['medium']['line'],$line_space,0,0,'L',false);
    #$pdf->Write($style['medium']['line'],$line_space);
    $pdf->Ln();

    $pdf->SetFont('','');
    $pdf->SetFontSize($style['medium']['font']);
    $line="Name : ";
    $pdf->Write($style['medium']['line'],$line);
    $pdf->SetFont('','U');
    $pdf->SetFontSize($style['large']['font']);
    $pdf->Write($style['large']['line'],'                                                  ');

    $pdf->SetFont('','');
    $pdf->SetFontSize($style['medium']['font']);
    $line="Phone : ";
    $pdf->Write($style['medium']['line'],$line);
    $pdf->SetFont('','U');
    $pdf->SetFontSize($style['large']['font']);
    $pdf->Write($style['large']['line'],'                                    ');

    $pdf->Ln();
}

$pdf->SetFont('','');
$pdf->SetFontSize($style['xfine']['font']);
$line="***Winner's Names at the door unless otherwise specified***";
$pdf->Cell(0,$style['xfine']['line'],$line,0,1,'C');

$cell=array();
if (isset($_POST['promotionsRep'])) {$cell[]=$pdf->GetStringWidth($_POST['promotionsRep']);} else {$cell[]=$pdf->GetStringWidth('');}
if (isset($_POST['promotionsRepPhone'])) {$cell[]=$pdf->GetStringWidth($_POST['promotionsRepPhone']);} else {$cell[]=$pdf->GetStringWidth('');}
#if (isset($_POST['venueRep'])) {$cell[]=$pdf->GetStringWidth($_POST['venueRep']);} else {$cell[]=$pdf->GetStringWidth('');}
#if (isset($_POST['venuePhone'])) {$cell[]=$pdf->GetStringWidth($_POST['venuePhone']);} else {$cell[]=$pdf->GetStringWidth('');}
rsort($cell,SORT_NUMERIC);
$rightColumn=$cell[0];
$leftColumn=(($k * $pdf->GetPageWidth()) - $leftMargin - $rightMargin - $rightColumn);

/*
$line='Promotions Contact Person :';
$pdf->SetFont('','');
$pdf->Cell($leftColumn,$style['xfine']['line'],$line,0,0,'R');
$line=$_POST['promotionsRep'];
$pdf->SetFont('','U');
$pdf->Cell($leftColumn,$style['xfine']['line'],$line,0,1,'L');

$line='Venue Contact Person :';
$pdf->SetFont('','');
$pdf->Cell($leftColumn,$style['xfine']['line'],$line,0,0,'R');
$line=$_POST['venueRep'];
$pdf->SetFont('','U');
$pdf->Cell($leftColumn,$style['xfine']['line'],$line,0,1,'L');

$line='Venue Phone Number :';
$pdf->SetFont('','');
$pdf->Cell($leftColumn,$style['xfine']['line'],$line,0,0,'R');
$line=$_POST['venuePhone'];
$pdf->SetFont('','U');
$pdf->Cell($leftColumn,$style['xfine']['line'],$line,0,1,'L');
$pdf->Ln();
*/

#$line='Promotions Contact Person : ' . $_POST['promotionsRep'] . '        ' . 'Venue Contact Person : ' . $_POST['venueRep'] . '        ' . 'Venue Phone Number : ' . $_POST['venuePhone'];
$line='Promotions Contact Person : ' . $_POST['promotionsRep'] . '        ' . 'Contact Phone Number : ' . $_POST['promotionsRepPhone'];
$pdf->SetFont('','');
$pdf->Cell(0,$style['xfine']['line'],$line,0,1,'C');

/*
$pdf->SetFont('Arial','IB');
$pdf->SetFontSize($style['medium']['font']);
$venueLength=$pdf->GetStringWidth($_POST['venue']);
$pdf->Text($pdf->wPt - $pdf->rMargin - $venueLength, $pdf->fhPt - $pdf->bMargin - $style['medium']['font'], $_POST['venue']);
// $pdf->Cell(0,$style['medium']['line'],$_POST['venue'],0,1,'R');
*/
$pdf->Output();
    }
}
?>
