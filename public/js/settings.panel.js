/**
 * Settings.panel.js
 * 	~ Handles settings side-bar
 */

 /*jshint esversion: 6*/
 /* jshint strict: true */

(function () {
   'use strict';


let settingsSidebar = {
	containerHeight: null,
	formPanelsParent: document.getElementById('main-scroll-box'),
	simpleBar: new SimpleBar(document.getElementById('main-scroll-box')),
	get generalPanel() {
		return $('#general-settings-panel');
	},
	get avatarPanel() {
		return $('#avatar-settings-panel');
	},
	get coverPanel() {
		return $('#cover-settings-panel');
	},
	get initialHeight() {
		return this.generalPanel.height();
	},
	get settingsNavBtn() {
		return $('.settings-nav-btn');
	},
	get settingsGroups() {
		return $('.settings-group');
	},
	/**
	 * Main initialize function
	 * 	~ initialized settings sidebar
	 */
	initialize: function() {
		// Initialize height
		let self = this;
		self.containerHeight = self.initialHeight;
		self.formPanelsParent.style.height = self.containerHeight + "px";

		// Initialize nav button handlers
		self.settingsNavBtn.each(function(key, element) {
			let $e = $(element);
			let $section = $($e.attr('data-section'));
			let offset = $section.position();
			let sectionHeight = $section.outerHeight(true);


			$e.on('click', () => {

				self.formPanelsParent.style.height = sectionHeight + "px";
				$(self.simpleBar.getScrollElement()).animate({
				    scrollTop: offset.top
				  }, {
				  	duration: 300, 
				  	easing:'swing'
				});
				// self.simpleBar.getScrollElement().scrollTop = offset.top;
			});
		});
	}
};

$(document).ready(function(){
	settingsSidebar.initialize();
});

}()); //Strict