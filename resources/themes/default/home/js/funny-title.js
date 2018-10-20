/**
 * @author AkvicorEdwards
 *
 * Funny title
 * 
 *  Used to change the title into an funny title when the page loses focus
 * 
 */

$(function(){
	
	var vendorPrefix=getBrowserPrefix();
	var eventName=visibilityEvent(vendorPrefix);
	document.addEventListener(eventName,visibilityEventCallback);

    var titleTime;
	var oldTitle=document.title;
	function visibilityEventCallback(){
		if(document.hidden){

			document.title="╭(°A°`)╮ 页面崩溃啦 ~ 快回来看看~ | "+oldTitle;
            clearTimeout(titleTime);
		}else{
			document.title="(ฅ>ω<*ฅ) 噫又好了~";
            titleTime = setTimeout(function() {
                document.title = oldTitle;
            }, 2000);
		}
	}


	/*------------------------ The following code comes from the network to resolve browser compatibility issues ----------------------------------*/
	
	// Get Browser-Specifc Prefix
	function getBrowserPrefix() {
	
	  	// Check for the unprefixed property.  
	  	if ('hidden' in document) {
	    	return null;
		}
	
		// All the possible prefixes.  
		var browserPrefixes = ['moz', 'ms', 'o', 'webkit'];
		 
		for (var i = 0; i < browserPrefixes.length; i++) {
		    var prefix = browserPrefixes[i] + 'Hidden';
		    if (prefix in document) {
		      return browserPrefixes[i];
		    }  
		}
	
	 	// The API is not supported in browser.  
	 	return null;
	}
	
	// Get Browser Specific Hidden Property
	function hiddenProperty(prefix) {
		if (prefix) {
			return prefix + 'Hidden';
		} else {
			return 'hidden';
		}
	}
	
	// Get Browser Specific Visibility State
	function visibilityState(prefix) {
	  if (prefix) {
	    return prefix + 'VisibilityState';
	  } else {
	    return 'visibilityState';
	  }
	}
	
	// Get Browser Specific Event
	function visibilityEvent(prefix) {
	  if (prefix) {
	    return prefix + 'visibilitychange';
	  } else {
	    return 'visibilitychange';
	  }
	}

});
