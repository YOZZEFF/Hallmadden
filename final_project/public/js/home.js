
   

   
   var icona = document.querySelector('#burger');
    // console.log(icona); 
    var links= document.querySelector('.icon');
    var closesb =document.querySelector('#closing');
    var site = document.querySelector('body');
    console.log(site)
    
icona.addEventListener('click',function(){
    links.style.right='0px';
    site.classList.add('hidden');
    
    })
    
closesb.addEventListener('click',function(){
    links.style.right='-900px';
    site.classList.remove('hidden');


    
    })
