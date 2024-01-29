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
                Welcome to HR Platform! 
            <p class="data"
               style="text-align: justify-all;
							align-items: center;
							font-size: 15px;
							padding-bottom: 12px;">
Please note that upon successful activation, please log in with the username and password you&#39;ve created to access our tools seamlessly. It&#39;s crucial to keep your login details secure and not share your password with others to effectively protect your credentials.
<br>
<b>
To start, please activate your account by clicking the link below:
</b>
</p>
            <h3>
                <a style="padding:15px;margin:20px; background-color:#5b9bd5; color:white !important" href="{{ route('activate',  ['token' => $activation_token]) }}">Activate Your Account</a></h3>
            <p class="data"
               style="text-align: justify-all;
							align-items: center;
							font-size: 15px;
							padding-bottom: 12px;">
               This is an automated notification from our HR platform, and we kindly ask that you do not reply. However, should you require any assistance or have inquiries, please do not hesitate to contact our HR team:
            </p>
            <br>
            <div>
                
                <?php 
                $employee = App\Models\Employee::where('activation_token',$activation_token)->get();
                ?>

                @if($employee[0]->company_id == 1)
                <div style="float: left; text-align: center;
    width: 40%;">
                    Mr. Salman Ismail
                    <br>
                    HR Supervisor
                    <br>
                    Mobile / WhatsApp: 70257025
                </div>
                @elseif($employee[0]->company_id == 2)
                <div style="float: left; text-align: center;
    width: 40%;">
                    Mr. Mohammed Basil
                    <br>
                    HR Supervisor
                    <br>
                    Mobile / WhatsApp: 77510972
                </div>
                @elseif($employee[0]->company_id == 3)
                <div style="float: left; text-align: center;
    width: 40%;">
                    Mr. Saivan Rodrigues
                    <br>
                    HR Supervisor
                    <br>
                    Mobile / WhatsApp: 66119756
                </div>
                @endif
                
                <div style="float: right; text-align: center;
    width: 40%; margin-button:5px">
                    Mr. Mohamed Mahrous
                    <br>
                    HR Supervisor
                    <br>
                    Mobile / WhatsApp: 70589493
                </div>
                
            </div>
            <div style="clear: both;"></div>
            <p class="data"
               style="text-align: justify-all;
							align-items: center;
							font-size: 15px;
							padding-bottom: 12px;">
                We appreciate your valuable contributions to the company.
                <br>
                Best regards,
                <br>
                HR Team
            </p>
            
        </td>
    </tr>
</tbody>
</table>
</body>