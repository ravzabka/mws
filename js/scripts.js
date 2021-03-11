/**
 * --------------------------------------------------------------------------
 * SCRIPTS
 * --------------------------------------------------------------------------
 *
 * Here we define config of APP
 */

'use strict';

var APP = {
	utilities: {},
	config: {}
};

/**
 * --------------------------------------------------------------------------
 * CONSTANTS
 * --------------------------------------------------------------------------
 *
 * Load tested earlier, universal modules
 */

/**
 * --------------------------------------------------------------------------
 * PubSub - Publish Subscibe (Mediator)
 * --------------------------------------------------------------------------
 */

APP.utilities.pubsub = {
	pubsub: {},
	subscribe: function (pubName, fn) {
		this.pubsub[pubName] = this.pubsub[pubName] || [];
		this.pubsub[pubName].push(fn);
	},
	unsubscribe: function(pubName, fn) {
		if (this.pubsub[pubName]) {
			for (var i = 0; i < this.pubsub[pubName].length; i++) {
				if (this.pubsub[pubName][i] === fn) {
					this.pubsub[pubName].splice(i, 1);
					break;
				}
			};
		}
	},
	publish: function (pubName, data) {
		if (this.pubsub[pubName]) {
			this.pubsub[pubName].forEach(function(fn) {
				fn(data);
			});
		}
	}
};

/**
 * --------------------------------------------------------------------------
 * Breakpoints
 * --------------------------------------------------------------------------
 */

APP.utilities.breakpoints = (function() {

	// --------------------------------------------------------------------------
	// Get HTML body::before pseudoelement content.
	// It should be include-media variable, eg. '(sm: 576px, md: 768px, lg: 992px, xl: 1200px)'

	var data = window.getComputedStyle(document.body, '::before').getPropertyValue('content').replace(/[\"\'\s]/g, '');

	// Cut the (brackets)
	data = data.slice(1, -1);

	// Split data by comma
	var dataArr = data.split(',');
	dataArr.unshift('zero:0px');

	// --------------------------------------------------------------------------

	function checkBreakpoint() {

		dataArr.forEach(function(val, i) {

			var breakpoint = val.split(':');
			var breakpointName = breakpoint[0];
			var currValue = breakpoint[1].slice(0, -2);

			if (i !== dataArr.length - 1) { var nextValue = dataArr[i+1].split(':')[1].slice(0, -2) - 1; }

			if (i === 0) { var query = window.matchMedia('screen and (max-width: '+ nextValue +'px)'); }
			else if (i === dataArr.length - 1) { var query = window.matchMedia('screen and (min-width: '+ currValue +'px)'); }
			else { var query = window.matchMedia('screen and (min-width: '+ currValue +'px) and (max-width: '+ nextValue +'px)'); }

			query.addListener(change);
			function change() { query.matches ? APP.utilities.pubsub.publish('breakpoint', [breakpointName, currValue]) : null; }
			change();

		});
	}

	// --------------------------------------------------------------------------
	// Return

	return {
		check: checkBreakpoint
	}

})();

/**
 * --------------------------------------------------------------------------
 * Device
 * --------------------------------------------------------------------------
 */

APP.utilities.device = (function() {
	
	function isPhone() {
		if (/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
			return true;
		} else {
			return false;
		}
	}

	function isTablet() {
		if (/iPad/i.test(navigator.userAgent)) {
			return true;
		} else {
			return false;
		}
	}

	return {
		isPhone: isPhone,
		isTablet: isTablet
	}

}());


/**
 * --------------------------------------------------------------------------
 * MODULES
 * --------------------------------------------------------------------------
 *
 * Load specific to the project modules
 */

//require __modules/view.js
//=require __modules/navbar.js

APP.utilities.breakpoints.check();
