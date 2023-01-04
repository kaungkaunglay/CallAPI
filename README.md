<h1>Simple and Easy to Call API</h1>
<h2>Usage</h2>
<h4>
-?It take three parameters 
-?	The first one is Method "POST" or "GET" or "PUT" Methods
-?	The second one is the API URL
-?	The last one is the data to be sent to the server, if not require set as false
</h4>
<pre>
	// Implementation without sending data to server 
	require "CallAPI/index.php";
	$api_url = "https://api.com/?key=11111"
	$get_data = CallAPI("GET", $api_url, false);
</pre>
<h5>After that just call the static method</h5>
<pre>
	CallAPI::getData(); 
	// if returned data is json format then just use this method
	CallAPI::getJsonDecode(); 
</pre>
