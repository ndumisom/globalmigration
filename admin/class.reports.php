<?
class reports{
    
    function generate_permit($permit_status, $date1, $date2) {
        
        return mysql_fetch_array(mysql_query(" select *from  client_details,permit_applications,current_permit where permit_status= '$permit_status' and expiry_date >= '$date1  and expiry_date <= '$date2"));
        
    }
    
    function functionName($permit_status, $corporate, $date1, $date2) {
        return mysql_fetch_array(mysql_query(" select *from  client_details,permit_applications,current_permit where client_details.corporate = '$corporate' and permit_status= '$permit_status' and expiry_date >= '$date1  and expiry_date <= '$date2"));;
        
    }
    
    
}

?>