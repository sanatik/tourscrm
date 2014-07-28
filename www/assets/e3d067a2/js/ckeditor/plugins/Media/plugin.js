/**
 * Provides a toolbar button and a dialog to add pasted html code for embed remote media,
 * or uploaded flv choose with file Browser played by  into edited contents.
 *
 * @author Vincent Mazenod
 * @see doc on http://forge.clermont-universite.fr/wiki/ckmedia
 * @see Based on http://github.com/n1k0/ckMedia
 * @see Based on http://github.com/n1k0/ckMediaEmbed
 * @license
 *
 */
(function () {

    var d = new Date();
    var config = {
        // General
        player:'/themes/akorda/media/player/player.swf',
        replacement:'/themes/akorda/media/images/replacement.gif',
        swfobject:'/themes/akorda/media/js/jwplayer.js',
        yt:CKEDITOR.basePath + 'plugins/Media/yt.swf',
        player_id:'player_' + d.getTime(),
        div_id:'media_' + d.getTime(),
        version:'9',
        allowfullscreen:'true',
        allowscriptaccess:'always',
        wmode:'opaque',

        plugins:'gapro-1',
        'gapro.accountid':'UA-XXXXXXX-X',

        width:570,
        height:320,


        // TAB - single
        file:'',
        image:'',
        author:'',
        description:'',
        duration:'',
        start:'',
        title:'',
        provider:'',
        //TAB - playlist
        playlistfile:'',
        playlist:'',
        playlistsize:'',
        //TAB - player
        backcolor:'',
        frontcolor:'',
        lightcolor:'',
        screencolor:'',
        controlbar:'',
        dock:'',
        skin:'',
        autostart:'',
        bufferlength:'',
        icons:'',
        item:'',
        mute:'',
        quality:'',
        repeat:'',
        shuffle:'',
        stretching:'',
        volume:'',
        linktarget:'',
        streamer:''
    };

    function refreshConfig(key, value) {
        config[key] = value;
    }

    function processConfig() {
        code = "<video class='videostream' data-src='" + config['file'] + "' width='" + config['width'] + "' height='" + config['height'] + "' id='" + config['div_id'] + "'></video>\n";
        return code;
    }

    function processAudioConfig() {
        code = "<audio class='audiostream' data-src='" + config['file'] + "' width='291' height='21' id='" + config['div_id'] + "'></audio>\n";
        return code;
    }

    CKEDITOR.plugins.add('Media', {
        init:function (editor) {
            console.log(editor);
            CKEDITOR.dialog.add('MediaDialog', function (editor) {
                return {
                    title:'Видео / Аудио',
                    minWidth:500,
                    minHeight:200,

                    onLoad:function () {
                        dialog = this;
                    },
                    contents:[
                        {
                            /**
                             *  TAB - single
                             *  Dialog for JWplayer plays a single FLV
                             */
                            id:'single',
                            label:'Видео',
                            expand:true,
                            elements:[
                                {
                                    // BTN - Browse Media File
                                    type:'hbox',
                                    align:'center',
                                    widths:[ '80%', '20%'],
                                    children:[
                                        {
                                            id:'VideoFile_' + editor.name,
                                            type:'text',
                                            'default':config['file'],
                                            onBlur:function () {
                                                refreshConfig('file', this.getDialog().getContentElement('single', 'VideoFile_' + editor.name).getValue());
                                                this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                            },
                                            label:'Видео'
                                        },
                                        {
                                            id:'BrowseVideoFile_' + editor.name,
                                            type:'button',
                                            hidden:true,
                                            filebrowser:{
                                                action:'Browse',
                                                onSelect:function (fileUrl, data) {
                                                    this.getDialog().getContentElement('single', 'VideoFile_' + editor.name).setValue(fileUrl);
                                                    refreshConfig('file', this.getDialog().getContentElement('single', 'VideoFile_' + editor.name).getValue());
                                                    this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                                }
                                            },
                                            label:'Выбрать на сервере',
                                            style:'margin-top: 12px; float:right'
                                        }
                                    ]
                                },
                                {
                                    // BOX - 2 columns
                                    type:'hbox',
                                    align:'center',
                                    widths:[ '50%', '50%'],
                                    children:[
                                        {
                                            type:'vbox',
                                            children:[
                                                {
                                                    id:'MediaWidth_' + editor.name,
                                                    type:'text',
                                                    'default':config['width'],
                                                    onBlur:function () {
                                                        refreshConfig('width', this.getDialog().getContentElement('single', 'MediaWidth_' + editor.name).getValue());
                                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                                    },
                                                    label:'Width (px)'
                                                },
                                                {
                                                    id:'MediaHeight_' + editor.name,
                                                    type:'text',
                                                    'default':config['height'],
                                                    onBlur:function () {
                                                        refreshConfig('height', this.getDialog().getContentElement('single', 'MediaHeight_' + editor.name).getValue());
                                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                                    },
                                                    label:'Height (px)'
                                                }
                                            ]
                                        }
                                    ]
                                }
                            ]
                        },

                        {
                            /**
                             *  TAB - single
                             *  Dialog for JWplayer plays a single FLV
                             */
                            id:'audio',
                            label:'Аудио',
                            expand:true,
                            elements:[
                                {
                                    // BTN - Browse Media File
                                    type:'hbox',
                                    align:'center',
                                    widths:[ '80%', '20%'],
                                    children:[
                                        {
                                            id:'MediaFile_' + editor.name,
                                            type:'text',
                                            'default':config['file'],
                                            onBlur:function () {
                                                refreshConfig('file', this.getDialog().getContentElement('audio', 'MediaFile_' + editor.name).getValue());
                                                refreshConfig('width', this.getDialog().getContentElement('audio', 'MediaWidth_' + editor.name).getValue());
                                                refreshConfig('height', this.getDialog().getContentElement('audio', 'MediaHeight_' + editor.name).getValue());
                                                this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processAudioConfig());
                                            },
                                            label:'Аудио'
                                        },
                                        {
                                            id:'BrowseMediaFile_' + editor.name,
                                            type:'button',
                                            hidden:true,
                                            filebrowser:{
                                                action:'Browse',
                                                onSelect:function (fileUrl, data) {
                                                    this.getDialog().getContentElement('audio', 'MediaFile_' + editor.name).setValue(fileUrl);
                                                    refreshConfig('file', this.getDialog().getContentElement('audio', 'MediaFile_' + editor.name).getValue());
                                                    refreshConfig('width', this.getDialog().getContentElement('audio', 'MediaWidth_' + editor.name).getValue());
                                                    refreshConfig('height', this.getDialog().getContentElement('audio', 'MediaHeight_' + editor.name).getValue());
                                                    this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processAudioConfig());
                                                }
                                            },
                                            label:'Выбрать на сервере',
                                            style:'margin-top: 12px; float:right'
                                        },
                                        {
                                            // BOX - 2 columns
                                            type:'hbox',
                                            align:'center',
                                            widths:[ '50%', '50%'],
                                            children:[
                                                {
                                                    type:'vbox',
                                                    children:[
                                                        {
                                                            id:'MediaWidth_' + editor.name,
                                                            type:'text',
                                                            'default':291,
                                                            onBlur:function () {
                                                                refreshConfig('width', this.getDialog().getContentElement('audio', 'MediaWidth_' + editor.name).getValue());
                                                                this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processAudioConfig());
                                                            },
                                                            label:'Width (px)'
                                                        },
                                                        {
                                                            id:'MediaHeight_' + editor.name,
                                                            type:'text',
                                                            'default':21,
                                                            onBlur:function () {
                                                                refreshConfig('height', this.getDialog().getContentElement('audio', 'MediaHeight_' + editor.name).getValue());
                                                                this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processAudioConfig());
                                                            },
                                                            label:'Height (px)'
                                                        }
                                                    ]
                                                }
                                            ]
                                        }
                                    ]
                                }
                            ]
                        },
                        {
                            /**
                             *  TAB - code
                             *  simple copy / paste box for embed from youtube, vime, daylymotion etc ...
                             *  Or see Generated code for JW Player
                             */
                            id:'code',
                            label:'Код',
                            expand:true,
                            elements:[
                                {
                                    type:'textarea',
                                    id:'Code_' + editor.name,
                                    rows:20
                                }
                            ]
                        }
                    ],
                    onOk:function () {
                        editor.insertHtml("<div class='videoplayer' style='width:" + config['width'] + "px; height:" + config['height'] + "px; border:1px #CCC solid; margin: 0 auto;' id='" + config['div_id'] + "_box'>" +
                            "" + dialog.getContentElement('code', 'Code_' + editor.name).getValue() + "</div>");
                    }
                };
            });

            editor.addCommand('Media', new CKEDITOR.dialogCommand('MediaDialog'));

            editor.ui.addButton('Media', {
                label:'Media',
                command:'Media',
                icon:this.path + 'images/add.gif'
            });

            if (editor.addMenuItems) {
                editor.addMenuItems(//have to add menu item first
                    {
                        removeMedia://name of the menu item
                        {
                            label:'Media',
                            command:'removeMedia',
                            icon:this.path + 'images/remove.gif',
                            group:'removeMedia'  //have to be added in config
                        }
                    });
            }

            editor.addCommand('removeMedia', new CKEDITOR.removeMedia());

            if (editor.contextMenu) {
                editor.contextMenu.addListener(function (element, selection)  //function to be run when context menu is displayed
                {
                    if (!element || !element.is('img') || element.getId() == element.getParent().getId())
                        return null;

                    return { removeMedia:CKEDITOR.TRISTATE_OFF };
                });
            }
        }
    });
})();

CKEDITOR.removeMedia = function () {
};
CKEDITOR.removeMedia.prototype =
{
    /** @ignore */
    exec:function (editor) {
        editor.getSelection().getSelectedElement().getParent().getParent().remove();
    }
};
