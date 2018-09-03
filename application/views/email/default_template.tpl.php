<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>    
        <meta name="viewport" content="width=device-width"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title><?=site_title?></title>
    </head>
    <body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;">
        <div class="Email_template" style="background: #FE8800; width: 640px; margin: 0 auto; padding: 8px 0;">
            <!------------------------------------ ---- HEADER -------------------------- ------------------------------------->
            <table class="head-wrap" bgcolor="#FE8800" style="width: 100%; border-spacing: 0;">
                <tr>
                    <td class="header container" style="display: block!important; max-width: 600px!important; margin: 0 auto!important; clear: both!important; padding:0;">
                        <div class="content" style="max-width: 600px; margin: 0 auto; display: block;">
                            <table bgcolor="#ffffff" style="width: 100%; border-spacing: 0;">
                                <tr>
                                    <td align="center" style="padding:0;">	
                                        <img class="logo_div" src="<?=base_url()?>assets/images/logo-white.png" style="margin: 30px auto; width: 210px;">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
            <!------------------------------------ ---- BODY -------------------------- ------------------------------------->
            <table class="body-wrap" style="width: 100%; border-spacing: 0;margin-left: 1px;">
                <tr>
                    <td class="container" bgcolor="#FFFFFF" style="display: block!important; max-width: 600px!important; margin: 0 auto!important; clear: both!important; padding: 0;">
                        <!-- content -->
                        <div class="content"  style="max-width: 600px; margin: 0 auto; display: block;">

                        </div>
                        <!-- COLUMN WRAP -->
                        <div class="content" style="max-width: 600px; margin: 0 auto; display: block;">
                            <table  style="width: 100%; border-spacing: 0; padding: 0 50px;">
                                <tr>
                                    <td align="left">
                                        <h2 class="welcme_user" style="font-weight: 200;font-size:16px; margin: 25px 0; color: #333;">Hi <?= ucwords($tousername)?>,</h2>
                                        <div class="border_bottom" style="border-bottom: 1px solid #eee; margin: 0px auto;"></div>
                                        <!-- /hero -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="welcome_description" style="color: #333; font-size: 14px;"><?= ucfirst($message)?></p>
                                    </td>
                                </tr>
                                <?php if(isset($othermsg)){echo $othermsg;} ?>


                                <tr style=" line-height: 1.6; color: #333; font-size: 10px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <br></br>
                                        <p ><?=site_title?> Team</p>
                                        <p style="font-weight:600;">Email:<?=email_bottem_email?></p>
                                        <p style="font-weight:600;">Hotline: +91 <?=email_bottem_phone?></p>

                                    </td>
                                </tr>



                            </table>
                        </div>


                    </td>
                    <td>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>