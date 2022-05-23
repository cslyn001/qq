<!DOCTYPE html>
<html>
<head>
<title>E-Portfolio</title>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/media.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/contact.css') }}">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Maitree|Ropa+Sans" rel="stylesheet">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />-->

<style>
.msg-alert{
  display: none;
  position: fixed;
  left: 50%;
 -ms-transform: translate(-50%);
  transform: translate(-50%);
  bottom:0;
  z-index: 9999;
}

.msg-alert p{
  font-family: calibri;
  border-radius: 5px 5px 0px 0px;
  padding: 5px 8px;
  font-size: 20px;
  color: white;
}

body {
  /*background: #eee;*/
  background-image: url(assets/images/cvsub.png);
  background-repeat: no-repeat;
  background-size: 1600px 800px;
  background-blend-mode: normal;
}
.container {
  width: 80%;
  margin:20px auto;
}
.carousel {
  border: 2px solid #d3d6d6;
  height: 400px;
  overflow: hidden;
  position: relative;
  border-radius: 5px;
  background: transparent;
  box-shadow: black;
}
.slider {
  display: flex;
  height: 100%;
  width: 400%;
}
.slider section {
  flex-basis: 100%;
  justify-content: center;
  align-items: center;
  display: flex;
  font-size: 20px;
  color:black;
}
.left, .right {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
}
.arrow i {
  font-size: 70px;
  -webkit-user-select: none;
  color: #a5a5a5;
}
.left {
  left: 10px;
}
.right {
  right: 10px;
}
.control ul {
  list-style: none;
  display: flex;
  position: absolute;
  bottom: 0;
  left: 50%;
  margin: 0;
  padding: 0;
  transform: translate(-50%);
}
.control ul li {
  width: 10px;
  height: 10px;
  background: rgb(253, 253, 253);
  border: 0px solid rgb(118, 118, 118);
  border-radius: 50px;
  margin: 10px;
  cursor: pointer;
}
.control ul li.selected {
  background: transparent;
}
.abouts{
    color:green;
    font-family: 'Didact Gothic', sans-serif;
    font-weight: 300;
}

.address{
   text-align: justify;
   margin-left: 65px;
    padding: 5px;
    font-size: smaller;
    font-family: 'Roboto', sans-serif;
    position: absolute;
    top: 290px;
    left: 45px;
}
.mail{
    text-align: justify;
    margin-left: 70px;
     padding: 5px;
     font-size: smaller;
     font-family: 'Roboto', sans-serif;
     position: absolute;
     padding-right: 280px;
     top: 258px;
     right: 715px;
}
 .facebook{
    text-align: justify;
    margin-left: 50px;
     padding: 5px;
     font-size: smaller;
     font-family: 'Roboto', sans-serif;
     position: absolute;
     padding-right: 365px;
     top: 290px;
     right: 305px;
 }
 .message{
    /* position: absolute; */
    top: 180px;
    right: 200px;
    /* width: 200px; */
    height: 800px;
    font-weight: bold;
    font-size: 25px;
    font-family: 'Roboto', sans-serif;
    color:#4C9A2A;
    position: absolute;
    padding-right: 330px;
 }
 .phone{
    text-align: justify;
    margin-left: 70px;
     padding: 5px;
     font-size: smaller;
     font-family: 'Roboto', sans-serif;
     position: absolute;
     padding-right: 280px;
     top: 258px;
     right: 360px;
 }
 .reset{
    text-align: justify;
    margin-left: 70px;
     padding: 5px;
     font-size: smaller;
     font-family: 'Roboto', sans-serif;
     position: absolute;
     padding-right: 280px;
     top: 255px;
     right: 0px;
 }
 .input_log{
     background: #fff;
    transition: all 800ms;
    width: 257px;
    border-radius: 3px 0 0 3px;
    font-family: 'Ropa Sans', sans-serif;
    border: solid 1px #ccc;
    border-right: none;
    outline: none;
    color: #999;
    height: 38.5px;
    line-height: 40px;
    display: inline-block;
    padding-left: 10px;
    font-size: 16px;
 }
 .input_reg{
    background: #fff;
    transition: all 800ms;
    width: 257px;
    border-radius: 3px 0 0 3px;
    font-family: 'Ropa Sans', sans-serif;
    border: solid 1px #ccc;
    border-right: none;
    outline: none;
    color: #999;
    height: 38.5px;
    line-height: 40px;
    display: inline-block;
    padding-left: 10px;
    font-size: 16px;
 }






