
     var code ; //在全局 定义验证码  
     function createCode()  
     {   
       code = "";  
       var codeLength = 6;//验证码的长度  
       var checkCode = document.getElementById("checkCode");  
       var selectChar = new Array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');//所有候选组成验证码的字符，当然也可以用中文的  
           
       for(var i=0;i<codeLength;i++)  
       {  
         
           
       var charIndex = Math.floor(Math.random()*36);  
       code +=selectChar[charIndex];  
          
          
       }  
 
       if(checkCode)  
       {  
         checkCode.className="code";  
         checkCode.value = code;  
       }  
          
     }  
        
      function validate ()  
     {  
       var inputCode = document.getElementById("yz").value;   
        if(inputCode != code )  
       {  
          return 1;  
          createCode();//刷新验证码  
       }  
       else  
       {  
         return 0;  
       }  
          
       }  
          
