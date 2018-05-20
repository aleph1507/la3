var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
// xhttp.open("GET", "https://shrouded-dawn-19367.herokuapp.com/get-ccs", true);
var xhttp = new XMLHttpRequest();
xhttp.open("GET", "/get-ccs", true);
xhttp.onreadystatechange = function() {
    console.log("vo xhttp.onreadystatechange");
    console.log("readyState: " + this.readyState);
    console.log("this.status: " + this.status);
    if (this.readyState == 4 && this.status == 200) {
      let c_string = this.responseText.substring(1, this.responseText.length-1);
      c_string = c_string.replace(/['"]+/g, '');
      coupons = c_string.split(',');
      for(let i = 0; i<coupons.length; i++){
        console.log("coupons : " + coupons);
      }
  };
}
xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
// document.querySelector('meta[name="csrf-token"]').content
xhttp.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);
xhttp.send();

// nocouponpaypal = "<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\"" + ">" +
//                   "<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\"" + ">" +
//                   "<input type=\"hidden\" name=\"hosted_button_id\" value=\"H9MCY5DU4RNSA\"" + ">" +
//                   "<input type=\"image\" src=\"https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif\""   +
//                     "width=\"300px\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\"" + ">" +
//                   "<img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\"" + ">" +
//                 "</form>";

couponpaypal = "<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\"" + ">" +
                  "<input type=\"hidden\" name=\"custom\" value=\"<%= custom_data %>\"" + ">" +
                  "<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\"" + ">" +
                  "<input type=\"hidden\" name=\"hosted_button_id\" value=\"H9MCY5DU4RNSA\"" + ">" +
                  "<input type=\"image\" src=\"https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif\"" +
                    "width=\"500px\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\"" + ">" +
                  "<img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\"" + ">" +
                "</form>";

// nocouponpaypal = "<form action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">" +
//                     "<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">" +
//                     "<input type=\"hidden\" name=\"hosted_button_id\" value=\"27DU2EYJHRYG6\">" +
//                     "<input type=\"image\" src=\"https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\">" +
//                     "<img alt=\"\" border=\"0\" src=\"https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">" +
//                   "</form>";

nocouponpaypal = "<form action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">" +
                  "<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">" +
                  "<input type=\"hidden\" name=\"hosted_button_id\" value=\"27DU2EYJHRYG6\">" +
                  "<input type=\"image\" src=\"https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif\" border=\"0\" name=\"submit\" alt=\"Buy Love Abloom\">" +
                  "<img alt=\"\" border=\"0\" src=\"https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">" +
                "</form>";

//                 <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
// <input type="hidden" name="cmd" value="_s-xclick">
// <input type="hidden" name="hosted_button_id" value="27DU2EYJHRYG6">
// <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
// <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
// </form>




// <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="PayPalForm" name="PayPalForm"  target="_top">
//    <input type="hidden" name="cmd" value="_xclick">
//    <input type="hidden" name="business" value="email@hotmail.com">
//    <input type="hidden" name="amount" value="0.01">
//    <input type="hidden" name="item_name" value="Composite Door">
//    <input type="hidden" name="item_number" value="<?php echo $orderID ?>">
//    <input type="hidden" name="currency_code" value="GBP">
//    <input type="hidden" name="cancel_return" value="http://www.mydomain.co.uk/paypal-notcompleted.php">
//    <input type="hidden" name="return" value="http://www.mydomain.co.uk/paypal-completed.php">
//    <input type="hidden" name="notify_url" value="http://www.mydomain.co.uk/paypal-completed.php">
// </form>
//
// <script>
//   document.PayPalForm.submit();
// </script>


document.getElementById('paypal').innerHTML = nocouponpaypal;

cpaypal = false;

function checkCoupons(e) {
  let this_iteration = false;
  if(this.coupons){
    for(let j = 0; j<this.coupons.length; j++){
      console.log(this.coupons[j]);
    }
    console.log(e.target.value);
    for(let i = 0; i<this.coupons.length; i++){
      // console.log("vo proverka e.target.value : " + e.target.value);
      if(e.target.value == this.coupons[i]){
        console.log("COUPON : " + this.coupons[i]);
        couponpaypal = "<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\"" + ">" +
                          "<input type=\"hidden\" name=\"custom\" value=\"" + this.coupons[i] + "\">" +
                          "<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\"" + ">" +
                          "<input type=\"hidden\" name=\"hosted_button_id\" value=\"H9MCY5DU4RNSA\"" + ">" +
                          "<input type=\"image\" src=\"https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif\"" +
                            "width=\"500px\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\"" + ">" +
                          "<img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\"" + ">" +
                        "</form>";
        document.getElementById('paypal').innerHTML = couponpaypal;
        cpaypal = true;
        console.log("COUPON");
        // this_iteration = true;
        break;
      } else {
        console.log("no coupon");
        if(cpaypal){
          console.log("vo else if");
          document.getElementById('paypal').innerHTML = nocouponpaypal;
          cpaypal = false;
        }
      }
    }
  }
}

//
// function loadDoc() {
//   var xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       document.getElementById("demo").innerHTM =
//       this.responseText;
//     }
//   };
//   xhttp.open("GET", "127.0.0.1:8000/get-ccs", true);
//   xhttp.send();
// }