</style>
<link rel="apple-touch-icon" sizes="57x57" href="images/icon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/icon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/icon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/icon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/icon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/icon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/icon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/icon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/icon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="images/icon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/icon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/icon/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</head>

<body id="home">
	<div class="msg-alert"><p></p></div>
	<!-- <div class="cssload-loader">
	<div class="cssload-flipper">
		<div class="cssload-front"></div>
		<div class="cssload-back"></div>
	</div><br/>
	<center><span id="loading">Loading</span></center>
	</div> -->
<!--
	<div class="clr-switch"></div>
	<div class="bubble-1"></div>
	<div class="bubble-2"></div>
	<div class="bubble-3"></div> -->

	<div id="login-form">
	<input type="radio" id="login" name="switch" class="hide" checked>
	<input type="radio" id="signup" name="switch" class="hide">
	<div>
		<ul class="form-header">
		<li><label for="login"><i class="material-icons"></i> LOGIN</li>
		<li><label for="signup"><i class="material-icons"></i> REGISTER</label></li>
		</ul>
	</div>

	<div class="section-out">
		<section class="login-section">
			<div class="login">
				<form id="form_login" name="form_login" action="{{url('user-login')}}" method="post">
                    @csrf
					<ul class="ul-list">
						<li><input type="email" id="log_email" name="email" required class="input" placeholder="Email Address" required="" /><span class="icon"><i class="material-icons">local_post_office</i></span></li>

                       		<!--<li>-->
                       		<!--    <div class="input-group">-->
                         <!--       <input type="password" id="password" name="password" class="form-control">-->
                         <!--       <span class="input-group-btn">-->
                         <!--       <button class="btn btn-default" type="button" id="check"><span id="eye" class="glyphicon glyphicon-eye-close" aria-hidden="true"></span></button>-->
                         <!--       </span>-->
                       		<!--</li>-->
                       		<!--<li><input type="password" id="log_passwd" name="password" required class="input" minlength="4" maxlength="32" placeholder="Your Password" required="" /><span class="icon"> <i class="material-icons">lock</i></span></li>-->

                            <li>
                                
                            <input type="password" name="password" id="log_passwd" class="input_log" placeholder="Password">
                            <span class="icon"><i class="material-icons"></i></span>
                            <i class="bi bi-eye-slash" style="margin-left: -40px; cursor: pointer; top: 2px; font-size: 18px;" id="togglePassword"></i>
                            
                            </li>
                       		
                       		
                        
						<li><input type="submit" id="submit" name="submit" value="Sign in" class="btn"></li>

						<li><input type="button" value="Close" class="btn close"></li>

						<span class="errorTxt"></span>
						<div id="status"></div>
					</ul>
				</form>
			</div>	<!-- login -->
		</section>

		<section class="signup-section">
			<div class="login">
				<form id="form_signup" name="form_signup" action="{{url('user-register')}}" method="post">
                    @csrf
					<ul class="ul-list">
						<li>
                            <input type="text" required pattern="^[a-zA-Z ]+$" class="input" id="reg_name" name="reg_name" maxlength="32" placeholder="First Name"/><span class="icon"><i class="material-icons">account_box</i></span>
                        </li>
                        <li>
                            <input type="text" pattern="^[a-zA-Z ]+$" class="input" id="reg_mname" name="reg_mname" maxlength="32" placeholder="Middle Initial"/><span class="icon"><i class="material-icons">account_box</i></span>
                        </li>
						<li>
                            <input type="text" required pattern="^[a-zA-Z ]+$" class="input" id="reg_lname" name="reg_lname" maxlength="32" placeholder="Last Name"/><span class="icon"><i class="material-icons">account_box</i></span>
                        </li>
                        <li>
                            <input type="text" pattern="^[a-zA-Z ]+$" class="input" id="reg_sname" name="reg_sname" maxlength="10" placeholder="Suffix Name"/><span class="icon"><i class="material-icons">account_box</i></span>
                        </li>
						<li>
                            <input type="email" required class="input" id="reg_email" name="email" placeholder="Email Address"/><span class="icon"><i class="material-icons">local_post_office</i></span>
                        </li>
                        <li>
                            <select required class="input" id="reg_user_type" name="reg_user_type">
                                <option value="" selected disabled>Select account type</option>
                                <option value="3">Student</option>
                                <option value="2">Faculty</option>
                            </select><span class="icon"><i class="material-icons">account_box</i></span>
                        </li>
						<!--<li><input type="password" required class="input" id="reg_passwd" name="reg_passwd" placeholder="Password"/><span class="icon"><i class="material-icons">lock</i></span></li>-->
      <!--              <li><input type="password" required="" class="input" id="c_password" name="c_password" placeholder="Confirm Password"/><span class="icon"><i class="material-icons">lock</i></span></li>-->
						
				    	<!--<li>-->
         <!--                   <input type="password" required class="input" id="reg_passwd" name="reg_passwd" placeholder="Password"/><span class="icon"><i class="material-icons">lock</i></span>-->
         <!--               </li>-->
                        
                        
                            <li>
                                
                            <input type="password" name="reg_passwd" id="reg_passwd" class="input_log" placeholder="Password">
                            <span class="icon"><i class="material-icons"></i></span>
                            <i class="bi bi-eye-slash" style="margin-left: -40px; cursor: pointer; top: 2px; font-size: 18px;" id="RegPassword"></i>
                            
                            </li>
                            
                             <li>
                                
                            <input type="password" name="c_password" id="c_password" class="input_log" placeholder="Confirm Password">
                            <span class="icon"><i class="material-icons"></i></span>
                            <i class="bi bi-eye-slash" style="margin-left: -40px; cursor: pointer; top: 2px; font-size: 18px;" id="ConfirmPassword"></i>
                            
                            </li>
                        
                        
                        
                        
                        <!--<li>-->
                        <!--    <input type="password" required="" class="input" id="c_password" name="c_password" placeholder="Confirm Password"/><span class="icon"><i class="material-icons">lock</i></span>-->
                        <!--</li>-->
                        
						<li><input type="submit" id="signup-btn" value="Sign up" class="btn"></li>

					</ul>

				</form>
			</div>	<!-- login -->
		</section>
	</div>	<!-- section-out -->
	</div>	<!-- login-form -->

	<header>
		<div class="wrap-width">
		<a href="#home">
			<div class="navbar-logo">
				<img src="{{asset('assets/images/head.png')}}"/>
				<!-- <img id="hat" src="images/hat.png"/> -->
			</div> <!-- navbar-logo -->
		</a>
		<!--<a href="#nav"><i class="material-icons">reorder</i></a>-->
		<div class="horizontal-page-links" id="nav">
            @if (!Auth::check())
                <div class="register-user">
                    <a id="register">Register</a>
                    <a id="login">Login</a>
                </div>	<!-- register-user -->
            @endif

			<ul>
				<div class="sliding-out links"><li><a href="#home">Home</a></li></div>
				<div class="sliding-out links"><li><a href="#about">About </a></li></div>
				<div class="sliding-out links"><li><a href="#contact">Contact </a></li></div>

                @if (Auth::check())
                    @php
                        $url = Auth::user()->user_type == 3 ? 'student/dashboard' : 'admin/dashboard';
                    @endphp

                    <div class="sliding-out links"><li><a href="{{ url(''.$url) }}" style="color: black!important;"><i class="fa fa-user"></i></a></li></div>
                    <div class="last-navbar-link"><li></li></div>
                @endif
			</ul>

		</div> <!-- horizontal-page-links -->
		</div>
	</header>

	<div class="content">
	<!-- Welcome Page -->
	<div class="welcome wrap-width">
		<div class="empty-layout"></div>
		<center>
		<!--<img class="welcome-image" src="{{ asset('assets/images/announcement.png    ') }}" width="300" style="margin-top: 20%;">-->
		<div class="welcome-text" style="text-align:center!important;">
			<p id="text-heading" style="color:green;">Announcements</p><br>
            <div class="container">
              <div class="carousel">
                <div class="slider">
                    <!--@isset($anoun)-->
                        @foreach($anoun as $i)
                            <section>{{$i->title}}<br><br>{{$i->content}}</section>
                        @endforeach
                    <!--@endisset-->
                </div>
                <div class="control">
                  <span class="arrow left">
                    <i class="material-icons">
                    keyboard_arrow_left
                    </i>
                  </span>
                  <span class="arrow right">
                    <i class="material-icons">
                    keyboard_arrow_right
                    </i>
                  </span>
                  <ul>
                    <li class="selected"></li>
                    <li></li>
                    <li></li>
                    <li></li>
                  </ul>
                </div>
              </div>
            </div>

        {{-- <center>
            <p id="text-context" class="text-center" style="text-align:center;">Announcement</p>
        </center> --}}
		</div> <!-- welcome-text -->
		</center>
	</div>	<!-- welcome -->


	<!-- Content -->
	<div class="about-container clearfix wrap-width" id="about">
        <p id="text" style="color:green;">About</p><hr class="style-1" style="width: 600px; align-self: center;" color="green"><br/> 

		<div class="col-container">
		    <p id="text" style="color:green; ">e-Portfolio Management System in Cavite State University Trece Martires City Campus</p> 
            <div class="form-group row">
                <div class="about">
                    e-Portfolio Management System will help the students from Cavite State University Trece Martires City Campus <br> to compile and organize their records of learning that they will use in the future. Also, this system will help the student <br> if they want to download their certificates and different achievements for future reference like in finding or applying for a job <br>using the resume that the e-Portfolio will generate.
                   <br>
                    <br> The primary goal of this system is to help the students and faculty member to save and compile the records of <br> them in terms of their important documents such as certificates and different proof of achievements.
                </div>
            </div>

        </div>
        </div>
		</div> <!-- col-conatiner -->
	</div>	<!-- About-container -->
	<!-- end content -->

	<!-- Content -->
    <br>
    <br>
    <br>

	<div class="about-container clearfix wrap-width" id="contact">
        <p id="text" style="color:green;">Contact Us</p><hr class="style-1" style="width: 600px; align-self: center;" color="green">
	
        <div class="container">
            <form action="/action_page.php">
              <div class="row">
                <h4 style="text-align:center"> If you have any concern just contact us!</h4>
                </div> 
             </div>

                <div class="form-group row">


                    <div class="phone">
                        <i class="fa fa-phone fa-2x" aria-hidden="true">  09351818908</i>
                    </div>

                    <div class="mail">
                        <i class="fa fa-envelope fa-2x " aria-hidden="true"> eportfolio.cvsutrecemartires@gmail.com</i>
                    </div>
                    
                    <div class="facebook">
                        <i class="fa fa-facebook-square fa-2x " aria-hidden="true"> <a href="https://www.facebook.com/eportfolio.tmc.cvsu">e-portfolio</a></i>
                    </div>
                    
                    <div class="reset">
                        <i class="fa fa-file fa-2x " aria-hidden="true"> <a href="https://forms.gle/PQ7AJbo8mymp4jdq9">Reset Password</a></i>
                    </div>

                    <div class="address">
                        <i class="fa fa-map-marker fa-2x" aria-hidden="true">  Trece Martires City, Cavite</i>
                    </div>

            </div>

              </div>
            </form>
            <div class="design" id="successMsg">{{Session::get('success')}}</div>
            <div id="errorMsg">{{Session::get('errorExist')}}</div>
          </div>


    </div>
