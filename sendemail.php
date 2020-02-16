<?php

	//header('Content-type: application/json');

	header('Content-Type: text/html; charset=ISO-8859-1');

	$status = array(

		'type'=>'success',

		'message'=>'Gràcies per realitzar la pre-inscripció. En breu ens posarem en contacte amb tu '

	);



    $name = @trim(stripslashes($_POST['name'])); 

    $dni = @trim(stripslashes($_POST['dni'])); 

	$naixement = @trim(stripslashes($_POST['datanaixement'])); 

    $poblacio = @trim(stripslashes($_POST['poblacio'])); 

    $equip = @trim(stripslashes($_POST['equip'])); 

    $email = @trim(stripslashes($_POST['email']));   

    $message = @trim(stripslashes($_POST['message'])); 

    $opcio1 = $_POST['opciones']; 

    $seguro = $_POST['seguro']; 

	$preu = 0;

	

	// Omplim el subject

    $subject = 'PRE-INSCRIPCIÓ AIROSA ';     

   // if ($opcio1 == 'opcion_1') {//Cursa

		$subject = $subject. " CURSA ";

		$preu = 12;

    //}else{//Marxa

	//	$subject = $subject. " MARXA ";

//		$preu = 8;

  //  }

    $subject = $subject.$dni;    

    

    // Omplim el seguro  

    if ($seguro == 'seguro_si') {

		$preu = $preu + 4;

    }else{

    }

      

    //Ens enviem un mail a nosaltres

    $email_from = $email;

    $email_to = 'cursamdb@gmail.com';



    $body = 'Nom i cognoms: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Dni: ' . $dni . "\n\n" . 'Data naixement:'.	$naixement."\n\n". 

            'Població: ' . $poblacio . "\n\n" . 'Equip: ' . $equip. "\n\n" . 'Seguro: ' . $seguro. "\n\n" . 

            'Preu: ' . $preu ."\n\n" . 

            'Message: ' . $message;

    

    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    

    //Enviem un mail al participant

    $email_from = 'cursamdb@gmail.com';

    $email_to = $email;



    $body = 'Nom i cognoms: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Dni: ' . $dni . "\n\n" . 'Data naixement:'.	$naixement."\n\n". 

            'Població: ' . $poblacio . "\n\n" . 'Equip: ' . $equip. "\n\n" . 'Seguro: ' . $seguro. "\n\n" . 

            'Preu: ' . $preu ."\n\n" . 

            'Message: ' . $message;

    

     $body=  $body." \n\n\n Recorda que has de fer l'ingrés al número de compte ES59 2013 3042 5402 1004 2664 posant el DNI de referència.\n\n".

		" El preu és :".$preu." €.\n\n Un cop ho rebem sortiràs a llista d'inscrits.\n\n Salut i cames!";

    
   
    

    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    

   

  //  echo json_encode($status);

    

   // $cronica='<br><div style="background: #7fad36"><font color=grey size=4.5>';

$cronica='<br><div style="background: #d1e0b8;padding:20px"><font color=grey size=4.5 font-family="arial">';

  

    $cronica= $cronica.'<h2>'. $subject.'</h2>';

    

    $cronica= $cronica . '<b>Nom i cognoms:</b> ' . $name . '<br>' . '<b>Email: </b>' . $email . '<br>' .

			'<b>Dni: </b>' . $dni . '<br>' . '<b>Data naixement: </b>' . $naixement . '<br>' . 

            '<b>Població:</b> ' . $poblacio . '<br>' . '<b>Equip: </b>' . $equip. '<br>' . '<b>Seguro: </b>' . $seguro. '<br>' . 

            '<b>Preu: </b>' . $preu .'<br>' .

            '<b>Message:</b> ' . $message;

    

     $cronica=$cronica.' <br><br> Recorda que has de fer l\'ingrés al número de compte ES59 2013 3042 5402 1004 2664 posant el DNI de referència.<br>'.

		' El preu és :'.$preu.' €.<br> Un cop ho rebem sortiràs a llista d\'inscrits.<br><br> Salut i cames!';

    

    $cronica=$cronica.' <br><h4>Si no reps cap correu posa\'t en contacte amb nosaltres</h4>';

    $cronica=  $cronica.'<br> <br>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="T7N33GLW5EY8W">
<table>
<tr><td><input type="hidden" name="on0" value="Tipos">Tipos</td></tr><tr><td><select name="os0">
	<option value="FEDERAT">FEDERAT ?15,00 EUR</option>
	<option value="NO FEDERAT">NO FEDERAT ?20,00 EUR</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="EUR">
<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
</form>
';   

    $cronica=$cronica.'</font></div>';

    

    echo $cronica;

     

    //echo json_encode($status);
//$message = "wrong answer";
//echo "<script type='text/javascript'>alert('$message');</script>";
    

    if ( !function_exists('json_encode') ){

    function json_encode($content){

                require_once 'Services/JSON.php';

                $json = new Services_JSON;

               

        echo $json->encode($content);

    }

    }else{

        echo json_encode($status);

    }

    die;

?>

