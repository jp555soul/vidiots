!function(e){Craft.UpdatesWidget=Garnish.Base.extend({$widget:null,$body:null,$btn:null,checking:!1,init:function(t,i){this.$widget=e("#widget"+t),this.$body=this.$widget.find(".body:first"),this.initBtn(),i||this.checkForUpdates(!1)},initBtn:function(){this.$btn=this.$body.find(".btn:first"),this.addListener(this.$btn,"click",function(){this.checkForUpdates(!0)})},lookLikeWereChecking:function(){this.checking=!0,this.$widget.addClass("loading"),this.$btn.addClass("disabled")},dontLookLikeWereChecking:function(){this.checking=!1,this.$widget.removeClass("loading")},checkForUpdates:function(t){this.checking||(this.lookLikeWereChecking(),Craft.cp.checkForUpdates(t,e.proxy(this,"showUpdateInfo")))},showUpdateInfo:function(t){var i;(this.dontLookLikeWereChecking(),t.total)?(i=1==t.total?Craft.t("One update available!"):Craft.t("{total} updates available!",{total:t.total}),this.$body.html('<p class="centeralign">'+i+' <a class="go nowrap" href="'+Craft.getUrl("updates")+'">'+Craft.t("Go to Updates")+"</a></p>")):(this.$body.html('<p class="centeralign">'+Craft.t("Congrats! You’re up-to-date.")+'</p><p class="centeralign"><a class="btn" data-icon="refresh">'+Craft.t("Check again")+"</a></p>"),this.initBtn());Craft.cp.displayUpdateInfo(t)}})}(jQuery);
//# sourceMappingURL=UpdatesWidget.js.map