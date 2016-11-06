<?php
	include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/orders.php');

	$isAdmin = $_GET['isAdmin'];
	$orderRef = $_GET['orderref'];

	if($isAdmin){
		$orderId = getIdByOrderState('ENVIADO');
		changeOrdersStateAdmin($orderRef, $orderId[0]['id']);
	}
	else {
		$orderId = getIdByOrderState('RECEBIDO');
		changeOrdersStateCustomer($orderRef, $orderId[0]['id']);
	}

	header('Location: ' . $BASE_URL . '/pages/orders/view_orders.php');
	exit;
?>
