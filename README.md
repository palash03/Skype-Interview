# Skype-Interviews
Create, customize and schedule interviews with Skype Interview's REST API 

Preconditions:

1) Install xampp
2) Using Bootstrap here so use you need the libraries which you can get from their site. 
3) Skype/Microsoft/Gmail Id required so that you can access your API Key and Secret Key.
4) Postman can be installed for sending a POST request to https://interviews.skype.com/api/interviews and getting a JSON response.

Manual Generation of Response 

1) Try manually going through this, https://dev.skype.com/interviews.
2) Use https://passwordsgenerator.net/sha256-hash-generator/ to generate your SHA256 by entering your body contents.
3) Use http://jwtbuilder.jamiekurtz.com/ to generate your JSON Web Token.
4) Send a POST request to https://interviews.skype.com/api/interviews using Postman Client. Enter the Body contents, Authorization and Content-Type. 
5) If you receive a response then you are successful. 

Conclusion and Useful Tips

1) A Chrome browser will raise the following issue, “No 'Access-Control-Allow-Origin' header is present on the requested resource”.
Solution -> Open a new Chrome session by running the following command in Win+Run chrome.exe --user-data-dir="C:/Chrome dev session" --disable-web-security

For more details, visit https://dev.skype.com/interviews.
All the best!



