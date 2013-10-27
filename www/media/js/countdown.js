/**
 * Plugin kkcountdown counts down to specific dates in the future.
 *
 * @example
 * $(".come-class").kkcountdown();
 *
 * @type jQuery
 *
 * @name kkcountdown
 * @author Krzysztof Furtak http://krzysztof-furtak.pl/
 * @version 1.3
 * 
 * Documentation: http://krzysztof-furtak.pl/2010/05/kk-countdown-jquery-plugin/
 * 
 */

(function($){
    $.fn.countDown = function(options) {
        	
            var defaults = {
                dayText			: 	'day ',
                daysText		: 	'days ',
                hoursText		: 	':',
                minutesText		:	':',
                secondsText		:	'',
                textAfterCount	: 	'---',
                oneDayClass		:	false,
                displayDays		: 	true,
                displayZeroDays	:	true,
                addClass		: 	false,
                callback		: 	false
            };
                 
            var options =  $.extend(defaults, options);

			var now = new Date();
			now = Math.floor(now.getTime() / 1000);
            if (options.serverTime) {
            	options.timeDiff = now - options.serverTime;
            } else {
            	options.serverTime = date;
				options.timeDiff = 0;
            }

            this.each(function(){
            	var _this = $(this);

		        if(options.addClass != false){
		        	box.addClass(options.addClass);
		        }

            	kkCountdownInit(_this);
            });
            
            function kkCountdownInit(_this){
            	var now = new Date();
		        now = Math.floor(now.getTime() / 1000);
		        var event = _this.attr('time');
		        if (!event) {
		        	event = parseInt(_this.attr('offset')) + options.serverTime;
	        	}
		        var count = (event - now) + options.timeDiff;

		        if(count <= 0){
		            _this.html(options.textAfterCount);
		            if(options.callback){
		            	options.callback();
		            }
		        }else if(count <= 24*60*60){
		        	setTimeout(function(){
						kkCountDown(true, _this, count);
						kkCountdownInit(_this);
					}, 1000);
		        }else{
		        	setTimeout(function(){
		            	kkCountDown(false, _this, count);
		            	kkCountdownInit(_this);
		            }, 1000);
		        }
            }
            
            function kkCountDown(oneDay, obj, count){
            	var sekundy = correctTime(count % 60);
	            count = Math.floor(count/60);
	            var minuty = correctTime(count % 60);
	            count = Math.floor(count/60);
				if (options.oneDayClass == false) {
					var godziny = count;
					var dni = 0;
				} else {
					var godziny = correctTime(count % 24);
					count = Math.floor(count/24);
					var dni = count;
				}

				if(oneDay && options.oneDayClass != false){
					obj.addClass(options.oneDayClass);
				}
				
				if(dni == 0 && !options.displayZeroDays){
					text = '';
				}else if(dni == 1){
					text = dni + options.dayText;
	            }else{
	            	text = dni + options.daysText
	            }
	            
	            text += godziny + options.hoursText + minuty + options.minutesText + sekundy + options.secondsText;
	            obj.html(text);
            }
            
            function correctTime(obj){
			    s = '';
			    if(obj < 10){
			        obj = '0' + obj;
			    }
			    return obj;
			}
      }
})(jQuery);
