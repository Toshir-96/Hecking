/* -----------------------------------------------------------------------------



File:           JS Core
Version:        1.0
Last change:    00/00/00 
-------------------------------------------------------------------------------- */
(function() {

	"use strict";

	var Wizard = {
		init: function() {
			this.Basic.init();  
		},

		Basic: {
			init: function() {

				this.preloader();
				this.countDown();
				
			},
			preloader: function (){
				jQuery(window).on('load', function(){
					jQuery('#preloader').fadeOut('slow',function(){jQuery(this).remove();});
				});
			},
			countDown:  function (){
				if ($('.quiz-countdown').length > 0) {
					var deadlineDate = new Date('dec 26, 2020 23:59:59').getTime();
					var countdownDays = document.querySelector('.days .count-down-number');
					var countdownHours = document.querySelector('.hours .count-down-number');
					var countdownMinutes = document.querySelector('.minutes .count-down-number');
					var countdownSeconds = document.querySelector('.seconds .count-down-number');
					setInterval(function () {
						var currentDate = new Date().getTime();
						var distance = deadlineDate - currentDate;
						var days = Math.floor(distance / (1000 * 60 * 60 * 24));
						var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
						var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
						var seconds = Math.floor((distance % (1000 * 60)) / 1000);
						countdownDays.innerHTML = days;
						countdownHours.innerHTML = hours;
						countdownMinutes.innerHTML = minutes;
						countdownSeconds.innerHTML = seconds;
					}, 1000);

				};
			},
		}
	}
	jQuery(document).ready(function (){
		Wizard.init();
	});

})();