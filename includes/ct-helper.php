<?php 
namespace ct;

function ctGetCheckBoxVal($Value)
{
	if($Value == 'on')
	{
		return 1;
	}
	
	return 0;
}

function ctExplodeFields($Data)
{
    $Data = preg_replace('/\W/',' ', $Data);
    $Data = preg_replace('/\s+/', ' ', $Data);
    $Data = trim($Data);

    $Data = explode(' ', $Data);
    $Data = array_unique($Data);      

    return $Data;
}

function ctGetFormFieldsData($Data)
{
    $FieldData = array();
    $FieldInnData = array();

    foreach ($Data['name'] as $key => $value) 
    {
       $FieldInnData['name'] = $value;
       array_push($FieldData, $FieldInnData);
    }

    return json_encode($FieldData);
}

function ctGetInputFields($Fields)
{
    foreach ($Fields as $value) 
    {
        $field .= $value;
    }

    return $field;
}

function ctGetCheckBox($Value)
{
    if($Value == '1')
    {
        echo 'checked';
    }
    else
    {
        echo '';
    }
}

function ctRedirectTo($url)
{
    if (headers_sent())
    {
      die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
    }
    else
    {
      header('Location: ' . $url);
      die();
    }    
}

function addhttp($url) 
{
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) 
    {
        $url = "http://" . $url;
    }
    
    return $url;
}

?>