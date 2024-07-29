function search() {

   // Get the search term
   var searchTerm = $('#input').val().trim();
 
   // Check if the search term is empty
   if (searchTerm === '') {
     // Handle the case where the search term is empty
     alert('Please enter a search term.');
     return;
   }
 
   $.ajax({
     type: 'GET',
     url: 'combine_yadi.xml',
     dataType: 'xml',
     success: function(xml) {
       var results = [];
 
       $(xml).find('entry').each(function() {
         var name = $(this).find('name').text();
         var cast= $(this).find('cast').text();
         var gaon = $(this).find('gaon').text();
         var post = $(this).find('post').text();
         var taluka = $(this).find('taluka').text();
         var niwad = $(this).find('patra_apatra').text();
         var yojana = $(this).find('yojana').text();
         var yojana = $(this).find('year').text();
        //  var name = firstname + ' ' + lastname;
 
         // Convert the search term and XML content to lowercase for case-insensitive search
        //  const nameLowerCase = name.toLowerCase();
         const searchTermLowerCase = searchTerm.toLowerCase();
 
         // Check if the lowercase name or grade contains the lowercase search term
         if (nameLowerCase.includes(searchTermLowerCase)) {
           results.push(
            
               '<div class="table">' +  name + ' यांच्या प्रस्तावाची सद्यस्थिती </div>' +
                '<table class="table"><tr> <th> नाव </th> <th> जात </th> <th>गाव</th> </tr><tr> <td>१</td> <td>मौजे:</td> <td>' +
               name +
               '</td> </tr> <tr> <td>2</td> <td>गाव:</td> <td>' +
               cast +
               '</td> </tr> <tr> <td>2</td> <td>गाव:</td> <td>' +
               gaon +
               '</td> </tr> <tr> <td>2</td> <td>गाव:</td> <td>' +
               post +
               '</td> </tr> <tr> <td>४</td> <td>तालुका:</td> <td>' +
               taluka +
               '</td> </tr><tr> <td>५</td> <td>प्रस्ताव निवड:</td> <td>' +
               niwad +
               '</td> </tr><tr> <td>६</td> <td>योजना: </td> <td>' +
               yojana +
               '</td> </tr><tr> <td>७</td> <td>योजना वर्ष: </td> <td>' +
               year +
               '</td> </tr> </table>'
           );
         }
       });
 
       // Display results in the HTML element
       $('#div4').html(results.join(''));
 
       // Handle case where no results are found
       if (results.length === 0) {

         var str =' प्रस्ताव या कार्यालास दिलेला नाही अथवा निवड झाली नाही';
         $('#div4').html(str);
       }
     },
     error: function(xhr, status, error) {
       // Improve error handling with user-friendly messages
       console.error('Error loading XML file:', error);
       alert('Error loading XML file. Please try again later.');
     },
   });
 }

function showbtn(){
  location.reload(true);
}

 