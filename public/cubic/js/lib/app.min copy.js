"use strict";var _iPanoramaAppData={VERSION:"1.1.1",config:{version:"1.1.1",panoramaSize:"none",panoramaWidth:0,panoramaHeight:0,customCSS:!1,customCSSContent:"",theme:"ipnrm-default",imagePreview:!0,imagePreviewUrl:"",autoLoad:!1,autoRotate:!1,autoRotateInactivityDelay:3e3,mouseWheelRotate:!1,mouseWheelRotateCoef:.2,mouseWheelZoom:!1,mouseWheelZoomCoef:.05,hoverGrab:!1,hoverGrabYawCoef:20,hoverGrabPitchCoef:20,grab:!0,grabCoef:.1,showControlsOnHover:!1,showZoomCtrl:!0,showFullscreenCtrl:!0,title:!0,compass:!1,keyboardNav:!0,keyboardZoom:!0,popover:!0,popoverTemplate:'<div class="ipnrm-popover">\n<div class="ipnrm-close"></div>\n<div class="ipnrm-arrow"></div>\n<div class="ipnrm-content"></div>\n</div>',popoverPlacement:"top",popoverShowTriggerHover:!0,popoverShowTriggerClick:!1,popoverHideTriggerLeave:!0,popoverHideTriggerClick:!1,popoverHideTriggerGrab:!1,popoverHideTriggerManual:!1,popoverShowClass:null,popoverHideClass:null,pitchLimits:!0,mobile:!1,sceneId:null,sceneFadeDuration:3e3,scenes:[]},scene:{selected:null,dragged:null,dirty:!1},hotspot:{selected:null,dragged:null,dirty:!1},tabPanel:{general:{id:"general",isActive:!0,popoverShowClass:{modalTemplateUrl:"assets/views/modal-getshowclass.html"},popoverHideClass:{modalTemplateUrl:"assets/views/modal-gethideclass.html"}},scenes:{id:"scenes",isActive:!1},hotspots:{id:"hotspots",isActive:!1}},mainMenu:{getcode:{isModal:!0,modalTemplateUrl:"assets/views/modal-getcode.html"},save:{isModal:!0,modalTemplateUrl:"assets/views/modal-save.html"},load:{isModal:!0,modalTemplateUrl:"assets/views/modal-load.html"}},upload:{getFilesUrl:"file-get.php",deleteFileUrl:"file-delete.php",uploadFileUrl:"file-upload.php",uploadFolder:"upload",modalTemplateUrl:"assets/views/modal-upload.html",files:[],selectedFile:null,uploadFile:null,isActive:!1},storage:{configName:"New Config",configs:[],selectedConfig:null},panoramaCfg:null,panoramaReady:!1,panorama:null,modal:!1,winHeight:0,winWidth:0,preview:!1,targetTool:!1,selectedPopoverClass:null,imageId:null,uploadUrl:"",fn:{mainMenuItemInit:function(a,b,c){b.on("click",function(){a.appData.fn.mainMenuItemClick(a)})},mainMenuItemClick:function(a){var b=a.appData.mainMenu,c=b[a.id];c.isModal&&a.appData.fn.showModal(a,c.modalTemplateUrl,prettyPrint)},tabPanelItemInit:function(a,b,c){b.on("click",function(b){b.preventDefault(),a.appData.fn.tabPanelItemClick.call(this,a)})},tabPanelItemClick:function(a){if(!a.appData.tabPanel[a.id].isActive){var b=a.appData.tabPanel;for(var c in b)b.hasOwnProperty(c)&&(b[c].isActive=!1);a.appData.tabPanel[a.id].isActive=!0,a.$root.safeApply()}},selectImageInit:function(a,b,c){b.on("click",function(b){b.preventDefault(),a.appData.fn.selectImageClick.call(this,a)})},selectImageClick:function(a){a.appData.imageId=a.id,a.appData.fn.upload.showModal(a)},selectPopoverShowClass:function(a,b,c){b.on("click",function(){a.appData.fn.getPopoverShowClass(a)})},selectPopoverHideClass:function(a,b,c){b.on("click",function(){a.appData.fn.getPopoverHideClass(a)})},getPopoverShowClass:function(a){a.appData.selectedPopoverClass=null,a.appData.fn.showModal(a,a.appData.tabPanel.general.popoverShowClass.modalTemplateUrl,a.appData.fn.getPopoverClassInit)},getPopoverHideClass:function(a){a.appData.selectedPopoverClass=null,a.appData.fn.showModal(a,a.appData.tabPanel.general.popoverHideClass.modalTemplateUrl,a.appData.fn.getPopoverClassInit)},getPopoverClassInit:function(){var a=function(){var a=document.createElement("fakeelement"),b={animation:"animationend",MSAnimationEnd:"msAnimationEnd",OAnimation:"oAnimationEnd",MozAnimation:"mozAnimationEnd",WebkitAnimation:"webkitAnimationEnd"};for(var c in b)if(void 0!==a.style[c])return b[c]};jQuery(".ipnrm-ui-btn[data-fx-name]").on("click",function(a){var b=jQuery(a.target),c=b.data("fx-name");b.removeClass(c).addClass(c)}),jQuery(".ipnrm-ui-btn[data-fx-name]").on(a(),function(a){var b=jQuery(a.target),c=b.data("fx-name");b.hasClass(c)&&b.removeClass(c)})},showModal:function(a,b,c){var d=b;a.appData.srv.$templateRequest(d).then(function(b){var d=angular.element(b);jQuery("#ipnrm-ui-modal-data").empty().append(d),a.appData.srv.$compile(d)(a),a.appData.modal=!0,c&&"function"==typeof c&&c.call(this)},function(){})},getImageFullPath:function(a,b){return b?a.uploadUrl+b:""},getSceneKeyById:function(a){return a.replace(/ /g,"").toLowerCase()},getConfig:function(a){var b={};if(b.theme=a.config.theme,a.config.imagePreview&&a.config.imagePreviewUrl&&(b.imagePreview=a.config.imagePreviewUrl),b.autoLoad=a.config.autoLoad,b.autoRotate=a.config.autoRotate,b.autoRotateInactivityDelay=a.config.autoRotateInactivityDelay,b.mouseWheelRotate=a.config.mouseWheelRotate,b.mouseWheelRotateCoef=a.config.mouseWheelRotateCoef,b.mouseWheelZoom=a.config.mouseWheelZoom,b.mouseWheelZoomCoef=a.config.mouseWheelZoomCoef,b.hoverGrab=a.config.hoverGrab,b.hoverGrabYawCoef=a.config.hoverGrabYawCoef,b.hoverGrabPitchCoef=a.config.hoverGrabPitchCoef,b.grab=a.config.grab,b.grabCoef=a.config.grabCoef,b.showControlsOnHover=a.config.showControlsOnHover,b.showZoomCtrl=a.config.showZoomCtrl,b.showFullscreenCtrl=a.config.showFullscreenCtrl,b.title=a.config.title,b.compass=a.config.compass,b.keyboardNav=a.config.keyboardNav,b.keyboardZoom=a.config.keyboardZoom,b.popover=a.config.popover,a.config.popover){var c=a.config.popoverTemplate;c=c.replace(/(?:\r\n|\r|\n)/g,""),c=c.replace(/ /g,""),'<divclass="ipnrm-popover"><divclass="ipnrm-close"></div><divclass="ipnrm-arrow"></div><divclass="ipnrm-content"></div></div>'!=c&&(b.popoverTemplate=a.config.popoverTemplate),b.popoverPlacement=a.config.popoverPlacement,b.popoverShowTrigger=(a.config.popoverShowTriggerHover?"hover ":"")+(a.config.popoverShowTriggerClick?"click ":""),b.popoverHideTrigger=(a.config.popoverHideTriggerLeave?"leave ":"")+(a.config.popoverHideTriggerClick?"click ":"")+(a.config.popoverHideTriggerGrab?"grab ":"")+(a.config.popoverHideTriggerManual?"manual ":""),b.popoverShowTrigger=b.popoverShowTrigger.trim(),b.popoverHideTrigger=b.popoverHideTrigger.trim(),a.config.popoverShowClass&&a.config.popoverShowClass.length>0&&(b.popoverShowClass=a.config.popoverShowClass),a.config.popoverHideClass&&a.config.popoverHideClass.length>0&&(b.popoverHideClass=a.config.popoverHideClass)}b.pitchLimits=a.config.pitchLimits,b.mobile=a.config.mobile,a.config.scenes.length>0&&(b.sceneId=a.fn.getSceneKeyById(a.config.scenes[0].id),b.sceneFadeDuration=a.config.sceneFadeDuration);for(var d={},e=0;e<a.config.scenes.length;e++){var f=a.config.scenes[e],g={};if(f.isVisible){if(g.type=f.config.type,"cube"==f.config.type?g.image={front:f.config.imageFront,back:f.config.imageBack,left:f.config.imageLeft,right:f.config.imageRight,top:f.config.imageTop,bottom:f.config.imageBottom}:g.image=f.config.imageFront,0!=f.config.yaw&&(g.yaw=f.config.yaw),0!=f.config.pitch&&(g.pitch=f.config.pitch),75!=f.config.zoom&&(g.zoom=f.config.zoom),f.config.compassNorthOffset&&(g.compassNorthOffset=f.config.compassNorthOffset),f.config.title&&(g.title=f.config.title,g.titleHtml=f.config.titleHtml),f.config.hotspots.length>0){for(var h=[],i=0;i<f.config.hotspots.length;i++){var j=f.config.hotspots[i],k={};j.isVisible&&(k.yaw=j.config.yaw,k.pitch=j.config.pitch,"none"!=j.config.sceneId&&(k.sceneId=j.config.sceneId),j.config.custom&&(k.className=j.config.customClassName,k.content=j.config.customContent),j.config.popover&&(k.popoverHtml=j.config.popoverHtml,k.popoverContent=j.config.popoverContent,"default"!=j.config.popoverPlacement&&(k.popoverPlacement=j.config.popoverPlacement),j.config.popoverWidth&&(k.popoverWidth=j.config.popoverWidth)),h.push(k))}g.hotSpots=h}var l=a.fn.getSceneKeyById(f.id);d[l]=g}}return b.scenes=d,b},updateConfigUrls:function(a,b){b.hasOwnProperty("imagePreview")&&(b.imagePreview=a.uploadUrl+b.imagePreview);for(var c in b.scenes)if(b.scenes.hasOwnProperty(c)){var d=b.scenes[c];"cube"==d.type?(d.image.front=a.uploadUrl+d.image.front,d.image.back=a.uploadUrl+d.image.back,d.image.left=a.uploadUrl+d.image.left,d.image.right=a.uploadUrl+d.image.right,d.image.top=a.uploadUrl+d.image.top,d.image.bottom=a.uploadUrl+d.image.bottom):d.image=a.uploadUrl+d.image}return b},preview:function(a){var b=a.fn.getConfig(a),b=a.fn.updateConfigUrls(a,b);jQuery("#ipnrm-ui-preview-canvas").ipanorama(b),a.preview=!0},previewClose:function(a){jQuery("#ipnrm-ui-preview-canvas").ipanorama("destroy"),a.preview=!1},getConfigCode:function(a){ console.log(a.fn.getConfig(a).scenes); var b='$("#mypanorama").ipanorama('+JSON.stringify(a.fn.getConfig(a),null,2)+");";return b},trunc:function(a,b){return a&&a.length>b?a.substr(0,b-1)+"...":a},upload:{init:function(a){a.appData.fn.upload.getFileNames(a.appData)},showModal:function(a){a.appData.fn.showModal(a,a.appData.upload.modalTemplateUrl)},getFileNames:function(a){a.srv.$http.get(a.upload.getFilesUrl).success(function(b){a.upload.files=b})},doUpload:function(a){if(a.upload.uploadFile){a.upload.isActive=!0;var b=new FormData;b.append("file",a.upload.uploadFile),a.srv.$http({url:a.upload.uploadFileUrl,method:"POST",data:b,headers:{"Content-Type":void 0}}).success(function(b){if(b.success){a.srv.growl.success(b.msg,{title:"Success!"});for(var c=!1,d=a.upload.files.length;d--;){var e=a.upload.files[d];if(e.filename==b.filename){c=!0;break}}c||a.upload.files.push({filename:b.filename})}else a.srv.growl.error(b.msg,{title:"Error!"})})["finally"](function(){a.upload.isActive=!1})}},selectFile:function(a){if(a.upload.selectedFile){var b=a.upload.uploadFolder+"/"+a.upload.selectedFile.filename;"preview"==a.imageId?a.config.imagePreviewUrl=b:"front"==a.imageId?a.scene.selected.config.imageFront=b:"back"==a.imageId?a.scene.selected.config.imageBack=b:"left"==a.imageId?a.scene.selected.config.imageLeft=b:"right"==a.imageId?a.scene.selected.config.imageRight=b:"top"==a.imageId?a.scene.selected.config.imageTop=b:"bottom"==a.imageId&&(a.scene.selected.config.imageBottom=b)}},deleteFile:function(a){a.upload.selectedFile&&a.srv.$http({url:a.upload.deleteFileUrl,method:"POST",data:"filename="+a.upload.selectedFile.filename,headers:{"Content-Type":"application/x-www-form-urlencoded"}}).success(function(b){if(b.success){a.srv.growl.success(b.msg,{title:"Success!"});for(var c=a.upload.files.length;c--;){var d=a.upload.files[c];if(d.filename==b.filename){a.upload.files.splice(c,1);break}}}else a.srv.growl.error(b.msg,{title:"Error!"})})}},storage:{init:function(a){a.appData.storage.configs=a.appData.fn.storage.getConfigNames(a.appData),a.$root.safeApply()},filterData:function(a){var b=[];for(var c in a)0===c.indexOf("ipanorama_config__")&&b.push(angular.fromJson(a[c]));return b},sanitizeName:function(a){return a.toLowerCase().replace(/\s/g,"_")},getConfigId:function(a,b){return"ipanorama_config__"+a.fn.storage.sanitizeName(b)},getConfigObjectForSave:function(a){var b=a.storage.configName,c=a.fn.storage.getConfigId(a,b),d={id:c,name:b,config:angular.merge({},a.config)};return d},saveConfig:function(a){var b=a.fn.storage.getConfigObjectForSave(a),c=angular.toJson(b);a.fn.storage.save(b.cfgId,c),a.storage.configs=a.fn.storage.getConfigNames(a)},save:function(a,b){window.localStorage.setItem(a,b)},saveAs:function(a){a.fn.storage.saveConfig(a)},getConfig:function(a){return window.localStorage[a]},getConfigs:function(a){return a.fn.storage.filterData(window.localStorage)},getConfigNames:function(a){for(var b=a.fn.storage.getConfigs(a),c=[],d=0;d<b.length;d++)c.push({id:b[d].id,name:b[d].name});return c},load:function(a){if(a.storage.selectedConfig){var b=a.fn.storage.getConfig(a.storage.selectedConfig.id);a.fn.storage.loadJson(a,b)}},remove:function(a){a.storage.selectedConfig&&(window.localStorage.removeItem(a.storage.selectedConfig.id),a.storage.configs=a.fn.storage.getConfigNames(a))},saveToFile:function(a){var b=a.fn.storage.getConfigObjectForSave(a),c=angular.toJson(b),d=new File([c],a.storage.configName+".json",{type:"application/json;charset=utf-8"});saveAs(d)},loadFromFile:function(a){var b=jQuery("#ipnrm-load-from-file").off("change");b.on("change",jQuery.proxy(function(b){var c=b.target.files[0],d=new FileReader;d.onload=jQuery.proxy(function(b){var c=b.target.result;a.fn.storage.loadJson(a,c),jQuery(window).trigger("resize")},this),d.readAsText(c)},a)),b.click()},loadJson:function(a,b){if(b){var c=angular.fromJson(b);a.scene.selected=null,a.hotspot.selected=null,a.tabPanel.general.isActive=!0,a.tabPanel.scenes.isActive=!1,a.tabPanel.hotspots.isActive=!1,a.storage.configName=c.name,a.config=angular.merge({},c.config);for(var d=a.config.scenes.length;d--;){var e=a.config.scenes[d];if(e.isSelected){a.scene.selected=e;for(var d=a.scene.selected.config.hotspots.length;d--;){var f=a.scene.selected.config.hotspots[d];if(f.isSelected){a.hotspot.selected=f;break}}break}}a.fn.workspace.layout(a),a.fn.workspace.refreshScene(a)}}},workspace:{init:function(a,b,c){var d=jQuery("#ipnrm-ui-meta-ui-cfg").val();if(d){var e=angular.fromJson(d);a.appData.config=angular.merge(a.appData.config,e)}jQuery(window).on("resize",jQuery.proxy(function(){this.appData.fn.workspace.resize(this)},a)),a.appData.panoramaCfg={autoLoad:!0,autoRotate:!1,showZoomCtrl:!1,showFullscreenCtrl:!1,onCameraUpdate:jQuery.proxy(a.appData.fn.workspace.onCameraUpdate,a),onHotSpotSetup:jQuery.proxy(a.appData.fn.workspace.onHotspotSetup,a),hotSpotSetup:!1},a.appData.panorama=jQuery("#ipnrm-ui-canvas"),a.$watchGroup(["appData.scene.selected","appData.scene.selected.config.type","appData.scene.selected.config.imageFront","appData.scene.selected.config.imageBack","appData.scene.selected.config.imageLeft","appData.scene.selected.config.imageRight","appData.scene.selected.config.imageTop","appData.scene.selected.config.imageBottom"],jQuery.proxy(function(){this.appData.scene.dirty=!0},a)),a.$watchGroup(["appData.hotspot.selected","appData.hotspot.selected.isVisible","appData.hotspot.selected.config.yaw","appData.hotspot.selected.config.pitch"],jQuery.proxy(function(){this.appData.fn.workspace.updateHotspots(this.appData)},a)),a.appData.fn.workspace.layout(a.appData),a.appData.fn.workspace.refreshScene(a.appData)},resize:function(a){a.appData.fn.workspace.layout(a.appData),a.$root.safeApply()},layout:function(a){var b=jQuery(window);a.winWidth=b.outerWidth(),a.winHeight=b.outerHeight()},refreshScene:function(a){a.scene.dirty&&(a.fn.workspace.updateScene(a),a.scene.dirty=!1),setTimeout(a.fn.workspace.refreshScene,2e3,a)},onCameraUpdate:function(a,b,c){this.appData.scene.dirty||(this.appData.scene.selected.yaw=Math.round(1e5*a)/1e5,this.appData.scene.selected.pitch=Math.round(1e5*b)/1e5,this.appData.scene.selected.zoom=Math.round(1e5*c)/1e5,this.$root.safeApply())},onHotspotSetup:function(a,b,c,d,e,f){f.ctrlKey&&(this.appData.targetTool?this.appData.fn.hotspots.add(this.appData,a,b):this.appData.hotspot.selected&&(this.appData.hotspot.selected.config.yaw=a,this.appData.hotspot.selected.config.pitch=b,this.appData.hotspot.dirty=!0))},updateScene:function(a){a.panoramaReady&&(a.panorama.ipanorama("destroy"),a.panoramaReady=!1),a.scene.selected&&(a.panoramaCfg.sceneId="main","cube"==a.scene.selected.config.type?a.panoramaCfg.scenes={main:{type:"cube",yaw:a.scene.selected.yaw,pitch:a.scene.selected.pitch,zoom:a.scene.selected.zoom,image:{front:a.fn.getImageFullPath(a,a.scene.selected.config.imageFront),back:a.fn.getImageFullPath(a,a.scene.selected.config.imageBack),left:a.fn.getImageFullPath(a,a.scene.selected.config.imageLeft),right:a.fn.getImageFullPath(a,a.scene.selected.config.imageRight),top:a.fn.getImageFullPath(a,a.scene.selected.config.imageTop),bottom:a.fn.getImageFullPath(a,a.scene.selected.config.imageBottom)}}}:"sphere"==a.scene.selected.config.type?a.panoramaCfg.scenes={main:{type:"sphere",yaw:a.scene.selected.yaw,pitch:a.scene.selected.pitch,zoom:a.scene.selected.zoom,image:a.fn.getImageFullPath(a,a.scene.selected.config.imageFront)}}:"cylinder"==a.scene.selected.config.type&&(a.panoramaCfg.scenes={main:{type:"cylinder",yaw:a.scene.selected.yaw,pitch:a.scene.selected.pitch,zoom:a.scene.selected.zoom,image:a.fn.getImageFullPath(a,a.scene.selected.config.imageFront)}}),a.panorama.ipanorama(a.panoramaCfg),a.panoramaReady=!0,a.hotspot.dirty=!0,a.fn.workspace.updateHotspots(a))},updateHotspots:function(a){if(a.panoramaReady&&a.hotspot.dirty){for(var b=[],c=0;c<a.scene.selected.config.hotspots.length;c++){var d=a.scene.selected.config.hotspots[c],e={};d.isVisible&&(e.yaw=d.config.yaw,e.pitch=d.config.pitch,e.className="ipnrm-ui-hotspot",e.content='<div class="ipnrm-ui-hotspot-label">'+d.id+"</div>",b.push(e))}a.panorama.ipanorama("loadhotspots",{sceneId:"main",hotSpots:b}),a.hotspot.dirty=!1}}},scenes:{add:function(a){var b={id:a.fn.scenes.newName(a),isSelected:!1,isVisible:!0,yaw:0,pitch:0,zoom:75,config:{title:null,titleHtml:!1,type:"sphere",imageFront:"",imageBack:"",imageLeft:"",imageRight:"",imageTop:"",imageBottom:"",yaw:0,pitch:0,zoom:75,compassNorthOffset:null,hotspots:[]}};a.config.scenes.splice(a.config.scenes.indexOf(a.scene.selected)+1,0,b),a.fn.scenes.select(a,b)},copy:function(a,b){if(b){var c=angular.copy(b);c.id=a.fn.scenes.newName(a),c.isSelected=!1,a.config.scenes.splice(a.config.scenes.indexOf(a.scene.selected)+1,0,c),a.fn.scenes.select(a,c)}},copySelected:function(a){a.fn.scenes.copy(a,a.fn.scenes.getSelected(a))},remove:function(a,b){if(b){for(var c=a.config.scenes.length;c--;)if(a.config.scenes[c]===b){a.config.scenes.splice(c,1);break}a.scene.selected==b&&(a.scene.selected=null);var d=a.config.scenes[c]?a.config.scenes[c]:a.config.scenes[c-1];a.fn.scenes.select(a,d)}},removeSelected:function(a){a.fn.scenes.remove(a,a.fn.scenes.getSelected(a))},updown:function(a,b,c){if(b)for(var d=a.config.scenes.length,e=d;e--;)if(a.config.scenes[e]===b){1==c&&e>0?(a.config.scenes[e]=a.config.scenes[e-1],a.config.scenes[e-1]=b):-1==c&&d-1>e&&(a.config.scenes[e]=a.config.scenes[e+1],a.config.scenes[e+1]=b);break}},upSelected:function(a){a.fn.scenes.updown(a,a.fn.scenes.getSelected(a),1)},downSelected:function(a){a.fn.scenes.updown(a,a.fn.scenes.getSelected(a),-1)},newName:function(a){for(var b,c=1,d=function(a,b){for(var c=b.length;c--;){var d=b[c];if(d.id==a)return!0}return!1};c;){if(b="Scene "+c,!d(b,a.config.scenes))return b;c++}},unselect:function(a){for(var b=a.config.scenes.length;b--;){var c=a.config.scenes[b];if(c.isSelected)return void(c.isSelected=!1)}},select:function(a,b){b&&(a.fn.scenes.unselect(a),b.isSelected=!0),a.fn.scenes.onSelect(a,b)},getSelected:function(a){for(var b=a.config.scenes.length;b--;){var c=a.config.scenes[b];if(c.isSelected)return c}return!1},onSelect:function(a,b){if(a.scene.selected=b,b){for(var c=null,d=a.scene.selected.config.hotspots.length;d--;){var e=a.scene.selected.config.hotspots[d];if(e.isSelected){c=e;break}}a.hotspot.selected=c}},dragStart:function(a,b,c,d){b.appData.scene.dragged=b.dragElement,b.appData.fn.scenes.select(b.appData,b.dragElement),b.$root.safeApply()},dragOver:function(a,b,c,d){a.preventDefault(),c.addClass("ipnrm-ui-drag-over")},dragLeave:function(a,b,c,d){a.preventDefault(),c.removeClass("ipnrm-ui-drag-over")},dropScene:function(a,b,c,d){if(a.preventDefault(),c.removeClass("ipnrm-ui-drag-over"),b.appData.scene.dragged){var e=angular.copy(b.appData.scene.dragged);b.appData.config.scenes.splice(b.appData.config.scenes.indexOf(b.appData.scene.dragged),1),b.appData.scene.dragged=null,b.appData.config.scenes.splice(b.appData.config.scenes.indexOf(b.dragOverElement),0,e),b.$root.safeApply()}}},hotspots:{add:function(a,b,c){var d={id:a.fn.hotspots.newName(a),isSelected:!1,isVisible:!0,config:{yaw:b?b:a.scene.selected.yaw,pitch:c?c:a.scene.selected.pitch,sceneId:"none",popover:!1,popoverContent:null,popoverHtml:!0,popoverPlacement:"default",popoverWidth:null,custom:!1,customClassName:null,customContent:null}};a.hotspot.dirty=!0,a.scene.selected.config.hotspots.splice(a.scene.selected.config.hotspots.indexOf(a.hotspot.selected)+1,0,d),a.fn.hotspots.select(a,d)},copy:function(a,b){if(b){var c=angular.copy(b);c.id=a.fn.hotspots.newName(a),c.isSelected=!1,a.hotspot.dirty=!0,a.scene.selected.config.hotspots.splice(a.scene.selected.config.hotspots.indexOf(a.hotspot.selected)+1,0,c),a.fn.hotspots.select(a,c)}},copySelected:function(a){a.fn.hotspots.copy(a,a.fn.hotspots.getSelected(a))},remove:function(a,b){if(b){for(var c=a.scene.selected.config.hotspots.length;c--;)if(a.scene.selected.config.hotspots[c]===b){a.scene.selected.config.hotspots.splice(c,1);break}a.hotspot.selected==b&&(a.hotspot.selected=null),a.hotspot.dirty=!0;var d=a.scene.selected.config.hotspots[c]?a.scene.selected.config.hotspots[c]:a.scene.selected.config.hotspots[c-1];a.fn.hotspots.select(a,d)}},removeSelected:function(a){a.fn.hotspots.remove(a,a.fn.hotspots.getSelected(a))},updown:function(a,b,c){if(b)for(var d=a.scene.selected.config.hotspots.length,e=d;e--;)if(a.scene.selected.config.hotspots[e]===b){1==c&&e>0?(a.scene.selected.config.hotspots[e]=a.scene.selected.config.hotspots[e-1],a.scene.selected.config.hotspots[e-1]=b):-1==c&&d-1>e&&(a.scene.selected.config.hotspots[e]=a.scene.selected.config.hotspots[e+1],a.scene.selected.config.hotspots[e+1]=b);break}},upSelected:function(a){a.fn.hotspots.updown(a,a.fn.hotspots.getSelected(a),1)},downSelected:function(a){a.fn.hotspots.updown(a,a.fn.hotspots.getSelected(a),-1)},newName:function(a){for(var b,c=1,d=function(a,b){for(var c=b.length;c--;){var d=b[c];if(d.id==a)return!0}return!1};c;){if(b="Hotspot "+c,!d(b,a.scene.selected.config.hotspots))return b;c++}},unselect:function(a){for(var b=a.scene.selected.config.hotspots.length;b--;){var c=a.scene.selected.config.hotspots[b];if(c.isSelected)return void(c.isSelected=!1)}},select:function(a,b){b&&(a.fn.hotspots.unselect(a),b.isSelected=!0),a.fn.hotspots.onSelect(a,b)},getSelected:function(a){for(var b=a.scene.selected.config.hotspots.length;b--;){var c=a.scene.selected.config.hotspots[b];if(c.isSelected)return c}return!1},onSelect:function(a,b){a.hotspot.selected=b},dragStart:function(a,b,c,d){b.appData.hotspot.dragged=b.dragElement,b.appData.fn.hotspots.select(b.appData,b.dragElement),b.$root.safeApply()},dragOver:function(a,b,c,d){a.preventDefault(),c.addClass("ipnrm-ui-drag-over")},dragLeave:function(a,b,c,d){a.preventDefault(),c.removeClass("ipnrm-ui-drag-over")},dropScene:function(a,b,c,d){if(a.preventDefault(),c.removeClass("ipnrm-ui-drag-over"),b.appData.hotspot.dragged){var e=angular.copy(b.appData.hotspot.dragged);b.appData.scene.selected.config.hotspots.splice(b.appData.scene.selected.config.hotspots.indexOf(b.appData.hotspot.dragged),1),b.appData.hotspot.dragged=null,b.appData.scene.selected.config.hotspots.splice(b.appData.scene.selected.config.hotspots.indexOf(b.dragOverElement),0,e),b.$root.safeApply()}}}},srv:{$compile:null,$timeout:null,$templateRequest:null,$http:null,growl:null}};angular.module("ngiPanoramaApp",["ngiPanoramaApp.services","ngiPanoramaApp.controllers","ngiPanoramaApp.directives","ngiPanoramaApp.filters","angular-growl"]).config(["growlProvider",function(a){a.globalPosition("bottom-right"),a.globalTimeToLive(9e3),a.globalDisableCloseButton(!1)}]).run(["$rootScope",function(a){a.safeApply=function(a){var b=this.$root.$$phase;return"$apply"!==b&&"$digest"!==b?void this.$apply(a):void(a&&"function"==typeof a&&a())}}]);