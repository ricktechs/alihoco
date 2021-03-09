
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Alihoco</title>
        <meta name="description" content="Alihoco is dedicated to helping you find the best price for your next all-inclusive hotel and all-inclusive holiday.  Our site is dedicated to all things all-inclusive. Check prices now">
      <link rel="shortcut icon" href="https://allinclusive.co.uk/trvx-static-asset-files/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="https://allinclusive.co.uk/trvx-static-asset-files/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="https://allinclusive.co.uk/trvx-static-asset-files/css/bootstrap.css">
<link rel="stylesheet" href="https://allinclusive.co.uk/trvx-static-asset-files/css/login.css">
<link rel="stylesheet" href="https://allinclusive.co.uk/trvx-static-asset-files/css/font-awesome.min.css">
<link rel="stylesheet" href="https://allinclusive.co.uk/trvx-static-asset-files/css/styles.css">
<link rel="stylesheet" href="https://allinclusive.co.uk/trvx-static-asset-files/css/fonts.css">
<link rel="stylesheet" href="https://allinclusive.co.uk/trvx-static-asset-files/css/sprites.css">
<link rel="stylesheet" href="https://allinclusive.co.uk/trvx-static-asset-files/css/animate.min.css">
<link rel="stylesheet" href="https://allinclusive.co.uk/trvx-static-asset-files/css/responsive.css">
<link rel="stylesheet" href="https://allinclusive.co.uk/trvx-static-asset-files/css/jquery-ui.css" />
<link rel="stylesheet" href="https://allinclusive.co.uk/trvx-static-asset-files/css/owl.carousel.min.css" />
<link rel="stylesheet" href="https://allinclusive.co.uk/trvx-static-asset-files/css/owl.theme.default.min.css" />
<link rel="stylesheet" href="https://allinclusive.co.uk/trvx-static-asset-files/Validation/css/validationEngine.jquery.css" />


<!-- Include Below JS After Your jQuery.min File -->
<script src="https://allinclusive.co.uk/trvx-static-asset-files/js/jquery-3.3.1.min.js"></script>
<script src="https://allinclusive.co.uk/trvx-static-asset-files/js/popper.min.js"></script>
<script src="https://allinclusive.co.uk/trvx-static-asset-files/js/bootstrap.min.js"></script>
<script src="https://allinclusive.co.uk/trvx-static-asset-files/js/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://allinclusive.co.uk/trvx-static-asset-files/css/daterangepicker.css" />
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

     
   </head>
   <body>


