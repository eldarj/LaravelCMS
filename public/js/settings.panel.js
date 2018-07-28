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
	get inputFields() {
		return $('.form-control');
	},
	get settingsGroups() {
		return $('.settings-group');
	},
	/**
	 * Disabled all other input fields except those passed to the function
	 * @param  {jQuery HTML El. | Array of HTML El.} exceptElements array of HTMl elements that won't be disabled
	 */
	disableInputsExcept($exceptElements) {
		$("#main-scroll-box").find('.form-control').attr('disabled','disabled');
		$exceptElements.removeAttr('disabled');
	},
	loseActiveExcept($activeBtn) {
		$('.settings-nav-btn').removeClass('bg-dark text-white');
		$activeBtn.addClass('bg-dark text-white');
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

		// disable mousewheel scroll
		$(self.formPanelsParent).bind("mousewheel", function() {
		    return false;
		});

		// Initialize input field change listeners
		self.inputFields.each(function(key, element) {
			let $i = $(element),
				$previewElement = $('#'+$i.attr('name')),
				type = $i.attr('type'),
				attr = $i.attr('name'),
				dbValue = $previewElement.attr('data-db-value');

				if (typeof attr !== "undefined") {
					$i.on('input', function(){
						if (type === 'file') {
							let value = $i.val();
							if (!value) {
								$previewElement.css({
									backgroundImage: `url('${dbValue}')`
								});
							} else {
								let fileObj = $i.prop('files'),
									reader = new FileReader();

								reader.onload = function(e) {
							      $previewElement.css({
							      	backgroundImage: `url('${e.target.result}')`
							      });
							    };
						    	reader.readAsDataURL($i.prop('files')[0]);
							}
						} else {
							let value = $i.val();
							if (!value) value = dbValue;
							$previewElement.html(value);
						}
					});
				}
		});

		// Initialize nav button handlers
		self.settingsNavBtn.each(function(key, element) {
			let $e = $(element);
			let $section = $($e.attr('data-section'));
			let $sectionFormInputs = $section.find('.form-control');

			let offset = $section.position();
			let sectionHeight = $section.outerHeight(true);


			$e.on('click', () => {
			// disable other inputs, so we don't post everything on saving the changes
			self.disableInputsExcept($sectionFormInputs);
			self.loseActiveExcept($e);
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