<!-- Complete Email template -->

<body style="background-color:#e1e1e1">
<table align="center" border="0" cellpadding="0" cellspacing="0"
       width="550" bgcolor="white" style="border:2px solid rgba(0,0,0,0); margin-top: 25px; margin-bottom: 25px">
    <tbody style="margin: 10px; border-radius: 15px">
    <!--<tr style="background-color: #3a3791;">-->
    <!--    <td align="center">-->
    <!--        <table align="center" border="0" cellpadding="0"-->
    <!--               cellspacing="0" class="col-550" width="550">-->
    <!--            <tbody>-->
    <!--            <tr>-->
    <!--                <td colspan="3" align="center" style="background-color: #3a3791;-->
				<!--						height: 50px; margin: 10px;">-->

    <!--                    <a href="#" style="text-decoration: none;">-->
    <!--                        <p style="color:white;-->
				<!--								font-weight:bold;">-->
    <!--                            HR Platform Ensrv-->
    <!--                        </p>-->
    <!--                        <p style="color:white;-->
				<!--								font-weight:bold;">-->
    <!--                            Key Performance Indicator (KPI)-->
    <!--                        </p>-->
    <!--                    </a>-->
    <!--                </td>-->
    <!--            </tr>-->
    <!--            <tr>-->
    <!--                <td colspan="3" align="center" style="background-color: #3a3791;-->
				<!--						height: 80px;margin: 10px;">-->
    <!--                    <img class="img-fluid d-block animation-one"  style="    height: 50%; width: 50%; margin:5px" src="{{asset("assets/images/ensrv.png")}}">-->
    <!--                </td>-->
    <!--            </tr>-->
    <!--            </tbody>-->
    <!--        </table>-->
    <!--    </td>-->
    <!--</tr>-->

    <tr style="display: inline-block;">
        <td style="height: 150px;
						padding: 20px;
						border: none;
						border-bottom: 2px solid rgba(54,27,14,0);
						background-color: white;">

       <!--     <h2 style="text-align: center; color:#3a3791;-->
							<!--align-items: center;">-->
       <!--         Activate Your Account-->
       <!--     </h2>-->
            <p class="data"
               style="text-align: justify-all;
							align-items: center;
							font-size: 15px;
							padding-bottom: 12px;">
                Greetings,
                <br>
            <p class="data"
               style="text-align: justify-all;
							align-items: center;
							font-size: 15px;
							padding-bottom: 12px;">
We have received a request to reset the password for your HR
Platform.Please click on the activation link:
<br> 
</p>
            <h3>
                <a style="padding:15px" href="{{ route('reset.password.get', $token) }}">Insert Password Reset Activation Link</a></h3>
            <p class="data"
               style="text-align: justify-all;
							align-items: center;
							font-size: 15px;
							padding-bottom: 12px;">
                This link will direct you to a secure page where you can enter
your new password.
            <br>
               If you did not initiate this password reset request, please
disregard this email and contact our support team.
            </p>
            <br>
            <p class="data"
               style="text-align: justify-all;
							align-items: center;
							font-size: 15px;
							padding-bottom: 12px;">
                Best regards,
                <br>
                Training and development
                <br>
                HR Team
            </p>
            
        </td>
    </tr>
</tbody>
</table>
</body>


