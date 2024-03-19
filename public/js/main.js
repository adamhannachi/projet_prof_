//let SubmitRegister = document.getElementsByName('SubmitRegister'); // submit register
//let InputRFirstName = document.getElementsByName('InputRFirstName'); // champs register firstname
//let InputRLastName = document.getElementsByName('InputRLastName'); // champs register lastname
//let InputREmail  = document.getElementsByName('InputREmail '); // champs register email
//let InputRAdresse = document.getElementsByName('InputRAdresse'); // champs register adresse postale
//let InputRPassword = document.getElementsByName('InputRPassword '); // champs register pasword
window.onload = function() {



    let InputRFirstName = document.querySelector("[name='firstname']");
    let InputRLastName = document.querySelector("[name='lastname']");
    let InputREmail  = document.querySelector("[name='email']");
    let InputRAdresse= document.querySelector("[name='adresse']");
    let InputRPassword  = document.querySelector("[name='password']");
    
    // valider  les champs form
    document.forms[0].onsubmit = function(e){
        let  AInputRFirstName  = false
        let  BInputRLastName= false
        let  CInputREmail = false
        let  DInputRAdresse = false
        let  EInputRPassword = false
    
            if(InputRFirstName.value !=="" && InputRFirstName.value.length <= 10){
                AInputRFirstName = true;
              
                
            }
    
     if(InputRLastName.value !=="" && InputRLastName.value.length <= 10){ BInputRLastName = true; }
    
     if(InputRAdresse.value !=="" && InputRAdresse.value.length <= 25){ DInputRAdresse = true;}
    
    
     if(InputRPassword.value !=="" && InputRPassword.value.length <= 30){ EInputRPassword = true;
                }
            
     if(InputREmail.value !=="" && InputREmail.value.length <= 20){ CInputREmail = true; }
           
           
     if(AInputRFirstName === false || BInputRLastName === false 
     ||CInputREmail === false  || DInputRAdresse === false || EInputRPassword === false ) {
        e.preventDefault();  // on stop l'evenement de soumission du formulaire par defaut 
          }
    }
 } 

//annimation page principale

const titreSpan = document.querySelectorAll('h1 span');
const btns = document.querySelectorAll('.btn-first');
const logo = document.querySelector('.log');
const medias = document.querySelectorAll('.bull');
const l1 = document.querySelectorAll('.l1');
const l2 = document.querySelectorAll('.l2');

  window.addEventListener('load',()=>{
    // creer time line
   const  timeline= gsap.timeline({paused:true});

   // pour animer l'un a la suite de l'autre (enchainement d'animation)
   timeline.staggerFrom(titreSpan, 1 ,{top: -50 , opacity:0, ease:"power2.out"}, 0.3);
          timeline.staggerFrom(btns, 1 ,{ opacity:0, ease:"power2.out"}, 0.3, '-=1');
          timeline.from(l1, 1, {width:0, ease: "power2.out"}, '-=2');
          timeline.from(l2, 1, {width:0, ease: "power2.out"}, '-=2');
          timeline.from(logo, 0.4, {transform:"scale(0)", ease: "power2.out"}, '-=2');
           timeline.staggerFrom(medias, 1 ,{right: -200 , opacity:0, ease:"power2.out"}, 0.3, '-=1');
 // desactivé pause
   timeline.play();

  });



  