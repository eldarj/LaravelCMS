/**
 * Settings.panel.js
 * 	~ Handles settings and profile side-bars
 */

 /*jshint esversion: 6*/
 /* jshint strict: true */

(function () {
   'use strict';

	let settingsSidebar = {
		containerHeight: null,
		formPanelsParent: document.getElementById('main-scroll-box'),
		simpleBar: new SimpleBar(document.getElementById('main-scroll-box')),
		settingsToggle: $('#settings-button'),
		settingsPanel: $('#profile-settings-side'),
		profilePanel: $('#profile-preview-side'),
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
		inputChangeHandlers: function(self) {
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
		},
		navButtonsClickHandlers: function(self) {
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
		},
		settingsToggleClickHandler: function(self) {
			// Initialize and set toggle button
			self.settingsToggle.on('click', function(){
				self.settingsToggle.find('button').toggleClass('btn-dark');
				self.settingsPanel.toggleClass('w-75');
				self.profilePanel.toggleClass('w-25');
				self.settingsPanel.find('.whileHidden').removeClass('whileHidden');
			});
		},
		setHeightOnInit: function(self) {
			// Initialize height
			self.containerHeight = self.initialHeight;
			self.formPanelsParent.style.height = self.containerHeight + "px";
		},
		disableMouseScroll: function(self) {
			$(self.formPanelsParent).on('mousewheel wheel', function(event) {
				let current = self.settingsNavBtn.filter('.bg-dark');
				if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0) {
			        let prev = current.prev('.settings-nav-btn').addClass('bg-dark');
			        prev.click();
			    }
			    else {
			        let next = current.next('.settings-nav-btn').addClass('bg-dark');
			        next.click();
			    }
			    return false;
			});
		},
		/**
		 * Main initialize function
		 * 	~ initialized settings sidebar
		 */
		initialize: function() {
			let self = this;

			// Set the initial height (will be the first section eg. General)
			self.setHeightOnInit(self);
			// We'll disable scroll so the user has to click on setting sections
			self.disableMouseScroll(self);

			// Attach handlers to: 
			//  - Inputs (onchange)
			//  - Nav section buttons (click)
			//  - Settings Toggle button (click) 
			self.inputChangeHandlers(self);
			self.navButtonsClickHandlers(self);
			self.settingsToggleClickHandler(self);
			
		}
	};

	// Run initialize() on document.ready
	$(document).ready(function(){
		settingsSidebar.initialize();
	});
}()); //Strict