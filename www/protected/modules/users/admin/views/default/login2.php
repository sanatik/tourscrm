<link rel="stylesheet" href="/themes/lxadmin/styles/modal-message.css"/>
<script type="text/javascript" src="/themes/lxadmin/js/ajax.js"></script>
<script type="text/javascript" src="/themes/lxadmin/js/modal-message.js"></script>
<script type="text/javascript" src="/themes/lxadmin/js/ajax-dynamic-content.js"></script>

<script type="text/javascript">
    $(function(){
        $var = '<br><form class="form-horizontal" id="login-form" action="/users/default/login/" method="post"><div class="control-group "><label class="control-label required" for="LoginForm2_username2">Имя пользователя <span class="required">*</span></label><div class="controls"><input name="LoginForm2[username2]" id="LoginForm2_username2" type="text" /><span class="help-inline error" id="LoginForm2_username2_em_" style="display: none"></span></div></div><div class="control-group "><label class="control-label required" for="LoginForm2_password2">Пароль <span class="required">*</span></label><div class="controls"><input name="LoginForm2[password2]" id="LoginForm2_password2" type="password" /><span class="help-inline error" id="LoginForm2_password2_em_" style="display: none"></span></div></div><div class="form-actions"><button class="btn btn-primary btn-large" id="yw0" type="submit" name="yt0">Войти</button></div></form>';
		displayMessage($var);
    });
</script>

<script type="text/javascript">
    messageObj = new DHTML_modalMessage();
    messageObj.setShadowOffset(5);	// Размер тени

    function displayMessage(messageContent)
    {
        messageObj.setHtmlContent(messageContent);
        //messageObj.setSize(300,150);
        messageObj.setCssClassMessageBox(false);
        messageObj.setSource(false);	// Внешний файл не подгружаем
        messageObj.setShadowDivVisible(false);	//Включить(true)/Выключить (false) тень
        messageObj.display();
    }

    function closeMessage()
    {
        messageObj.close();
    }
</script>