<script>
    $(document).ready(function(){
        $("#sign_up, #signin_form").validationEngine();
    });
    
    $(document).on('submit', '#sign_up',function (e) {
          $('#signup_validation').hide();
          e.preventDefault();
          var firstName = $('#fname').val();
          var lastName = $('#lname').val();
          var emailId = $('#email').val();
          var contactNumber = $('#phone_number').val();
          var firstName = lastName = contactNumber = '';
          var password = $('#pwfield').val();
          var cpassword = $('#confirm_password').val();
          status = true;
          var regex = /^([a-zA-Z0-9_¥.¥-¥+])+¥@(([a-zA-Z0-9¥-])+¥.)+([a-zA-Z0-9]{2,4})+$/;
          if(!regex.test(emailId)) {
            status = false;
          }
        
        // if (firstName.length != 0 && lastName.length != 0 && emailId.length != 0 && contactNumber.length != 0 && password.length != 0 && cpassword.length != 0 && password == cpassword && contactNumber.length == 10 && status == 'true') {
          $('.signup-btn').text('Please Wait...');
          $.ajax({
            url: "https://allinclusive.co.uk/home/sign_up",
            type: "post",
            data: $('#sign_up').serialize(),
            // data: new FormData(this),
            // processData: false,
            // contentType: false,
            // cache: false,
            // async: false,
            dataType: 'json',
            success: function(data) {
              $('.signup-btn').text('Submit');
              if(data.code == 0) {
                $('#signup_validation').show();
                $('#signup_validation').html(data.msg);
              } else if(data.code == 1) {
                  $('#signup_validation').show();
                  $('#signup_validation').html(data.msg);
                // $.toast({
                //   text: data.msg,
                //   showHideTransition: 'fade',
                //   icon: 'success',
                //   position: 'bottom-right'
                // });
                //document.getElementById("sign_up").reset();
                //$('#loginModal').modal('hide');
              }
            }
          });
        // }
        // else
        // {
        //     $('#signup_validation').show();
        //     $('#signup_validation').html('Please Fill all the Fields');
        // }
        
    });
    
    var csrfName = 'csrf_souq',
  csrfHash = '1444c84beb1f701f2eeeef64fe76e113';

  $('#signin_form').on('submit', function (e) {
    var path = window.location.pathname;
    var segment = path.split('/');

    e.preventDefault();
    var email = $('#email_login').val();
    var password = $('#password').val();
    var otp = $('#otp').val();
    $('#validation').hide();
    status = true;
    var booking = "Bookings";
    var manage_booking = "Manage Booking";
    var settings = "Settings";
    var travellers = "Travellers";
    var logout = "Logout";

    if(otp == '') {
      if (email != '' && password != '' && status == 'true') {
        $.ajax({
          url: "https://allinclusive.co.uk/home/login",
          type: "post",
          data: new FormData(this),
          processData: false,
          contentType: false,
          cache: false,
          async: false,
          dataType: 'json',
          success: function(data) {
            if(data.code == 0) {
              $('#validation').show();
              $('#validation').html(data.msg);
            } else if(data.code == 1) {
              $('.login-username').hide();
              $('.login-password').hide();
              $('.forgot-password').hide();
              $('.login-otp').show();
              $('#sign_in').text('Continue');
            }else if(data.code == 2) {
              $('.login-register-li').html('<li class="nav-item" style="position:relative;position:relative"><a href="javascript:void(0);" class="nav-link text-danger" data-toggle="dropdown">'+data.name+'&nbsp;<i class="fa fa-chevron-down" aria-hidden="true"></i></a><div class="dropdown-menu logout-dropdown" aria-labelledby="navbarDropdown" style="left:inherit !important"><a class="dropdown-item" href="https://allinclusive.co.uk/customer/booking">'+booking+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/customer/manage_booking">'+manage_booking+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/customer/settings">'+settings+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/customer/travellers">'+travellers+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/home/logout">'+logout+'</a></div>');
              if(jQuery.inArray("selected-flight-details.html", segment ) == 2) {
                $('.travel-signIn').hide();
                $('.login-append').html('<button type="submit" class="btn-default comm-bton">Proceed To Book</button>');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("flight_details", segment ) == 3) {
                $('.travel-signIn').hide();
                $('.login-append').html('<button type="submit" class="btn-default comm-bton">Proceed To Book</button>');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("accomadation-hotel-booking-terms.html", segment ) == 2) {
                $('.book-fast').hide();
                $('.alert').hide();
                $('.book-btn').removeAttr('hidden');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("tour-book", segment ) == 2) {
                $('.login-append').html('<button type="submit" class="btn-default bk-now-btn">Proceed To Book</button>');
              } else if(jQuery.inArray("cars", segment ) == 2) {
                $('#temp').removeClass('col-md-12 col-12 col-sm-5');
                $('#temp').addClass('col-md-6 col-12 col-sm-5');
                $('.book-fast').hide();
                $('.alert').hide();
                $('.editbtn-1').removeAttr('hidden');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("agents-cab-reserve", segment ) == 2) {
                $('.auth').hide();
                $('.login-append').html('<input type="submit" class="btn sign-btn btn-primary" value="Pay Now" >');
              }else if(jQuery.inArray("itinerary_planner", segment ) == 2) {
                $('.auth').hide();
                $('.login-append').html('<input type="submit" class="btn btn-primary" id="complete-booking" value="Complete booking" />');
              }else if(jQuery.inArray("activity", segment ) == 2) {
                $('.auth').hide();
                $('.emptycart').hide();
                $('.login-append').html('<input type="submit" class="btn btn-primary" id="complete-booking" value="Complete booking" />');
              }
              $('#loginModal').modal('hide');
              $('.modal').hide();
              $('.modal-backdrop').hide();
              location.reload();
            }
          }
        });
      }
    } else {
      if (email != '' && password != '' && status == 'true') {
        $.ajax({
          url: "https://allinclusive.co.uk/home/otp_login",
          type: "post",
          data: new FormData(this),
          processData: false,
          contentType: false,
          cache: false,
          async: false,
          dataType: 'json',
          success: function(data) {
            if(data.code == 0) {
              $('#validation').show();
              $('#validation').html(data.msg);
            } else if(data.code == 1) {
              $('.login-register-li').html('<li class="nav-item" style="position:relative;position:relative"><a href="javascript:void(0);" class="nav-link text-danger" data-toggle="dropdown">'+data.name+'&nbsp;<i class="fa fa-chevron-down" aria-hidden="true"></i></a><div class="dropdown-menu logout-dropdown" aria-labelledby="navbarDropdown"><a class="dropdown-item" href="https://allinclusive.co.uk/customer/booking">'+booking+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/customer/manage_booking">'+manage_booking+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/customer/settings">'+settings+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/customer/travellers">'+travellers+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/home/logout">'+logout+'</a></div>');
              if(jQuery.inArray("selected-flight-details.html", segment ) == 2) {
                $('.travel-signIn').hide();
                $('.login-append').html('<button type="submit" class="btn-default comm-bton">Proceed To Book</button>');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("flight_details", segment ) == 3) {
                $('.travel-signIn').hide();
                $('.login-append').html('<button type="submit" class="btn-default comm-bton">Proceed To Book</button>');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("accomadation-hotel-booking-terms.html", segment ) == 2) {
                $('.book-fast').hide();
                $('.alert').hide();
                $('.book-btn').removeAttr('hidden');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("holidays", segment ) == 2) {
                $('.book-fast').hide();
                $('.alert').hide();
                $('.book-btn').removeAttr('hidden');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("tour-book", segment ) == 2) {
                $('.login-append').html('<button type="submit" class="btn-default bk-now-btn">Proceed To Book</button>');
              } else if(jQuery.inArray("cars", segment ) == 2) {
                  $('#temp').removeClass('col-md-12 col-12 col-sm-5');
                  $('#temp').addClass('col-md-6 col-12 col-sm-5');
                $('.book-fast').hide();
                $('.alert').hide();
                $('.editbtn-1').removeAttr('hidden');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("agents-cab-reserve", segment ) == 2) {
                $('.auth').hide();
                $('.login-append').html('<input type="submit" class="btn sign-btn btn-primary" value="Pay Now" >');
              }else if(jQuery.inArray("itinerary_planner", segment ) == 2) {
                $('.auth').hide();
                $('.login-append').html('<input type="submit" class="btn btn-primary" id="complete-booking" value="Complete booking" />');
              }else if(jQuery.inArray("activity", segment ) == 2) {
                $('.auth').hide();
                $('.emptycart').hide();

                $('.login-append').html('<input type="submit" class="btn btn-primary" id="complete-booking" value="Complete booking" />');
              }
              $('#loginModal').modal('toggle');
              $('.modal').hide();
              $('.modal-backdrop').hide();
            }
          }
        });
      }

    }

  });
  
  
    function update_currency(val){
      var baseUrl = "https://allinclusive.co.uk/";
      var currencyTypeResult="";
      $('#currency').html(val);
      $.ajax({
        type: 'GET',
        url: baseUrl+'home/update_currency',
        data: {source:currencyTypeResult,to:val},
        success:function(resp){
          window.location.reload();
        }
      });
    }
</script>
<script>
  $(document).ready(function(){
    $("#sign_up, #signin_form").validationEngine();
    
    $("#email").change(function(){
        var email = $(this).val().toLowerCase();    
        $(this).val(email);
    });
    
    $("#email_login").change(function(){
        var email = $(this).val().toLowerCase();    
        $(this).val(email);
    });
    
  });
  const signUpButton = document.getElementById('signUp');
  const signInButton = document.getElementById('signIn');
  const container = document.getElementById('login-resgister');
  signUpButton.addEventListener('click', () => container.classList.add('right-panel-active'));
  signInButton.addEventListener('click', () => container.classList.remove('right-panel-active'));
  
  $(document).on('click','#forgot_link',function(){
    if($('#forgot_div').is(':visible'))  {
      $('#forgot_div').slideUp();
      $('#sign_in').slideDown();
      $("#email, #password").prop('disabled',false);
      $("#forgot_email").prop('disabled',true);
    }else{
      $('#forgot_div').slideDown();
      $('#sign_in').slideUp();
      $("#email, #password").prop('disabled',true);
      $("#forgot_email").prop('disabled',false);
    }
  });
  
    
  var csrfName = 'csrf_souq',
  csrfHash = '1444c84beb1f701f2eeeef64fe76e113';

  $('#signin_form').on('submit', function (e) {
    var path = window.location.pathname;
    var segment = path.split('/');

    e.preventDefault();
    var email = $('#email_login').val();
    var password = $('#password').val();
    var otp = $('#otp').val();
    $('#validation').hide();
    status = true;
    var booking = "Bookings";
    var manage_booking = "Manage Booking";
    var settings = "Settings";
    var travellers = "Travellers";
    var logout = "Logout";

    if(otp == '') {
      if (email != '' && password != '' && status == 'true') {
        $.ajax({
          url: "https://allinclusive.co.uk/home/login",
          type: "post",
          data: new FormData(this),
          processData: false,
          contentType: false,
          cache: false,
          async: false,
          dataType: 'json',
          success: function(data) {
            if(data.code == 0) {
              $('#validation').show();
              $('#validation').html(data.msg);
            } else if(data.code == 1) {
              $('.login-username').hide();
              $('.login-password').hide();
              $('.forgot-password').hide();
              $('.login-otp').show();
              $('#sign_in').text('Continue');
            }else if(data.code == 2) {
              $('.login-register-li').html('<li class="nav-item" style="position:relative;position:relative"><a href="javascript:void(0);" class="nav-link text-danger" data-toggle="dropdown">'+data.name+'&nbsp;<i class="fa fa-chevron-down" aria-hidden="true"></i></a><div class="dropdown-menu logout-dropdown" aria-labelledby="navbarDropdown"><a class="dropdown-item" href="https://allinclusive.co.uk/customer/booking">'+booking+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/customer/manage_booking">'+manage_booking+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/customer/settings">'+settings+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/customer/travellers">'+travellers+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/home/logout">'+logout+'</a></div>');
              if(jQuery.inArray("selected-flight-details.html", segment ) == 2) {
                $('.travel-signIn').hide();
                $('.login-append').html('<button type="submit" class="btn-default comm-bton">Proceed To Book</button>');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("flight_details", segment ) == 3) {
                $('.travel-signIn').hide();
                $('.login-append').html('<button type="submit" class="btn-default comm-bton">Proceed To Book</button>');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("accomadation-hotel-booking-terms.html", segment ) == 2) {
                $('.book-fast').hide();
                $('.alert').hide();
                $('.book-btn').removeAttr('hidden');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("tour-book", segment ) == 2) {
                $('.login-append').html('<button type="submit" class="btn-default bk-now-btn">Proceed To Book</button>');
              } else if(jQuery.inArray("cars", segment ) == 2) {
                $('#temp').removeClass('col-md-12 col-12 col-sm-5');
                $('#temp').addClass('col-md-6 col-12 col-sm-5');
                $('.book-fast').hide();
                $('.alert').hide();
                $('.editbtn-1').removeAttr('hidden');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("agents-cab-reserve", segment ) == 2) {
                $('.auth').hide();
                $('.login-append').html('<input type="submit" class="btn sign-btn btn-primary" value="Pay Now" >');
              }else if(jQuery.inArray("itinerary_planner", segment ) == 2) {
                $('.auth').hide();
                $('.login-append').html('<input type="submit" class="btn btn-primary" id="complete-booking" value="Complete booking" />');
              }else if(jQuery.inArray("activity", segment ) == 2) {
                $('.auth').hide();
                $('.emptycart').hide();
                $('.login-append').html('<input type="submit" class="btn btn-primary" id="complete-booking" value="Complete booking" />');
              }
              $('#loginModal').modal('hide');
              $('.modal').hide();
              $('.modal-backdrop').hide();
            }
          }
        });
      }
    } else {
      if (email != '' && password != '' && status == 'true') {
        $.ajax({
          url: "https://allinclusive.co.uk/home/otp_login",
          type: "post",
          data: new FormData(this),
          processData: false,
          contentType: false,
          cache: false,
          async: false,
          dataType: 'json',
          success: function(data) {
            if(data.code == 0) {
              $('#validation').show();
              $('#validation').html(data.msg);
            } else if(data.code == 1) {
              $('.login-register-li').html('<li class="nav-item" style="position:relative;position:relative"><a href="javascript:void(0);" class="nav-link text-danger" data-toggle="dropdown">'+data.name+'&nbsp;<i class="fa fa-chevron-down" aria-hidden="true"></i></a><div class="dropdown-menu logout-dropdown" aria-labelledby="navbarDropdown"><a class="dropdown-item" href="https://allinclusive.co.uk/customer/booking">'+booking+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/customer/manage_booking">'+manage_booking+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/customer/settings">'+settings+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/customer/travellers">'+travellers+'</a><a class="dropdown-item" href="https://allinclusive.co.uk/home/logout">'+logout+'</a></div>');
              if(jQuery.inArray("selected-flight-details.html", segment ) == 2) {
                $('.travel-signIn').hide();
                $('.login-append').html('<button type="submit" class="btn-default comm-bton">Proceed To Book</button>');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("flight_details", segment ) == 3) {
                $('.travel-signIn').hide();
                $('.login-append').html('<button type="submit" class="btn-default comm-bton">Proceed To Book</button>');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("accomadation-hotel-booking-terms.html", segment ) == 2) {
                $('.book-fast').hide();
                $('.alert').hide();
                $('.book-btn').removeAttr('hidden');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("holidays", segment ) == 2) {
                $('.book-fast').hide();
                $('.alert').hide();
                $('.book-btn').removeAttr('hidden');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("tour-book", segment ) == 2) {
                $('.login-append').html('<button type="submit" class="btn-default bk-now-btn">Proceed To Book</button>');
              } else if(jQuery.inArray("cars", segment ) == 2) {
                  $('#temp').removeClass('col-md-12 col-12 col-sm-5');
                  $('#temp').addClass('col-md-6 col-12 col-sm-5');
                $('.book-fast').hide();
                $('.alert').hide();
                $('.editbtn-1').removeAttr('hidden');
                $('#email_id').val(data.email);
              } else if(jQuery.inArray("agents-cab-reserve", segment ) == 2) {
                $('.auth').hide();
                $('.login-append').html('<input type="submit" class="btn sign-btn btn-primary" value="Pay Now" >');
              }else if(jQuery.inArray("itinerary_planner", segment ) == 2) {
                $('.auth').hide();
                $('.login-append').html('<input type="submit" class="btn btn-primary" id="complete-booking" value="Complete booking" />');
              }else if(jQuery.inArray("activity", segment ) == 2) {
                $('.auth').hide();
                $('.emptycart').hide();

                $('.login-append').html('<input type="submit" class="btn btn-primary" id="complete-booking" value="Complete booking" />');
              }
              $('#loginModal').modal('toggle');
              $('.modal').hide();
              $('.modal-backdrop').hide();
            }
          }
        });
      }

    }

  });

$('.forgot-btn').click(function () {
  $('.forgot-error').text('');
  var forgot_email = $('#forgot_email').val();
  var regex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
//   var regex = /^([a-zA-Z0-9_¥.¥-¥+])+¥@(([a-zA-Z0-9¥-])+¥.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(forgot_email)) {
    $('.forgot-error').text('Please Enter a Valid Email ID');
    return false;
  } else {
    $('.forgot-btn').text('Wait...');
    $.ajax({
      url: "https://allinclusive.co.uk/home/forgotpassword",
      type: "post",
      data: {forgot_email:forgot_email,[csrfName]: csrfHash},
      dataType: 'json',
      success: function(data){
        $('.forgot-btn').text('Submit');
        if(data.code == 1) {
            $("#password").prop('disabled',false);
          $('.forgot-error').text(data.msg);
        } else {
          $('.forgot-error').text('');
          $.toast({
            text: data.msg,
            showHideTransition: 'fade',
            icon: 'success',
            position: 'bottom-right'
          })
        }
      }
    });
  }
});


function logout() {
  var baseUrl = "https://allinclusive.co.uk/";
  $.ajax({
    type: 'GET',
    url: baseUrl + 'home/logout',
    data: {},
    success:function(resp){
      $('.logout-li').html('<a class="nav-link login-sign" data-toggle="modal" data-target="#loginModal" href="javascript:void(0);"> LOGIN / REGISTER </a>');
    }
  });
}  
function update_currency(val){
  var baseUrl = "https://allinclusive.co.uk/";
  var currencyTypeResult="";
  $('#currency').html(val);
  $.ajax({
    type: 'GET',
    url: baseUrl+'home/update_currency',
    data: {source:currencyTypeResult,to:val},
    success:function(resp){
      window.location.reload();
    }
  });
}
</script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!--our section-->
<div class="hotel-section" id="hotDeals">
  <div class="container">
    <h2 class="head-text">Hotel Findings</h2>
    <div class="row">
  @foreach($alltargethotels as $alltargethotel =>$values)
     <div class="col-md-6">
        <div class="hotel-items">
          <div class="row">
            <div class="col-sm-6 pr-0">
              <div class="top-section">
                <!--<img src="trvx-static-asset-files/images/hotel-1.jpg" alt="Top Hotel" />-->
                <img src="https://allinclusive.co.uk/trvx-static-asset-files/cms/top_hotel_deals/Radisson Blu Hotel Riyadh.jpg" alt="Top Hotel" />
                <div class="mask"></div>
              </div>
            </div>
            <div class="col-sm-6 pl-0">
              <div class="bottom-section">
              <h4>{!! $values['hotelData']['hotelName'] !!}</h4>
                <div class="star-rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i> 
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <h4 class="price mb-0">
                  <p>Price per night:</p>            
                  </h4>
                <div class="">
                    <form action="" method="post" accept-charset="utf-8"><div style="display:none">
                    <input type="hidden" name="csrf_souq" value="1444c84beb1f701f2eeeef64fe76e113" />
                      </div>                                                 
                        <input type="hidden" name="city" value="Sugar Bay Barbados, Hastings, Barbados">
                        <input type="hidden" name="city_id" value="192430">
                        <input type="hidden" name="latlong" value="0">
                        <input type="hidden" name="flag" value="0">
                        <input type="hidden" name="checkin" value="06/03/2121">
                        <input type="hidden" name="checkout" value="13/03/2121">
                        <input type="hidden" name="room_count" value="1">
                        <input type="hidden" name="adult[]" value="2">
                        <button type="submit" class="btn btn-default">View Rooms</button>
                    </form>                
                    </div>
                </div>
            </div>
          </div>
          </div>
    </div>
    @endforeach
<!-- one hotel -->
      </div>
    </div>
  </div>
<!--our section -->
<script src="https://allinclusive.co.uk/trvx-static-asset-files/js/jquery-ui.min.js"></script>
<script src="https://allinclusive.co.uk/trvx-static-asset-files/js/wow.min.js"></script>

<script src="https://allinclusive.co.uk/trvx-static-asset-files/Validation/js/jquery.validationEngine.js" defer></script>
<script src="https://allinclusive.co.uk/trvx-static-asset-files/Validation/js/languages/jquery.validationEngine-en.js" defer></script>

<script src="https://allinclusive.co.uk/trvx-static-asset-files/js/moment.min.js"></script>
<script src="https://allinclusive.co.uk/trvx-static-asset-files/js/daterangepicker.min.js"></script>
<script src="https://allinclusive.co.uk/trvx-static-asset-files/js/jquery.toast.min.js"></script>
    <script>
    $(document).ready(function(){
        /*Form Validations*/
        $("#flight_searchs").validationEngine();
        $("#hotel_searchs").validationEngine();
        $("#carsform").validationEngine();
        $("#holydayform").validationEngine();
        $("#subscription_form").validationEngine();
        
        
        /*Flight Module*/
        $("#airport_from, #airport_to").keyup(function() {
            $(this).autocomplete({
              source: 'https://allinclusive.co.uk/home/airport_dests_agent_flight',
              minLength: 1,
              autoFocus: true,
              select: function(event, ui) {
                  if(ui.item.value =="") {
                      event.preventDefault();
                  }else if(ui.item.value =="No Result") {
                    $(this).val('');
                  } else {
                    $(this).val(ui.item.label);
                  }
                  return false;
              },
              change: function (event, ui) {
               if (ui.item === null) {
                  $(this).val('');
               }
              }
            }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                return $( "<li>" ).data( "ui-autocomplete-item", item ).append(item.name).appendTo( ul );
            };
        }); 
        $("#airport_from, #airport_to").focusin(function() {
          $(this).autocomplete({
            source: "https://allinclusive.co.uk/home/top_flights",
            minLength: 0
          }).focus(function(){
            $(this).data("uiAutocomplete").search($(this).val());
          }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                return $( "<li>" ).data( "ui-autocomplete-item", item ).append(item.name).appendTo( ul );
            };
          
          
        });
        $("#departure").datepicker({
            numberOfMonths: 2,
            dateFormat: 'dd/mm/yy',
            maxDate: '361d',
            minDate: 0,
            firstDay: 0,
            inline: true,
        });
        $("#departure").change(function() {
          var selectedDate1 = $("#departure").datepicker('getDate');
              selectedDate1cp=selectedDate1;
          var nextdayDate = dateADD1(selectedDate1);
          
          var nextDateStr = zeroPad(nextdayDate.getDate(), 2) + "/" + zeroPad((nextdayDate.getMonth() + 1), 2) + "/" + (nextdayDate.getFullYear());
          $t = nextDateStr;
          $("#return").val($t);
          $("#return").datepicker({
              numberOfMonths: 2,
              firstDay: 0,
              dateFormat: 'dd/mm/yy',
              minDate: selectedDate1cp,
              inline: true,
          });
        });
        $("#fli_sel_airlines").autocomplete({
            source: 'https://allinclusive.co.uk/home/airline_list',
            minLength: 1,
            autoFocus: true,
            change: function (event, ui) {
                if (ui.item === null) {
                    $(this).val('');
                }
            }
        });
        $(document).on('change','.prefered_airline',function(){
            $("#fli_sel_airlines").val('');
            if($(this).prop("checked") == true){
                $(".prefered-input").slideDown("slow");
            }else{
                $(".prefered-input").slideUp("slow");
            }
        });

        //hotel
        $("#location").keyup(function(){
            console.log('done');
            $("#location").autocomplete({
        		source: "https://allinclusive.co.uk/" + "home/hotel_dest_auto",
        		minLength: 2,
        		autoFocus: !0,
        		select: function (t, e) {
        			if (e.item.value == "No Result") {
        				$(this).val('');
        			} else {
        				$(this).val(e.item.label);
            			$("input[name='city_id']").val(e.item.id);
            			$("input[name='latlong']").val(e.item.latlong);
            			$("input[name='flag']").val(e.item.flag);
        			}
        			return false;
        		},
        		change: function (event, ui) {
        			if (ui.item === null) {
        				$(this).val('');
        			}
        		}
        	}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                return $( "<li>" ).data( "ui-autocomplete-item", item ).append(item.label2).appendTo( ul );
            };
        });
    // 	$("#checkin").datepicker({
    // 		numberOfMonths: 2,
    // 		dateFormat: 'dd/mm/yy',
    // 		maxDate: '361d',
    // 		minDate: 0,
    // 		firstDay: 0,
    // 		inline: true,
    // 	});
    // 	$("#checkin").change(function () {
    // 		var selectedDate1 = $("#checkin").datepicker('getDate');
    // 		var nextdayDate = dateADD1(selectedDate1);
    // 		var nextDateStr = zeroPad(nextdayDate.getDate(), 2) + "/" + zeroPad((nextdayDate.getMonth() + 1), 2) + "/" + (nextdayDate.getFullYear());
    // 		$t = nextDateStr;
    // 		$("#checkout").val($t);
    // 		$("#checkout").datepicker({
    // 			numberOfMonths: 2,
    // 			firstDay: 0,
    // 			dateFormat: 'dd/mm/yy',
    // 			minDate: selectedDate1,
    // 			inline: true,
    // 		});
    // 	});
        
        //Car
        $("#pickup_location").autocomplete({
          source: 'https://allinclusive.co.uk/home/car_locations',
          minLength: 1,
          autoFocus: true,
          select: function(event, ui){
            var str = ui.item.value;
            $(this).val(str);
            if($("#clickReturn"). prop("checked") == true){
              $("#drop_location").val(str);
            }
            return false;
          },
          change: function (event, ui) {
            if (ui.item === null) {
              $(this).val('');
            }
          }
        });
        $("#drop_location").autocomplete({
          source: 'https://allinclusive.co.uk/home/car_locations',
          minLength: 1,
          autoFocus: true,
          change: function (event, ui) {
            if (ui.item === null) {
              $(this).val('');
            }
          }
        });  
        $("#clickReturn").click(function(){
          if($("#clickReturn"). prop("checked") == true){
            $("#drop_location").val($("#pickup_location").val());
          }else{
            $("#drop_location").val('');
          }
        });    
        $("#pkp_date").datepicker({
          numberOfMonths: 2,
          dateFormat: 'dd/mm/yy',
          maxDate: '361d',
          minDate: 0,
          firstDay: 0,
          inline: true,
        });
        $("#pkp_date").change(function() {
          var selectedDate1 = $("#pkp_date").datepicker('getDate');
          selectedDate1cp=selectedDate1;
          var nextdayDate = dateADD1(selectedDate1);
          var nextDateStr = zeroPad(nextdayDate.getDate(), 2) + "/" + zeroPad((nextdayDate.getMonth() + 1), 2) + "/" + (nextdayDate.getFullYear());
          $t = nextDateStr;
          $("#drp_date").val($t);
          $("#drp_date").datepicker({
            numberOfMonths: 2,
            firstDay: 0,
            dateFormat: 'dd/mm/yy',
            minDate: selectedDate1cp,
            inline: true,
          });
        });
        
        //Holiday
        $("#vacation_city").autocomplete({
          source: 'https://allinclusive.co.uk/holidays/holiday_dest',
          minLength: 1,
          autoFocus: true,
          select: function(event, ui) {
            var str = ui.item.value;
            var words = str.match(/([^-]+)/g) || [];
            words.forEach(function(word, i) {
              words[i] = word[0].toUpperCase() + word.slice(1);
            });
            var ar = words.join('');
            $(this).val(ar);
            $(this).trigger('change');
            
            if(str == 'No Result'){
              $(this).val('');
            }
            return false;
          },
          change: function (event, ui) {
            if (ui.item === null) {
              $(this).val('');
            }
          }
        });
        
        // Newsletter
        $('#subscription_form').submit(function(){
          event.preventDefault();
          var subscriptionEmail=$("#subscriptionEmail").val();
          if(subscriptionEmail){
            $.ajax({
              url:"https://allinclusive.co.uk/home/add_subscription",
              method:'POST',
              data:{
                  'csrf_souq':'1444c84beb1f701f2eeeef64fe76e113',
                  subscriptionEmail:subscriptionEmail
              },
              success:function(data){
                $("#inputEmail").val('');
                $("#subscription_label").show();
                if(data==2){
                  $('#subscription_form :input').val('');
                  $("#subscription_label").html('<b style="color:GREEN;">Subscribed</b>');
                }else{
                  $("#subscription_label").html('<b style="color:RED;">Email ID already exist!!!</b>');
                }
                setTimeout(function(){
                  $("#subscription_label").text('');
                  $("#subscription_label").hide();
                }, 3000);
              }
            });
          }
        });  
        
    });
      
    
    function dateADD1(currentDate) {
      var valueofcurrentDate = currentDate.valueOf() + (24 * 60 * 60 * 1000);
      var newDate = new Date(valueofcurrentDate);
      return newDate;
    }
    function dateADD2(currentDate) {
      var valueofcurrentDate = currentDate.valueOf() + (24 * 60 * 60 * 1000 * 2);
      var newDate = new Date(valueofcurrentDate);
      return newDate;
    }
    function dateADD3(currentDate) {
      var valueofcurrentDate = currentDate.valueOf() + (24 * 60 * 60 * 1000 * 3);
      var newDate = new Date(valueofcurrentDate);
      return newDate;
    }
    function zeroPad(num, count){
        var numZeropad = num + '';
        while (numZeropad.length < count) {
            numZeropad = "0" + numZeropad;
        }
        return numZeropad;
    }
    
    
    $(document).ready(function() {
            $("#guests").focus(function() {
                $(this).siblings(".addguest").fadeIn()
            }),
          $(".btn-done span").on("click", function() {
              var rcount = $(".noOfRoomsSel").val();
              childSum = 0, $(".childSelected").each(function() {
                  optionSelected = $("option:selected", this), valueSelected = this.value, childSum += parseFloat(valueSelected)
              }), adultSum = 0, $(".adultSelected").each(function() {
                  optionSelected = $("option:selected", this), valueSelected = this.value, adultSum += parseFloat(valueSelected)
              }), totalGuest = adultSum + childSum, $("#guests").val(totalGuest + " Guests, "+rcount+" Rooms"), $(".addguest").fadeOut()
          })
      }), $(document).ready(function() {
          $("body").on("change", ".childSelected", function(e) {
              optionSelected = $("option:selected", this), valueSelected = this.value, myVal = $(this).parent().parent().parent().parent().data("value"), "0" == valueSelected ? ($(this).parent().parent().parent().siblings(".specifyAge").hide(), $(this).parent().parent().parent().siblings(".specifyAge").children().children().children(".childAge").hide()) : ($(this).parent().parent().parent().siblings(".specifyAge").show(), function() {
                  for (html = [], i = 0; i < valueSelected; i++) varr = "child_age[" + myVal + "][]", html.push('<div class="col-6 childAge"><div class="inner-field"><select class="yi-select cAgeSelected form-control" name="' + varr + '"><option value="2">2</option><option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option> <option value="7">7</option> <option value="8">8</option> <option value="9">9</option> <option value="10">10</option> <option value="11">11</option> <option value="12">12</option> </select> </div></div>')
              }(), $(this).parent().parent().parent().siblings(".specifyAge").children().children(".specifyChildrenAges").html(html.join("")))
          }), $(".noOfRoomsSel").on("change", function(e) {
              optionSelected = $("option:selected", this), valueSelected = this.value,
                  function() {
                      for (html = [], i = 1; i < valueSelected; i++) divVal = i, roomCnt = i + 1, html.push('<div class="room-container row" data-value="' + divVal + '"> <div class="col-xs-12 col-sm-2 col-md-2"> <label class="roomTitl"> Room <span class="roomCount">' + roomCnt + '</span> </label> </div><div class="col-xs-12 col-sm-5 col-md-5"> <div class="adult"> <div class="inner-field"> <span class="inner-titles">Adult</span> <select class="yi-select adultSelected form-control" name="adult[]" id="adult_count' + roomCnt + '"> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option> </select> </div><label class="guestTitl"><small>(12+ yrs)</small></label> </div></div><div class="col-xs-12 col-sm-5 col-md-5"> <div class="child"> <div class="inner-field"> <span class="inner-titles">Children</span> <select class="yi-select childSelected form-control" name="child[]" id="child_count' + roomCnt + '" data_count="0"> <option value="0">0</option> <option value="1">1</option> <option value="2">2</option>  </select> </div><label class="guestTitl"><small>(2-12 yrs)</small></label> </div></div><div class="clearfix"></div><div class="specifyAge" style="display:none"><div class=""> <label class="guestTitl" style="float:none;">Specify Children ages (2-12 yrs)</label> <div class="row specifyChildrenAges" style="float:none;width:100%"> </div></div></div></div><div class="clearfix"></div>')
                  }(), $(".appendRoom").html(html.join(""))
          })
      });
      
      $(".guest-input").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            $('.addguest').toggle();
       });
   