</div>


		<!--{{-- <div class="col-container">-->
		<!--	<p>Sample content</p>-->
		<!--</div> <!-- col-conatiner --> --}}-->

	</div>	<!-- About-container -->
	<!-- end content -->


	<footer>
		<a href="#home"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
		<div id="copyrights">
				<span class="siteName">e-Portfolio ©  2021. All rights reserved.</span>
            </div><!--copyrights-->
	</footer>
	


</script>
	
	
<script async type="text/javascript">
    
        const ConfirmPassword = document.querySelector("#ConfirmPassword");
        const c_password = document.querySelector("#c_password");

        ConfirmPassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = c_password.getAttribute("type") === "password" ? "text" : "password";
            c_password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });


</script>
	
	
	<script async type="text/javascript">
    
        const RegPassword = document.querySelector("#RegPassword");
        const reg_passwd = document.querySelector("#reg_passwd");

        RegPassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = reg_passwd.getAttribute("type") === "password" ? "text" : "password";
            reg_passwd.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });


</script>

<script type="text/javascript">

        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#log_passwd");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        // const form = document.querySelector("form");
        // form.addEventListener('submit', function (e) {
        //     e.preventDefault();
        // });
</script>





<script defer src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script defer type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.12.0/additional-methods.js"></script>
<script defer src="{{ asset('assets/js/animate.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>






