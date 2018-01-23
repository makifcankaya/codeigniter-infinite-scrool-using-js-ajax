<html>
<head>
	<title> infinite scroll page </title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>

  <div class="container" id="writeData">  </div>
  <div class="container" id="newDatas">  </div>
  	
  	   <script type="text/javascript">

  	   var page = 1; // for getting first datas
       var flag= 1 ;

       if (page==1) {
         $.ajax({
           type: "GET",
           url: "home/send_firstData",
            data: "getPage="+page,
           dataType: "json",
           success: function(data) {
               console.log(data);
               		for (var i = 0; i < data.length; i++) {
               			$("#writeData").append(data[i] + "<br>");
               		}
           }
         });
       } // end of page=1 condition 


          $(window).scroll(function () {
          		
           if($(window).scrollTop() >= ($(document).height() - $(window).height()) + 250){// scrool is down --> 
           	//its depens on your pixel for +250 or between  -250 and -10

           	if (page <20) {
           	   page++;
               loadNextDatas(page);//sonraki veriler fonksi
             }
           }
         });

          function loadNextDatas(getPage) {

               $.ajax({
                 type: "GET",
                 url: "home/sendData",
                  data: "getPageNumber="+getPage,
                 dataType: "json",
                  success: function(data) {
              			 console.log(data);
               		for (var i = 0; i < data.length; i++) {
               			$("#newDatas").append(data[i] + "<br>");
               		}
           }
         });
       }
  	   </script>

</body>
</html>