</script>

<script type="text/javascript">
        // jQuery(document).ready(function(){
            $(function() {
            
              $('#hotel-date').daterangepicker({
                  autoApply: true,
                  autoUpdateInput: false,
                  minDate: new Date(),
                  locale: {
                      cancelLabel: 'Clear',
                      applyLabel: "Done"
                  }
              });
            
            
            
              $('#hotel-date').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD MMM, YY') + ' - ' + picker.endDate.format('DD MMM, YY'));
                $("#checkin").val(picker.startDate.format('DD-MM-YYYY'));
                $("#checkout").val(picker.endDate.format('DD-MM-YYYY'));
              });
            
              $('#hotel-date').on('cancel.daterangepicker', function(ev, picker) {
                  $(this).val('');
              });
            
            });
        // });
    </script>    
<script>
    $('#currency_change').change(function(){
        currency = $(this).val();
        // console.log(currency);
        var baseUrl = "https://allinclusive.co.uk/";
          var currencyTypeResult="";
          $('#currency').html(currency);
          $.ajax({
            type: 'GET',
            url: baseUrl+'home/update_currency',
            data: {source:currencyTypeResult,to:currency},
            success:function(resp){
              window.location.reload();
            }
          });
    });
</script>
      
      
<script>
  $('.options').owlCarousel({
      loop:false,
      margin:30,
     nav: true,
     dots:false,
    navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>"
    ],
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          1000:{
              items:3
          }
      }
  });
  </script>

  <script>
  $('.package-options').owlCarousel({
      loop:false,
      margin:30,
     nav: true,
     dots:true,
    navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>"
    ],
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          1000:{
              items:3
          }
      }
  });
  </script>

<script>
  $('.custom-options').owlCarousel({
      loop:false,
      margin:30,
     nav: false,
     dots:true,
    navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>"
    ],
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          1000:{
              items:3
          }
      }
  });
  </script>
 </body>
</html>
