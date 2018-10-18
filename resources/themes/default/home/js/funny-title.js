/**
 * Author:CC11001100
 * 
 * Funny title
 * 
 *  用于网页失去焦点时改变成有趣的标题
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

    /*
   $('.post-title a,.post-more-link').hover(function() {
        $(this).stop().animate({
            'marginLeft': '10px'
        }, 200);
    }, function() {
        $(this).stop().animate({
            'marginLeft': '0px'
        }, 400);
    });

    $.ajax({
            url: 'https://sslapi.hitokoto.cn/',
            type: 'GET',
            dataType: 'json'
        })
        .done(function(data) {
            html = '' + data.hitokoto + '  来自于 ' + data.from;
            $('#hitokoto').text(html);
        })
*/
	

	/*------------------------ 下面的代码来自网络，用于解决浏览器兼容性问题 ----------------------------------*/
	
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
