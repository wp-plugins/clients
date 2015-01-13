<?php

function clients_getAll()
{
	$Lists = ct\CTData::getClientList();

	return $Lists; 	
}

function clients_getFeatured()
{
	$Lists = ct\CTData::getFeaturedClients();

	return $Lists; 
}

?>