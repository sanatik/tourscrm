<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Luxorka
 * Date: 24.01.13
 * Time: 11:59
 * To change this template use File | Settings | File Templates.
 */
Yii::import('ext.uppod.uppod_codec', true);
class LXUppodWidget extends CWidget {
    public $width = 645;
    public $height = 360;
    public $params;
    public $id = 'player';
    public $type = 'json';


    public function run() {
        Yii::app()->clientScript->registerScriptFile('https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js', CClientScript::POS_HEAD);

        echo CHtml::openTag('div', array('id' => $this->id));
        echo CHtml::closeTag('div');

        $params = uppod_encode(CJSON::encode($this->params + array('uid' => $this->id)));

        $js = '

   var ua = navigator.userAgent.toLowerCase();
   var flashInstalled = false;
   if (typeof(navigator.plugins)!="undefined"&&typeof(navigator.plugins["Shockwave Flash"])=="object"){
      flashInstalled = true;
   } else if (typeof window.ActiveXObject != "undefined") {
      try {
         if (new ActiveXObject("ShockwaveFlash.ShockwaveFlash")) {
            flashInstalled = true;
         }
      } catch(e) {};
   };
   if(ua.indexOf("iphone") != -1 || ua.indexOf("ipad") != -1 || (ua.indexOf("android") != -1 && !flashInstalled)){
      this.player = new Uppod({st:"' . $params . '"});
   }else{
      if(!flashInstalled){
         //просим установить Flash
         document.getElementById("videoplayer").innerHTML="<a href=http://www.adobe.com/go/getflashplayer>Требуется обновить Flash-плеер</a>";
      }else{
        var flashvars = {st:\'' . $params . '\'};
               var params = {bgcolor:"#ffffff", wmode:"opaque", allowFullScreen:"true", allowScriptAccess:"always"};
               swfobject.embedSWF("/themes/front/player/uppod.swf", "' . $this->id . '", "' . $this->width . '", "' . $this->height . '", "10.0.0.0", false, flashvars, params);
    }
   }';


        Yii::app()->clientScript->registerScript('lxUppodPlayer', $js, CClientScript::POS_END);


    }
}
?>
