// Clock function
(function ($) {
	class Clock {
		constructor() {
			this.initializeClock();
		}

		initializeClock() {
			const t = setInterval( () => this.time(), 1000 );
		}

		numPad(str) {
			const cStr = str.toString();
			if (1 > cStr.length) {
				str = 0 + cStr;
			}
			return str;
		}

		/**
		 * Time
		 */
		time() {
			const currentDate = new Date();
			const currentSec = currentDate.getSeconds();
			const currentMin = currentDate.getMinutes();
			const curren24hrs = currentDate.getHours();
			const ampm = 12 <= curren24hrs ? 'pm' : 'am';
			let currentHoure = curren24hrs % 12;
			currentHoure = currentHoure ? currentHoure : 12;

			const stringTime =
				currentHoure +
				':' +
				this.numPad(currentMin) +
				':' +
				this.numPad(currentSec);

			const timeEmojiEL = $('#time-emoji');

			if ( curren24hrs >= 5 && 17 >= curren24hrs) {
				timeEmojiEL.text('🌞');
			} else {
				timeEmojiEL.text(' 🌙 ');
			}
			$('#time').text(stringTime);
			// $( '#ampm' );
			$('#ampm').text(ampm);
		}
	}
	new Clock();
} )( jQuery );
