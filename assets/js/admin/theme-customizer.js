!function(a,e){"use strict";var t="Luxury",r="1.0.0",n=t+"_Settings_Key_"+r,i=localStorage.getItem(n);if(i&&0===i.indexOf("{")){i=JSON.parse(i);var s=setInterval(function(){var a,t=e.body,r=e.querySelector(".site-navbar");r&&(clearInterval(s),a=r.classList,a.forEach(function(e){/bg-/.test(e)&&a.remove(e)}),a.add(i.navbar.skin),i.navbar.navbarDark&&(a.remove("navbar-light"),a.add("navbar-dark")),!i.menubar.menubarDark&&(t.classList.remove("menubar-dark"),t.classList.add("menubar-light")),i.menubar.folded&&t.classList.add("menubar-fold"))},5)}e.addEventListener("DOMContentLoaded",function(){var t=$(e.body),r=$(".site-navbar"),i=($(".site-menubar"),{navbar:{navbarDark:!1,skin:"bg-blue"},menubar:{menubarDark:!0,folded:!1,top:!1}}),s={defaults:i||{},currentState:null,storage:a.localStorage,init:function(){this.isStored()||(this.currentState=this.defaults,this.storage.setItem(n,this._stringify(this.currentState))),this.currentState=this.retrive()},isStored:function(){return this.storage.hasOwnProperty(n)&&!$.isEmptyObject(this.retrive())},retrive:function(){return this._parse(this.storage.getItem(n))},clear:function(){return this.storage.clear(),this},save:function(){return this.storage.setItem(n,this._stringify(this.currentState)),this},get:function(a){return this.currentState[a]},set:function(a,e){return"object"==typeof this.currentState[a]&&"object"==typeof e?$.extend(this.currentState[a],e):this.currentState[a]=e,this},_parse:function(a){return"string"==typeof a?JSON.parse(a):void 0},_stringify:function(a){return JSON.stringify(a)}},o={navbarDark:!1,navbarSkin:null,menubarDark:!0,menubarFolded:!1,init:function(){var a=this;"undefined"!=typeof s&&s.init(),$(e).on("change",'[data-toggle="navbarDark"]',function(e){a.navbarDark=$(this).prop("checked"),a.toggleNavbarDark()}),$(e).on("change",'[data-toggle="navbarSkin"]',function(e){a.setNavbarSkin($(this).data("skin"))}),$(e).on("change",'[data-toggle="menubarDark"]',function(e){a.menubarDark=$(this).prop("checked"),a.toggleMeubarDark()}),$(e).on("change",'[data-toggle="menubarFold"]',function(e){site.menubar&&($(this).prop("checked")&&!site.menubar.folded?(site.menubar.fold(),a.menubarFolded=!0):!$(this).prop("checked")&&site.menubar.folded&&(site.menubar.unFold(),a.menubarFolded=!1))}),$(e).on("click","#customizerSaveButton",function(){var e=$(this),t="Your Settings Saved!";a.save(),e.parents("#theme-customizer").removeClass("show"),"undefined"!=typeof swal?swal({title:"Saved",text:t,type:"success",timer:1500,showConfirmButton:!1}):(e.closest("section").append('<div class="flash-msg mt-4 text-success">'+t+"</div>"),setTimeout(function(){e.closest("section").find("div.flash-msg").fadeOut()},1500))}),$(e).on("click","#customizerResetButton",function(){a.reset()}),s.isStored()?(this.navbarDark=s.get("navbar").navbarDark,this.navbarSkin=s.get("navbar").skin,this.menubarDark=s.get("menubar").menubarDark,this.menubarFolded=s.get("menubar").folded):(this.navbarDark=this._isNavbarDark(),this.menubarDark=this._isMenubarDark(),this.navbarSkin=this._getAppliedNavbarSkin()),this.checkTheme()},save:function(){s.set("navbar",{navbarDark:this.navbarDark,skin:this.navbarSkin}).set("menubar",{menubarDark:this.menubarDark,folded:this.menubarFolded}).save()},reset:function(){s.clear(),location.reload()},toggleNavbarDark:function(){this.navbarDark?(r.removeClass("navbar-light"),r.addClass("navbar-dark")):(r.removeClass("navbar-dark"),r.addClass("navbar-light"))},toggleMeubarDark:function(){this.menubarDark?(t.removeClass("menubar-light"),t.addClass("menubar-dark")):(t.removeClass("menubar-dark"),t.addClass("menubar-light"))},setNavbarSkin:function(a){var e=this._getAppliedNavbarSkin();return this.navbarSkin=a,e!==a&&r.addClass(a).removeClass(e),this},checkTheme:function(){return $('[data-toggle="navbarDark"]').prop("checked",this.navbarDark),$('[data-toggle="navbarSkin"][data-skin="'+this.navbarSkin+'"]').prop("checked",!0),$('[data-toggle="menubarDark"]').prop("checked",this.menubarDark),$('[data-toggle="menubarFold"]').prop("checked",this.menubarFolded),this},_getAppliedNavbarSkin:function(){var a=e.querySelector(".site-navbar"),t=null;return a.classList.forEach(function(a){a.search("bg")!==-1&&(t=a)}),t},_isNavbarDark:function(){return r.is(".navbar-dark")},_isMenubarDark:function(){return t.is(".menubar-dark")}};o.init()})}(window,document);