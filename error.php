if($idsProductDel){
    $el = new CIBlockElement;
    foreach ($idsProductDel as $key => $id) {
        echo $id."\n";

        $DB->StartTransaction();
        if(!CIBlockElement::Delete($id))
        {
            $strWarning .= 'Error!';
            $DB->Rollback();
        }
        else{
            $strSql = "DELETE FROM `parservk` WHERE `UF_ID_PRODUCT` = ".$id;
            $DB->Query($strSql, false, $err_mess.__LINE__);
            $DB->Commit();
        }
    }
}
