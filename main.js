function movieshome(){

var movies= ["tt0437086","tt4463894","tt2274648","tt4154796","tt5884052","tt8648640","tt4154664","tt0448115","tt9537532"];
output=``;
movies.forEach(function(movie){
    fetch('http://www.omdbapi.com/?i='+movie+'&apikey=adc9f2be')
    .then((res)=> res.json())
    .then((data)=>{
        console.log(data);
       
      
      output +=`
  
      <div class=' col-sm-3'>
      <div class="back">
      <img  src="${data.Poster}">
      <h5>${data.Title}</h5>
      <a onclick="movieSelected('${data.imdbID}','${data.Title}','${data.Year}')" class="btn btn-primary" href="#">Movie Details</a>
       </div>
       </div>
      `;
   
      document.getElementById('output1').innerHTML=output;
    })
    


});


}
function serieshome(){

    var series= ["tt0944947","tt1475582","tt0436992","tt4574334","tt0898266","tt3107288"];
    output1=``;
    series.forEach(function(serie){
        fetch('http://www.omdbapi.com/?i='+serie+'&apikey=adc9f2be')
        .then((res)=> res.json())
        .then((data1)=>{
            console.log(data1);
           
          
          output1 +=`
      
          <div class=' col-sm-3'>
          <div class="back">
          <img  src="${data1.Poster}">
          <h5>${data1.Title}</h5>
          <a onclick="movieSelected('${data1.imdbID}','${data1.Title}','${data1.Year}')" class="btn btn-primary" href="#">Movie Details</a>
           </div>
           </div>
          `;
       
          document.getElementById('output2').innerHTML=output1;
        })
        
    
    
    });
    
    
    }



function getPosts(){

    var movie= document.getElementById('search').value;
    fetch('http://www.omdbapi.com/?s='+movie+'&apikey=adc9f2be')
    .then((res)=> res.json())
    .then((data)=>{
        console.log(data);
       output=``;
        data.Search.forEach(function(post){
      output +=`
      <div class=' col-sm-3'>
      <div class="back">
      <img  src="${post.Poster}">
      <h5>${post.Title}</h5>
      <a onclick="movieSelected('${post.imdbID}','${post.Title}','${post.Year}')" class="btn btn-primary" href="#">Movie Details</a>
       </div>
       </div>
      `;
    });
    document.getElementById('output').innerHTML=output;
    })

}





function movieSelected(id,movie,year){
    sessionStorage.setItem('movieId',id);
    sessionStorage.setItem('Title',movie);
    sessionStorage.setItem('year',year);
    window.location= "movie.php";
    return false;
}

function getMovies(){

    let movieId= sessionStorage.getItem('movieId');


    fetch('http://www.omdbapi.com/?i='+movieId+'&apikey=adc9f2be')
    .then((res)=> res.json())
    .then((data)=>{
        console.log(data);
         let output=`
         <div class="row">
         <div class="col-md-4">
         <div class="jk">
          <img src="${data.Poster}" class="thumbnail">
          </div>
          <div class="jk">
          <a href="http://imdb.com/title/${data.imdbID}" target="_blank" class="btn btn-primary">View IMDB</a>
          <button onclick="addf();" id="add" type="button" class="btn btn-success">Add in favourites</button>
          <a onclick='trailer();' target="_blank" class="btn btn-danger">Watch trailer</a>


          </div>
          </div>
          <div class="col-md-8">
          <div class="jf">
            <h2>${data.Title}</h2>
            <ul class="list-group" >
               <li class="list-group-item" style="{color:black;}"><strong>Genre: </strong>${data.Genre}</li>
               <li class="list-group-item" style="{color:black;}"><strong>Released: </strong>${data.Released}</li>
               <li class="list-group-item" style="{color:black;}"><strong>Rated: </strong>${data.Rated}</li>
               <li class="list-group-item" style="{color:black;}"><strong>IMDB Rating: </strong>${data.imdbRating}</li>
               <li class="list-group-item" style="{color:black;}"><strong>Director: </strong>${data.Director}</li>
               <li class="list-group-item" style="{color:black;}"><strong>Writer: </strong>${data.Writer}</li>
               <li class="list-group-item" style="{color:black;}"><strong >Actors: </strong>${data.Actors}</li>
               <li class="list-group-item" style="{color:black;}"><strong >Plot: </strong>${data.Plot}</li>
            </ul>
            </div>
            </div>
            </div>
   
         
         `;
         document.getElementById('output').innerHTML=output;
    })
}

function init(){

    gapi.client.setApiKey("AIzaSyALD2MQ84ichFsXIz20ygz5KubsybV303E");
    gapi.client.load("youtube","v3", function(){

    });
}
function trailer()
{

    let movie= sessionStorage.getItem('Title');
    let year= sessionStorage.getItem('year');
    var request= gapi.client.youtube.search.list({
        part: "snippet",
        type: "video",
        q: encodeURIComponent(movie+year+" Teaser Trailer").replace(/%20/g,"+"),
        maxResults:2,
        order: "viewCount",

    }); 
   request.execute(function(response){
      
        var results= response.result;
        output=``;
        results.items.forEach(function(item){

            console.log(item);
            output +=`
            <div class=' col-sm-6'>
            <h2>${item.snippet.title}</h2>
            <iframe class="video w100" width="640" height="360" src="//www.youtube.com/embed/${item.id.videoId}" frameborder="0" allowfullscreen></iframe>
           </div>
            `;
            
        });
        document.getElementById('trailer').innerHTML=output;
       });

}


function homepage()
{


    fetch('http://www.omdbapi.com/?y=2019&apikey=adc9f2be')
    .then((res)=> res.json())
    .then((data)=>{
        console.log(data);
       output=``;
        data.Search.forEach(function(post){
      output +=`
      <div class=' col-sm-3'>
      <div class="back">
      <img  src="${post.Poster}">
      <h5>${post.Title}</h5>
      <a onclick="movieSelected('${post.imdbID}','${post.Title}','${post.Year}')" class="btn btn-primary" href="#">Movie Details</a>
       </div>
       </div>
      `;
    });
    document.getElementById('output').innerHTML=output;
    })





}


