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
				this.NeedJobSlide();
				this.CirleProgress();
				
			},
			preloader: function (){
				jQuery(window).on('load', function(){
					jQuery('#preloader').fadeOut('slow',function(){jQuery(this).remove();});
				});
			},
			NeedJobSlide: function (){
				if ($(".progress-bar").length) {
					var $progress_bar = $('.progress-bar');
					$progress_bar.appear();
					$(document.body).on('appear', '.progress-bar', function() {
						var current_item = $(this);
						if (!current_item.hasClass('appeared')) {
							var percent = current_item.data('percent');
							current_item.css('width', percent + '%').addClass('appeared').parent().append('<span>' + percent + '%' + '</span>');
						}
						
					});
				};
			},
			CirleProgress: function (){
				if($('.progress_area').length){
					;(function() {
						var proto = $.circleProgress.defaults,
						originalDrawEmptyArc = proto.drawEmptyArc;

						proto.emptyThickness = 5; 
						proto.drawEmptyArc = function(v) {
							var oldGetThickness = this.getThickness, 
							oldThickness = this.getThickness(),
							emptyThickness = this.emptyThickness || _oldThickness.call(this),
							oldRadius = this.radius,
							delta = (oldThickness - emptyThickness) / 2;

							this.getThickness = function() {
								return emptyThickness;
							};

							this.radius = oldRadius - delta;
							this.ctx.save();
							this.ctx.translate(delta, delta);

							originalDrawEmptyArc.call(this, v);

							this.ctx.restore();
							this.getThickness = oldGetThickness;
							this.radius = oldRadius;
						};
					})();
					$('.progress_area').circleProgress({
						emptyThickness: 2,
						size: 340,
						thickness: 10,
						lineCap: 'round',
						fill: {
							gradient: ['#39ceaa', ['#39ceaa', 0.7]],
							gradientAngle: Math.PI * -0.3
						}  
					});

					$('.first.progress_area').circleProgress({
						value: .65,
						thickness: 6,
						emptyFill: '#f3f4fa',
					}).on('circle-animation-progress', function(event, progress) {
						$(this).find('strong').html(Math.round(56 * progress) + '<span>%</span>');
					});
					var el = $('.progress_area'),
					inited = false;
					el.appear({ force_process: true });

					el.on('appear', function() {
						if (!inited) {
							el.circleProgress();
							inited = true;
						}
					});
				};
			},

		}
	}
	jQuery(document).ready(function (){
		Wizard.init();
	});

})();