<script>
    const successMsg = document.getElementById('successMsg');
    if (successMsg.textContent.length > 0) {
        swal(successMsg.textContent);
    }

    const errorMsg = document.getElementById('errorMsg');
    if (errorMsg.textContent.length > 0) {
        swal(errorMsg.textContent);
    }

</script>

<script>
    const left = document.querySelector('.left');
    const right = document.querySelector('.right');

    const slider = document.querySelector('.slider');

    const indicatorParent = document.querySelector('.control ul');
    const indicators = document.querySelectorAll('.control li');
    index = 0;

    indicators.forEach((indicator, i) => {
      indicator.addEventListener('click', () => {
        document.querySelector('.control .selected').classList.remove('selected');
        indicator.classList.add('selected');
        slider.style.transform = 'translateX(' + (i) * -25 + '%)';
        index = i;

      });
    });

    left.addEventListener('click', function() {
      index = (index > 0) ? index -1 : 0;
      document.querySelector('.control .selected').classList.remove('selected');
      indicatorParent.children[index].classList.add('selected');
      slider.style.transform = 'translateX(' + (index) * -25 + '%)';
    });

    right.addEventListener('click', function() {
      index = (index < 4 - 1) ? index+1 : 3;
      document.querySelector('.control .selected').classList.remove('selected');
      indicatorParent.children[index].classList.add('selected');
      slider.style.transform = 'translateX(' + (index) * -25 + '%)';
    });
    </script>

@section('user-js')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

    // <script>

    //     $(document).ready(function(){
    //         $(".toggle-password").click(function () {
    //             $(".showPwd").toggleClass("fa-eye fa-eye-slash");
    //             var input = $(this).parent().parent().find("input");

    //             if (input.attr("type") == "password") {
    //                 input.attr("type", "text");
    //             } else {
    //                 input.attr("type", "password");
    //             }
    //         });

    //         $('.pwd').on("cut copy paste", function (e) {
    //             e.preventDefault();
    //         });
    //     });

    // </script>






// <script type="text/javascript">
// 	$("#password").password('toggle');
// </script>

</body>

</html>
@endsection

