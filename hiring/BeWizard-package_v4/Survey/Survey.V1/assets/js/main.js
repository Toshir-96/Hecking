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

				this.ratings();
				this.NeedJobSlide();
				this.FileUpload();
				
			},
			ratings: function (){
				var __slice = [].slice;

				(function($, window) {
					var Starrr;

					Starrr = (function() {
						Starrr.prototype.defaults = {
							rating: void 0,
							numStars: 5,
							change: function(e, value) {}
						};

						function Starrr($el, options) {
							var i, _, _ref,
							_this = this;

							this.options = $.extend({}, this.defaults, options);
							this.$el = $el;
							_ref = this.defaults;
							for (i in _ref) {
								_ = _ref[i];
								if (this.$el.data(i) != null) {
									this.options[i] = this.$el.data(i);
								}
							}
							this.createStars();
							this.syncRating();
							this.$el.on('mouseover.starrr', 'span', function(e) {
								return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
							});
							this.$el.on('mouseout.starrr', function() {
								return _this.syncRating();
							});
							this.$el.on('click.starrr', 'span', function(e) {
								return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
							});
							this.$el.on('starrr:change', this.options.change);
						}

						Starrr.prototype.createStars = function() {
							var _i, _ref, _results;

							_results = [];
							for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
								_results.push(this.$el.append("<span class='rate-value'></span>"));
							}
							return _results;
						};

						Starrr.prototype.setRating = function(rating) {
							if (this.options.rating === rating) {
								rating = void 0;
							}
							this.options.rating = rating;
							this.syncRating();
							return this.$el.trigger('starrr:change', rating);
						};

						Starrr.prototype.syncRating = function(rating) {
							var i, _i, _j, _ref;

							rating || (rating = this.options.rating);
							if (rating) {
								for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
									this.$el.find('span').eq(i).removeClass('full-block-empty').addClass('full-block');
								}
							}
							if (rating && rating < 5) {
								for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
									this.$el.find('span').eq(i).removeClass('full-block').addClass('full-block-empty');
								}
							}
							if (!rating) {
								return this.$el.find('span').removeClass('full-block').addClass('full-block-empty');
							}
						};

						return Starrr;

					})();
					return $.fn.extend({
						starrr: function() {
							var args, option;

							option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
							return this.each(function() {
								var data;

								data = $(this).data('star-rating');
								if (!data) {
									$(this).data('star-rating', (data = new Starrr($(this), option)));
								}
								if (typeof option === 'string') {
									return data[option].apply(data, args);
								}
							});
						}
					});
				})(window.jQuery, window);

				$(function() {
					return $(".starrr").starrr();
				});

				$( document ).ready(function() {

					$('#stars').on('starrr:change', function(e, value){
						$('#count').html(value);
					});

					$('#stars-existing').on('starrr:change', function(e, value){
						$('#count-existing').html(value);
					});
				});
			},
			NeedJobSlide: function (){
				$('#need-job-slide-id').owlCarousel({
					margin:30,
					responsiveClass:true,
					nav: true,
					dots: false,
					loop:true,
					center: true,
					autoHeight: true,
					autoplay: false,
					navText:["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
					smartSpeed: 1000,
					responsive:{
						0:{
							items:1,
						},
						400:{
							items:1,
						},
						600:{
							items:1,
						},
						700:{
							items:2,
						},
						1000:{
							items:3,

						},
					},
				})
			},
			FileUpload: function (){
				$("#customFile").change(function() {
					filename = this.files[0].name
				});
				$(".custom-file-input").on("change", function() {
					var fileName = $(this).val().split("\\").pop();
					$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
				});
			},
		}
	}
	jQuery(document).ready(function (){
		Wizard.init();
	});

})();