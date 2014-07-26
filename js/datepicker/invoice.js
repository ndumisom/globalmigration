/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    $('input[class=p_fees],input[class=dha_fees]').keyup(function(e) {
        
        var total = 0;
        var $row = $(this).parent().parent();
        var p_fess = $row.find('input[class=p_fees]').val();
        var dha_fess = $row.find('input[class=dha_fees]').val();
      
                
        total = parseFloat( p_fess )+ parseFloat( dha_fess);
        
        //update the row total
         $row.find('.amount').val(total);

        var total_amount = 0;
        $('.amount').each(function() {
            //Get the value
            var am= $(this).val();
            console.log(am);
            //if it's a number add it to the total
            if (IsNumeric(am)) {
                total_amount += parseFloat(am, 10);
            }
        });
        $('.total_amount').val(total_amount);
        
       var subtotal = 0;
       $('input[class=p_fees]').each(function(){
             //Get the value
            var am= $(this).val();
            console.log(am);
            //if it's a number add it to the total
            if (IsNumeric(am)) {
                subtotal += parseFloat(am, 10);
            }
       });
        $('.subtotal_amount').val(subtotal);
        
     var subtotal1 = 0;
       $('input[class=dha_fees]').each(function(){
             //Get the value
            var am= $(this).val();
            console.log(am);
            //if it's a number add it to the total
            if (IsNumeric(am)) {
                subtotal1 += parseFloat(am, 10);
            }
       });
        $('.subtotal_amount1').val(subtotal1);
        
    
    //tax
        var tax = 0;
      
        $('.subtotal_amount').each(function() {
            //Get the value
            var am = $(this).val();
            var tax_value = 0.14;
            console.log(am);
            //if it's a number add it to the total
            if (IsNumeric(am)) {
                tax += parseFloat(am,2)*parseFloat(tax_value,2);
                
            }
        });
        $('.tax').val(tax.toFixed(2));
        
    //total after tax
      var total_amount = 0;
      var vat =  $('.tax').val();
      var sub_total = $('.total_amount').val();
      total_amount = parseFloat(vat)+ parseFloat(sub_total);
      
       $('.total').val(total_amount.toFixed(2));
        
       
    });
});

//isNumeric function Stolen from: 
//http://stackoverflow.com/questions/18082/validate-numbers-in-javascript-isnumeric

function IsNumeric(input) {
    return (input - 0) == input && input.length > 0;
}


function addFormField() {
    var id = document.getElementById("aid").value;
    jQuery.noConflict();
    jQuery("#text").append("<tr id='row" + id + "' style='width:100%'><td>\n\
<select name='description[]' > \n\
 <option value=''>Select</option><\n\
<option value='Visitor's permit extension for max 3 months'>Visito's permit extension for max 3 months</option>\n\
<option value='Visitor's permit for 3 years for academic sabbaticals'>Visitor's permit for 3 years for academic sabbaticals</option>\n\
<option value='Visitor's permit for 3 years for voluntary or charitable activities'>Visitor's permit for 3 years for voluntary or charitable activities</option>\n\
<option value='Visitor's permit for 3 years for research'>Visitor's permit for 3 years for research</option>\n\
<option value='Visitor's Permit with Authorisation to conduct work (Airport)'>Visitor's Permit with Authorisation to conduct work (Airport)</option>\n\
<option value='Spouse/ Life Partner to SAC'>Spouse/ Life Partner to SAC</option>\n\
<option value='Spouse/ Life Partner to SAC + work authorisation'>Spouse/ Life Partner to SAC + work authorisation</option>\n\
<option value='Add work Spouse/ Life Partner to SAC'>Add work Spouse/ Life Partner to SAC</option>\n\
<option value='Spouse / Life Partner Extension'>Spouse / Life Partner Extension</option>\n\
<option value=''>Select</option>\n\
<option value=''>Select</option>\n\
<option value=''>Select</option>\n\
<option value=''>Select</option>\n\
<option value=''>Select</option>\n\
<option value=''>Select</option>\n\
<option value=''>Select</option>\n\
<option value=''>Select</option>\n\
<option value=''>Select</option>\n\
<option value=''>Select</option>\n\
<option value=''>Select</option>\n\
</select>\n\
</td>\n\
<td><input type='text' name='professional_fees[]' class='p_fees' id='p_fees' size='15' value='0' autocomplete='off'/></td>\n\
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='saqa_dha_fees[]' class='dha_fees' id='dha_fees' size='15' value='0' autocomplete='off'/></td> \n\
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='line_total[]' id='line_total' class='amount' size='15' value='0' autocomplete='off'/></td><td><a href='#' onClick='removeFormField(\"#row" + id + "\"); return false;'><div style='color:red'>X</div></a></td></tr>");

    jQuery('#row' + id).highlightFade({    speed: 1000});
    id = (id - 1) + 2;
    document.getElementById("aid").value = id;
}

function removeFormField(id) {
    jQuery(id).remove();
}


$(document).ready(
        function() {
            $('#clear').fadeOut(3000);
        }
);

// display p_fees and dha_fees

//Validate the Quote

function validate_quote()
{
var a=document.forms["quotes"]["f_name"].value;
if (a==null || a=="")
  {
  alert("Please enter First name");
  return false;
  }
  
var b=document.forms["quotes"]["surname"].value;
if (b==null || b=="")
  {
  alert("Please enter Surname");
  return false;
  }
  
  var c=document.forms["quotes"]["quote_date"].value;
if (c==null || c=="")
  {
  alert("Please enter Date");
  return false;
  }
  

  var e=document.forms["quotes"]["consultant"].value;
if (e==null || e=="")
  {
  alert("Please select Consultant");
  return false;
  }
  
  
    
  var d=document.forms["quotes"]["email_to"].value;
  var atpos=d.indexOf("@");
   var dotpos=d.lastIndexOf(".");
   if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Please enter valid e-mail address");
  return false;
  }
  
  
  
}



